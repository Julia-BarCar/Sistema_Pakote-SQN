<h1>Editar Funcionário</h1>
<?php 
	$sql = "SELECT * FROM funcionario  WHERE id_funcionario = ".@$_REQUEST['id_funcionario'];
	$res = $conn->query($sql);
	$row = $res->fetch_object();
 ?>
 <form action="?page=salvar-funcionario" method="POST">
 	<input type="hidden" name="acao" value="editar">
 	<input type="hidden" name="id_funcionario" 	value="<?php print $row->id_funcionario; ?>">
 	<div class="mb-3">
 		<label>Nome
 			<input type="text" name="nome_funcionario" class="form-control" value="<?php print $row->nome_funcionario; ?>">
 		</label>
 	</div>
 	<div class="mb-3">
 		<label>CPF
 			<input type="text" name="cpf" class="form-control" value="<?php print $row->cpf; ?>">
 		</label>
 	</div>
 	<div class="mb-3">
 		<label>Cargo
 			<input type="text" name="cargo" class="form-control" value="<?php print $row->cargo; ?>">
 		</label>
 	</div>
 	<div class="mb-3">
 		<label>E-mail
 			<input type="text" name="email_funcionario" class="form-control" value="<?php print $row->email; ?>">
 		</label>
 	</div>
 	<div class="mb-3">
 		<label>Telefone
 			<input type="text" name="telefone_funcionario" class="form-control" value="<?php print $row->telefone; ?>">
 		</label>
 	</div>
 	<div class="mb-3">
 		<label>Data de Admissão
 			<input type="date" name="data_admissao" class="form-control" value="<?php print $row->data_admissao; ?>">
 		</label>
 	</div>
 	<div>
		<button type="submit" class="btn btn-primary">ENVIAR</button>
	</div>
 </form>