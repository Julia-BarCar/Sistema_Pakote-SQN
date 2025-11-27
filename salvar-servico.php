<h1>Salvar Serviço</h1>
<?php 
	switch (@$_REQUEST['acao']) {
		case 'cadastrar':
			$nome_servico = $_POST['nome_servico'];
			$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
			$prazo_dias = isset($_POST['prazo_dias']) ? $_POST['prazo_dias'] : null;
			$preco_base = isset($_POST['preco_base']) ? $_POST['preco_base'] : null;

			$sql = "INSERT INTO tipo_servico (nome_servico, descricao, prazo_dias, preco_base) 
					VALUES ('{$nome_servico}', " . 
					($descricao ? "'{$descricao}'" : "NULL") . ", " . 
					($prazo_dias ? "'{$prazo_dias}'" : "NULL") . ", " . 
					($preco_base ? "'{$preco_base}'" : "NULL") . ")";
			$res = $conn->query($sql);

			if ($res == true) {
				print"<script>alert('Cadastrou com sucesso!');</script>";
				print"<script>location.href='?page=listar-servico';</script>";
			} else {
				print"<script>alert('Não cadastrou! Erro: {$conn->error}');</script>";
				print"<script>location.href='?page=listar-servico';</script>";
			}
			break;
			
		case 'editar':
			$nome_servico = $_POST['nome_servico'];
			$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
			$prazo_dias = isset($_POST['prazo_dias']) ? $_POST['prazo_dias'] : null;
			$preco_base = isset($_POST['preco_base']) ? $_POST['preco_base'] : null;

			$sql = "UPDATE tipo_servico SET 
						nome_servico='{$nome_servico}', 
						descricao=" . ($descricao ? "'{$descricao}'" : "NULL") . ",
						prazo_dias=" . ($prazo_dias ? "'{$prazo_dias}'" : "NULL") . ",
						preco_base=" . ($preco_base ? "'{$preco_base}'" : "NULL") . "
					WHERE id_tipo_servico=".$_REQUEST['id_tipo_servico'];
			$res = $conn->query($sql);
			
			if ($res == true) {
				print "<script>alert('Editou com sucesso!');</script>";
				print "<script>location.href='?page=listar-servico';</script>";
			} else {
				print "<script>alert('Não editou! Erro: {$conn->error}');</script>";
				print "<script>location.href='?page=listar-servico';</script>";
			}
			break;
			
		case 'excluir':
			$sql = "DELETE FROM tipo_servico WHERE id_tipo_servico=".$_REQUEST['id_tipo_servico'];
			$res = $conn->query($sql);
			if ($res == true) {
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>location.href='?page=listar-servico';</script>";
			} else {
				print "<script>alert('Não excluiu!');</script>";
				print "<script>location.href='?page=listar-servico';</script>";
			}
			break;
	}
?>