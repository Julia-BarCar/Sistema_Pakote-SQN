<h1>Salvar Destinatário</h1>
<?php 
	switch (@$_REQUEST['acao']) {
		case 'cadastrar':
			$nome = $_POST['nome_destinatario'];
			$cpf_cnpj = isset($_POST['cpf_cnpj']) ? $_POST['cpf_cnpj'] : null;
			$email = isset($_POST['email']) ? $_POST['email'] : null;
			$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
			$endereco = $_POST['endereco'];
			$cidade = $_POST['cidade'];
			$estado = $_POST['estado'];
			$cep = $_POST['cep'];

			// Validar CPF se fornecido
			if ($cpf_cnpj) {
				$cpf_cnpj = preg_replace('/[^0-9]/', '', $cpf_cnpj);
				
				if (strlen($cpf_cnpj) != 11) {
					print"<script>alert('CPF inválido! Deve conter 11 dígitos.');</script>";
					print"<script>location.href='?page=cadastrar-destinatario';</script>";
					break;
				}
			}

			$sql = "INSERT INTO destinatario (nome_destinatario, cpf_cnpj, email, telefone, endereco, cidade, estado, cep) 
					VALUES ('{$nome}', " . 
					($cpf_cnpj ? "'{$cpf_cnpj}'" : "NULL") . ", " . 
					($email ? "'{$email}'" : "NULL") . ", " . 
					($telefone ? "'{$telefone}'" : "NULL") . ", " . 
					"'{$endereco}', '{$cidade}', '{$estado}', '{$cep}')";
			$res = $conn->query($sql);

			if ($res == true) {
				print"<script>alert('Cadastrou com sucesso!');</script>";
				print"<script>location.href='?page=listar-destinatario';</script>";
			} else {
				print"<script>alert('Não cadastrou! Erro: {$conn->error}');</script>";
				print"<script>location.href='?page=listar-destinatario';</script>";
			}
			break;
			
		case 'editar':
			$nome = $_POST['nome_destinatario'];
			$cpf_cnpj = isset($_POST['cpf_cnpj']) ? $_POST['cpf_cnpj'] : null;
			$email = isset($_POST['email']) ? $_POST['email'] : null;
			$telefone = isset($_POST['telefone']) ? $_POST['telefone'] : null;
			$endereco = $_POST['endereco'];
			$cidade = $_POST['cidade'];
			$estado = $_POST['estado'];
			$cep = $_POST['cep'];
			
			// Validar CPF se fornecido
			if ($cpf_cnpj) {
				$cpf_cnpj = preg_replace('/[^0-9]/', '', $cpf_cnpj);
				
				if (strlen($cpf_cnpj) != 11) {
					print"<script>alert('CPF inválido! Deve conter 11 dígitos.');</script>";
					print"<script>location.href='?page=editar-destinatario&id_destinatario={$_REQUEST['id_destinatario']}';</script>";
					break;
				}
			}

			$sql = "UPDATE destinatario SET 
						nome_destinatario='{$nome}', 
						cpf_cnpj=" . ($cpf_cnpj ? "'{$cpf_cnpj}'" : "NULL") . ",
						email=" . ($email ? "'{$email}'" : "NULL") . ", 
						telefone=" . ($telefone ? "'{$telefone}'" : "NULL") . ",
						endereco='{$endereco}',
						cidade='{$cidade}',
						estado='{$estado}',
						cep='{$cep}'
					WHERE id_destinatario=".$_REQUEST['id_destinatario'];
			$res = $conn->query($sql);
			
			if ($res == true) {
				print "<script>alert('Editou com sucesso!');</script>";
				print "<script>location.href='?page=listar-destinatario';</script>";
			} else {
				print "<script>alert('Não editou! Erro: {$conn->error}');</script>";
				print "<script>location.href='?page=listar-destinatario';</script>";
			}
			break;
			
		case 'excluir':
			$sql = "DELETE FROM destinatario WHERE id_destinatario=".$_REQUEST['id_destinatario'];
			$res = $conn->query($sql);
			if ($res == true) {
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>location.href='?page=listar-destinatario';</script>";
			} else {
				print "<script>alert('Não excluiu!');</script>";
				print "<script>location.href='?page=listar-destinatario';</script>";
			}
			break;
	}
?>