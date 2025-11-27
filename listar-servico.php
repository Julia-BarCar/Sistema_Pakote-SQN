<h1>Listar Serviço</h1>
<?php 
	$sql = "SELECT * FROM tipo_servico";
	$res = $conn->query($sql);
	$qtd = $res->num_rows;

	if ($qtd > 0) {
		print "<p>Encontrou <b>$qtd</b> serviço(s) cadastrado(s)!</p>";
		print "<table class='table table-bordered table-striped table-hover'>";
		print "<tr>";
		print "<th>ID</th>";
		print "<th>Nome</th>";
		print "<th>Descrição</th>";
		print "<th>Prazo (dias)</th>";
		print "<th>Preço Base</th>";
		print "<th>Ação</th>";
		print "</tr>";

		while ($row = $res->fetch_object()) {
			$preco = $row->preco_base ? 'R$ ' . number_format($row->preco_base, 2, ',', '.') : '-';
			
			print "<tr>";
			print "<td>".$row->id_tipo_servico."</td>";
			print "<td>".$row->nome_servico."</td>";
			print "<td>".($row->descricao ? $row->descricao : '-')."</td>";
			print "<td>".($row->prazo_dias ? $row->prazo_dias : '-')."</td>";
			print "<td>".$preco."</td>";
			print "<td>
				<button class='btn btn-success' onclick=\"location.href='?page=editar-servico&id_tipo_servico={$row->id_tipo_servico}';\">Editar</button>
				<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-servico&acao=excluir&id_tipo_servico={$row->id_tipo_servico}';}else{false}\">Excluir</button>	
				</td>";
			print "</tr>";
		}
		print "</table>";
	} else {
		print "<p class='alert alert-warning'>Não há serviços cadastrados.</p>";
	}
?>