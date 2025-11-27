<h1>Editar Serviço</h1>
<?php 
	$sql = "SELECT * FROM tipo_servico  WHERE id_tipo_servico = ".@$_REQUEST['id_tipo_servico'];
	$res = $conn->query($sql);
	$row = $res->fetch_object();
 ?>
 <form action="?page=salvar-servico" method="POST">
 	<input type="hidden" name="acao" value="editar">
 	<input type="hidden" name="id_tipo_servico" 	value="<?php print $row->id_tipo_servico; ?>">
 	<div class="mb-3">
 		<label>Nome do Serviço
 			<input type="text" name="nome_servico" class="form-control" value="<?php print $row->nome_servico; ?>">
 		</label>
 	</div>
 	<div class="mb-3">
 		<label>Descrição
 			<textarea name="descricao" class="form-control" rows="3"><?php print $row->descricao; ?></textarea>
 		</label>
 	</div>
 	<div class="mb-3">
 		<label>Prazo (dias)
 			<input type="number" name="prazo_dias" class="form-control" value="<?php print $row->prazo_dias; ?>">
 		</label>
 	</div>
 	<div class="mb-3">
 		<label>Preço Base (R$)
 			<input type="number" step="0.01" name="preco_base" class="form-control" value="<?php print $row->preco_base; ?>">
 		</label>
 	</div>
 	<div>
		<button type="submit" class="btn btn-primary">ENVIAR</button>
	</div>
 </form>