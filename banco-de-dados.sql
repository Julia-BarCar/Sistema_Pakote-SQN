-- Banco de Dados para Sistema de Correios Pakote
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema pakote_correios
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `pakote_correios` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `pakote_correios` ;

-- -----------------------------------------------------
-- Tabela `remetente` (quem envia)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pakote_correios`.`remetente` (
  `id_remetente` INT NOT NULL AUTO_INCREMENT,
  `nome_remetente` VARCHAR(100) NOT NULL,
  `cpf_cnpj` VARCHAR(14) NOT NULL,
  `telefone` VARCHAR(20) NULL,
  `email` VARCHAR(100) NULL,
  `endereco` VARCHAR(200) NULL,
  `cidade` VARCHAR(100) NULL,
  `estado` CHAR(2) NULL,
  `cep` VARCHAR(9) NULL,
  `data_cadastro` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_remetente`),
  UNIQUE INDEX `cpf_cnpj_UNIQUE` (`cpf_cnpj` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabela `destinatario` (quem recebe)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pakote_correios`.`destinatario` (
  `id_destinatario` INT NOT NULL AUTO_INCREMENT,
  `nome_destinatario` VARCHAR(100) NOT NULL,
  `cpf_cnpj` VARCHAR(14) NULL,
  `telefone` VARCHAR(20) NULL,
  `email` VARCHAR(100) NULL,
  `endereco` VARCHAR(200) NOT NULL,
  `cidade` VARCHAR(100) NOT NULL,
  `estado` CHAR(2) NOT NULL,
  `cep` VARCHAR(9) NOT NULL,
  PRIMARY KEY (`id_destinatario`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabela `funcionario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pakote_correios`.`funcionario` (
  `id_funcionario` INT NOT NULL AUTO_INCREMENT,
  `nome_funcionario` VARCHAR(100) NOT NULL,
  `cpf` CHAR(11) NOT NULL,
  `cargo` VARCHAR(50) NULL,
  `telefone` VARCHAR(20) NULL,
  `email` VARCHAR(100) NULL,
  `data_admissao` DATE NULL,
  PRIMARY KEY (`id_funcionario`),
  UNIQUE INDEX `cpf_UNIQUE` (`cpf` ASC))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabela `tipo_servico` (PAC, SEDEX, etc)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pakote_correios`.`tipo_servico` (
  `id_tipo_servico` INT NOT NULL AUTO_INCREMENT,
  `nome_servico` VARCHAR(50) NOT NULL,
  `descricao` VARCHAR(200) NULL,
  `prazo_dias` INT NULL,
  `preco_base` DECIMAL(10,2) NULL,
  PRIMARY KEY (`id_tipo_servico`))
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabela `encomenda` (pacote/carta)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pakote_correios`.`encomenda` (
  `id_encomenda` INT NOT NULL AUTO_INCREMENT,
  `codigo_rastreio` VARCHAR(13) NOT NULL,
  `remetente_id` INT NOT NULL,
  `destinatario_id` INT NOT NULL,
  `funcionario_id` INT NOT NULL,
  `tipo_servico_id` INT NOT NULL,
  `peso` DECIMAL(10,3) NULL COMMENT 'peso em kg',
  `altura` DECIMAL(10,2) NULL COMMENT 'em cm',
  `largura` DECIMAL(10,2) NULL,
  `comprimento` DECIMAL(10,2) NULL,
  `valor_declarado` DECIMAL(10,2) NULL,
  `valor_total` DECIMAL(10,2) NOT NULL,
  `data_postagem` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `previsao_entrega` DATE NULL,
  `status_encomenda` ENUM('POSTADO', 'EM_TRANSITO', 'SAIU_PARA_ENTREGA', 'ENTREGUE', 'DEVOLVIDO') DEFAULT 'POSTADO',
  PRIMARY KEY (`id_encomenda`),
  UNIQUE INDEX `codigo_rastreio_UNIQUE` (`codigo_rastreio` ASC),
  INDEX `fk_encomenda_remetente_idx` (`remetente_id` ASC),
  INDEX `fk_encomenda_destinatario_idx` (`destinatario_id` ASC),
  INDEX `fk_encomenda_funcionario_idx` (`funcionario_id` ASC),
  INDEX `fk_encomenda_tipo_servico_idx` (`tipo_servico_id` ASC),
  CONSTRAINT `fk_encomenda_remetente`
    FOREIGN KEY (`remetente_id`)
    REFERENCES `pakote_correios`.`remetente` (`id_remetente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_encomenda_destinatario`
    FOREIGN KEY (`destinatario_id`)
    REFERENCES `pakote_correios`.`destinatario` (`id_destinatario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_encomenda_funcionario`
    FOREIGN KEY (`funcionario_id`)
    REFERENCES `pakote_correios`.`funcionario` (`id_funcionario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_encomenda_tipo_servico`
    FOREIGN KEY (`tipo_servico_id`)
    REFERENCES `pakote_correios`.`tipo_servico` (`id_tipo_servico`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Tabela `rastreamento` (histórico de movimentação)
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pakote_correios`.`rastreamento` (
  `id_rastreamento` INT NOT NULL AUTO_INCREMENT,
  `encomenda_id` INT NOT NULL,
  `data_evento` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `local` VARCHAR(100) NULL,
  `status` VARCHAR(100) NOT NULL,
  `observacao` TEXT NULL,
  PRIMARY KEY (`id_rastreamento`),
  INDEX `fk_rastreamento_encomenda_idx` (`encomenda_id` ASC),
  CONSTRAINT `fk_rastreamento_encomenda`
    FOREIGN KEY (`encomenda_id`)
    REFERENCES `pakote_correios`.`encomenda` (`id_encomenda`)
    ON DELETE CASCADE
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- Inserir dados iniciais de tipos de serviço
INSERT INTO `tipo_servico` (`nome_servico`, `descricao`, `prazo_dias`, `preco_base`) VALUES
('SEDEX', 'Entrega expressa', 2, 25.00),
('PAC', 'Entrega econômica', 10, 15.00),
('SEDEX 10', 'Entrega até 10h do dia seguinte', 1, 45.00),
('CARTA REGISTRADA', 'Carta com registro e rastreamento', 7, 8.00);

SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;