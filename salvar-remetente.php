<h1>Salvar Remetente</h1>
<?php 
	switch (@$_REQUEST['acao']) {
		case 'cadastrar':
			$nome = $_POST['nome_remetente'];
			$cpf_cnpj = $_POST['cpf_cnpj'];
			$email = $_POST['email'];
			$telefone = $_POST['telefone'];
			$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : null;
			$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;
			$estado = isset($_POST['estado']) ? $_POST['estado'] : null;
			$cep = isset($_POST['cep']) ? $_POST['cep'] : null;

			// Validar CPF (apenas números)
			$cpf_cnpj = preg_replace('/[^0-9]/', '', $cpf_cnpj);
			
			if (strlen($cpf_cnpj) != 11) {
				print"<script>alert('CPF inválido! Deve conter 11 dígitos.');</script>";
				print"<script>location.href='?page=cadastrar-remetente';</script>";
				break;
			}

			$sql = "INSERT INTO remetente (nome_remetente, cpf_cnpj, email, telefone, endereco, cidade, estado, cep) 
					VALUES ('{$nome}', '{$cpf_cnpj}', '{$email}', '{$telefone}', " . 
					($endereco ? "'{$endereco}'" : "NULL") . ", " . 
					($cidade ? "'{$cidade}'" : "NULL") . ", " . 
					($estado ? "'{$estado}'" : "NULL") . ", " . 
					($cep ? "'{$cep}'" : "NULL") . ")";
			$res = $conn->query($sql);

			if ($res == true) {
				print"<script>alert('Cadastrou com sucesso!');</script>";
				print"<script>location.href='?page=listar-remetente';</script>";
			} else {
				print"<script>alert('Não cadastrou! Erro: {$conn->error}');</script>";
				print"<script>location.href='?page=listar-remetente';</script>";
			}
			break;
			
		case 'editar':
			$nome = $_POST['nome_remetente'];
			$cpf_cnpj = $_POST['cpf_cnpj'];
			$email = $_POST['email'];
			$telefone = $_POST['telefone'];
			$endereco = isset($_POST['endereco']) ? $_POST['endereco'] : null;
			$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : null;
			$estado = isset($_POST['estado']) ? $_POST['estado'] : null;
			$cep = isset($_POST['cep']) ? $_POST['cep'] : null;
			
			// Validar CPF (apenas números)
			$cpf_cnpj = preg_replace('/[^0-9]/', '', $cpf_cnpj);
			
			if (strlen($cpf_cnpj) != 11) {
				print"<script>alert('CPF inválido! Deve conter 11 dígitos.');</script>";
				print"<script>location.href='?page=editar-remetente&id_remetente={$_REQUEST['id_remetente']}';</script>";
				break;
			}

			$sql = "UPDATE remetente SET 
						nome_remetente='{$nome}', 
						cpf_cnpj='{$cpf_cnpj}',
						email='{$email}', 
						telefone='{$telefone}',
						endereco=" . ($endereco ? "'{$endereco}'" : "NULL") . ",
						cidade=" . ($cidade ? "'{$cidade}'" : "NULL") . ",
						estado=" . ($estado ? "'{$estado}'" : "NULL") . ",
						cep=" . ($cep ? "'{$cep}'" : "NULL") . "
					WHERE id_remetente=".$_REQUEST['id_remetente'];
			$res = $conn->query($sql);
			
			if ($res == true) {
				print "<script>alert('Editou com sucesso!');</script>";
				print "<script>location.href='?page=listar-remetente';</script>";
			} else {
				print "<script>alert('Não editou! Erro: {$conn->error}');</script>";
				print "<script>location.href='?page=listar-remetente';</script>";
			}
			break;
			
		case 'excluir':
			$sql = "DELETE FROM remetente WHERE id_remetente=".$_REQUEST['id_remetente'];
			$res = $conn->query($sql);
			if ($res == true) {
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>location.href='?page=listar-remetente';</script>";
			} else {
				print "<script>alert('Não excluiu!');</script>";
				print "<script>location.href='?page=listar-remetente';</script>";
			}
			break;
	}
?>