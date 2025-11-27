<h1>Listar Funcionário</h1>
<?php 
	$sql = "SELECT * FROM funcionario";
	$res = $conn->query($sql);
	$qtd = $res->num_rows;

	if ($qtd > 0) {
		print "<p>Encontrou <b>$qtd</b> funcionário(s) cadastrado(s)!</p>";
		print "<table class='table table-bordered table-striped table-hover'>";
		print "<tr>";
		print "<th>ID</th>";
		print "<th>Nome</th>";
		print "<th>CPF</th>";
		print "<th>Cargo</th>";
		print "<th>E-mail</th>";
		print "<th>Telefone</th>";
		print "<th>Data Admissão</th>";
		print "<th>Ação</th>";
		print "</tr>";

		while ($row = $res->fetch_object()) {
// Formatar CPF
			$cpf_formatado = $row->cpf;
			if (strlen($cpf_formatado) == 11) {
				$cpf_formatado = substr($cpf_formatado, 0, 3) . '.' . 
								 substr($cpf_formatado, 3, 3) . '.' . 
								 substr($cpf_formatado, 6, 3) . '-' . 
								 substr($cpf_formatado, 9, 2);
			}
			
// Formatar data de admissão
			$admissao = $row->data_admissao ? date('d/m/Y', strtotime($row->data_admissao)) : '-';
			
			print "<tr>";
			print "<td>".$row->id_funcionario."</td>";
			print "<td>".$row->nome_funcionario."</td>";
			print "<td>".$cpf_formatado."</td>";
			print "<td>".($row->cargo ? $row->cargo : '-')."</td>";
			print "<td>".($row->email ? $row->email : '-')."</td>";
			print "<td>".($row->telefone ? $row->telefone : '-')."</td>";
			print "<td>".$admissao."</td>";
			print "<td>
				<button class='btn btn-success' onclick=\"location.href='?page=editar-funcionario&id_funcionario={$row->id_funcionario}';\">Editar</button>
				<button class='btn btn-danger' onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='?page=salvar-funcionario&acao=excluir&id_funcionario={$row->id_funcionario}';}else{false}\">Excluir</button>	
				</td>";
			print "</tr>";
		}
		print "</table>";
	} else {
		print "<p class='alert alert-warning'>Não há funcionários cadastrados.</p>";
	}
?>