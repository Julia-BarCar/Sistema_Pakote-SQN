<h1>Salvar Funcionário</h1>
<?php 
	switch (@$_REQUEST['acao']) {
		case 'cadastrar':
			$nome = $_POST['nome_funcionario'];
			$cpf = $_POST['cpf'];
			$cargo = $_POST['cargo'];
			$email = $_POST['email_funcionario'];
			$telefone = $_POST['telefone_funcionario'];
			$data_admissao = isset($_POST['data_admissao']) ? $_POST['data_admissao'] : null;

// Validar CPF (apenas números)
			$cpf = preg_replace('/[^0-9]/', '', $cpf);
			
			if (strlen($cpf) != 11) {
				print"<script>alert('CPF inválido! Deve conter 11 dígitos.');</script>";
				print"<script>location.href='?page=cadastrar-funcionario';</script>";
				break;
			}

			$sql = "INSERT INTO funcionario (nome_funcionario, cpf, cargo, telefone, email, data_admissao) 
					VALUES ('{$nome}', '{$cpf}', '{$cargo}', '{$telefone}', '{$email}', " . ($data_admissao ? "'{$data_admissao}'" : "NULL") . ")";
			$res = $conn->query($sql);

			if ($res == true) {
				print"<script>alert('Cadastrou com sucesso!');</script>";
				print"<script>location.href='?page=listar-funcionario';</script>";
			} else {
				print"<script>alert('Não cadastrou! Erro: {$conn->error}');</script>";
				print"<script>location.href='?page=listar-funcionario';</script>";
			}
			break;
			
		case 'editar':
			$nome = $_POST['nome_funcionario'];
			$cpf = $_POST['cpf'];
			$cargo = $_POST['cargo'];
			$email = $_POST['email_funcionario'];
			$telefone = $_POST['telefone_funcionario'];
			$data_admissao = isset($_POST['data_admissao']) ? $_POST['data_admissao'] : null;
			
// Validar CPF (apenas números)
			$cpf = preg_replace('/[^0-9]/', '', $cpf);
			
			if (strlen($cpf) != 11) {
				print"<script>alert('CPF inválido! Deve conter 11 dígitos.');</script>";
				print"<script>location.href='?page=editar-funcionario&id_funcionario={$_REQUEST['id_funcionario']}';</script>";
				break;
			}

			$sql = "UPDATE funcionario SET 
						nome_funcionario='{$nome}', 
						cpf='{$cpf}',
						cargo='{$cargo}',
						telefone='{$telefone}',
						email='{$email}',
						data_admissao=" . ($data_admissao ? "'{$data_admissao}'" : "NULL") . "
					WHERE id_funcionario=".$_REQUEST['id_funcionario'];
			$res = $conn->query($sql);
			
			if ($res == true) {
				print "<script>alert('Editou com sucesso!');</script>";
				print "<script>location.href='?page=listar-funcionario';</script>";
			} else {
				print "<script>alert('Não editou! Erro: {$conn->error}');</script>";
				print "<script>location.href='?page=listar-funcionario';</script>";
			}
			break;
			
		case 'excluir':
			$sql = "DELETE FROM funcionario WHERE id_funcionario=".$_REQUEST['id_funcionario'];
			$res = $conn->query($sql);
			if ($res == true) {
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>location.href='?page=listar-funcionario';</script>";
			} else {
				print "<script>alert('Não excluiu!');</script>";
				print "<script>location.href='?page=listar-funcionario';</script>";
			}
			break;
	}
?>