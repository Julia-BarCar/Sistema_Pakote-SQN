<h1>Listar Destinatário</h1>
<?php 
	$sql = "SELECT * FROM destinatario";
	$res = $conn->query($sql);
	$qtd = $res->num_rows;

	if ($qtd > 0) {
		print "<p>Encontrou <b>$qtd</b> destinatário(s) cadastrado(s)!</p>";
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
			$cpf_formatado = $row->cpf_cnpj ? $row->cpf_cnpj : '-';
			if (strlen($row->cpf_cnpj) == 11) {
				$cpf_formatado = substr($row->cpf_cnpj, 0, 3) . '.' . 
								 substr($row->cpf_cnpj, 3, 3) . '.' . 
								 substr($row->cpf_cnpj, 6, 3) . '-' . 
								 substr($row->cpf_cnpj, 9, 2);
			}
			
			$cidade_uf = $row->cidade . '/' . $row->estado;
			
			print "<tr>";
			print "<td>".$row->id_destinatario."</td>";
			print "<td>".$row->nome_destinatario."</td>";
			print "<td>".$cpf_formatado."</td>";
			print "<td>".($row->email ? $row->email : '-')."</td>";
			print "<td>".($row->telefone ? $row->telefone : '-')."</td>";
			print "<td>".$cidade_uf."</td>";
			print "<td>".$row->cep."</td>";
			print "<td>
				<button class='btn btn-success' onclick=\"location.href='?page=editar-destinatario&id_destinatario={$row->id_destinatario}';\">Editar</button>
				<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-destinatario&acao=excluir&id_destinatario={$row->id_destinatario}';}else{false}\">Excluir</button>	
				</td>";
			print "</tr>";
		}
		print "</table>";
	} else {
		print "<p class='alert alert-warning'>Não há destinatários cadastrados.</p>";
	}
?>