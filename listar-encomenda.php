<h1>Listar Encomenda</h1>
<?php 
	$sql = "SELECT e.*, r.nome_remetente, d.nome_destinatario, f.nome_funcionario, ts.nome_servico 
			FROM encomenda e
			INNER JOIN remetente r ON e.remetente_id = r.id_remetente
			INNER JOIN destinatario d ON e.destinatario_id = d.id_destinatario
			INNER JOIN funcionario f ON e.funcionario_id = f.id_funcionario
			INNER JOIN tipo_servico ts ON e.tipo_servico_id = ts.id_tipo_servico
			ORDER BY e.id_encomenda DESC";
	$res = $conn->query($sql);
	$qtd = $res->num_rows;

	if ($qtd > 0) {
		print "<p>Encontrou <b>$qtd</b> encomenda(s) cadastrada(s)!</p>";
		print "<table class='table table-bordered table-striped table-hover'>";
		print "<tr>";
		print "<th>ID</th>";
		print "<th>Código Rastreio</th>";
		print "<th>Remetente</th>";
		print "<th>Destinatário</th>";
		print "<th>Serviço</th>";
		print "<th>Valor Total</th>";
		print "<th>Status</th>";
		print "<th>Data Postagem</th>";
		print "<th>Ação</th>";
		print "</tr>";

		while ($row = $res->fetch_object()) {
			$valor = 'R$ ' . number_format($row->valor_total, 2, ',', '.');
			$data_postagem = date('d/m/Y H:i', strtotime($row->data_postagem));
			
			// Badge de status
			$status_badge = '';
			switch($row->status_encomenda) {
				case 'POSTADO':
					$status_badge = '<span class="badge bg-primary">POSTADO</span>';
					break;
				case 'EM_TRANSITO':
					$status_badge = '<span class="badge bg-info">EM TRÂNSITO</span>';
					break;
				case 'SAIU_PARA_ENTREGA':
					$status_badge = '<span class="badge bg-warning">SAIU PARA ENTREGA</span>';
					break;
				case 'ENTREGUE':
					$status_badge = '<span class="badge bg-success">ENTREGUE</span>';
					break;
				case 'DEVOLVIDO':
					$status_badge = '<span class="badge bg-danger">DEVOLVIDO</span>';
					break;
			}
			
			print "<tr>";
			print "<td>".$row->id_encomenda."</td>";
			print "<td><strong>".$row->codigo_rastreio."</strong></td>";
			print "<td>".$row->nome_remetente."</td>";
			print "<td>".$row->nome_destinatario."</td>";
			print "<td>".$row->nome_servico."</td>";
			print "<td>".$valor."</td>";
			print "<td>".$status_badge."</td>";
			print "<td>".$data_postagem."</td>";
			print "<td>
				<button class='btn btn-success' onclick=\"location.href='?page=editar-encomenda&id_encomenda={$row->id_encomenda}';\">Editar</button>
				<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-encomenda&acao=excluir&id_encomenda={$row->id_encomenda}';}else{false}\">Excluir</button>	
				</td>";
			print "</tr>";
		}
		print "</table>";
	} else {
		print "<p class='alert alert-warning'>Não há encomendas cadastradas.</p>";
	}
?>