<h1>Listar Remetente</h1>
<?php 
	$sql = "SELECT * FROM remetente";
	$res = $conn->query($sql);
	$qtd = $res->num_rows;

	if ($qtd > 0) {
		print "<p>Encontrou <b>$qtd</b> remetente(s) cadastrado(s)!</p>";
		print "<table class='table table-bordered table-striped table-hover'>";
		print "<tr>";
		print "<th>ID</th>";
		print "<th>Nome</th>";
		print "<th>CPF</th>";
		print "<th>E-mail</th>";
		print "<th>Telefone</th>";
		print "<th>Cidade/UF</th>";
		print "<th>CEP</th>";
		print "<th>Ação</th>";
		print "</tr>";

		while ($row = $res->fetch_object()) {
			// Formatar CPF
			$cpf_formatado = $row->cpf_cnpj;
			if (strlen($cpf_formatado) == 11) {
				$cpf_formatado = substr($cpf_formatado, 0, 3) . '.' . 
								 substr($cpf_formatado, 3, 3) . '.' . 
								 substr($cpf_formatado, 6, 3) . '-' . 
								 substr($cpf_formatado, 9, 2);
			}
			
			$cidade_uf = $row->cidade ? $row->cidade . '/' . $row->estado : '-';
			
			print "<tr>";
			print "<td>".$row->id_remetente."</td>";
			print "<td>".$row->nome_remetente."</td>";
			print "<td>".$cpf_formatado."</td>";
			print "<td>".$row->email."</td>";
			print "<td>".$row->telefone."</td>";
			print "<td>".$cidade_uf."</td>";
			print "<td>".$row->cep."</td>";
			print "<td>
				<button class='btn btn-success' onclick=\"location.href='?page=editar-remetente&id_remetente={$row->id_remetente}';\">Editar</button>
				<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-remetente&acao=excluir&id_remetente={$row->id_remetente}';}else{false}\">Excluir</button>	
				</td>";
			print "</tr>";
		}
		print "</table>";
	} else {
		print "<p class='alert alert-warning'>Não há remetentes cadastrados.</p>";
	}
?>