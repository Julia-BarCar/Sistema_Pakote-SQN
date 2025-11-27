<h1>Editar Encomenda</h1>
<?php 
	$sql = "SELECT * FROM encomenda WHERE id_encomenda = ".@$_REQUEST['id_encomenda'];
	$res = $conn->query($sql);
	$row = $res->fetch_object();
 ?>
 <form action="?page=salvar-encomenda" method="POST">
 	<input type="hidden" name="acao" value="editar">
 	<input type="hidden" name="id_encomenda" value="<?php print $row->id_encomenda; ?>">
 	
 	<div class="mb-3">
		<label>Código de Rastreio
			<input type="text" name="codigo_rastreio" class="form-control" value="<?php print $row->codigo_rastreio; ?>">
		</label>
	</div>

	<div class="mb-3">
		<label>Remetente
			<select name="remetente_id" class="form-control">
				<?php 
					$sql_rem = "SELECT * FROM remetente ORDER BY nome_remetente";
					$res_rem = $conn->query($sql_rem);
					while($row_rem = $res_rem->fetch_object()){
						$selected = ($row->remetente_id == $row_rem->id_remetente) ? 'selected' : '';
						print "<option value='{$row_rem->id_remetente}' {$selected}>{$row_rem->nome_remetente}</option>";
					}
				?>
			</select>
		</label>
	</div>

	<div class="mb-3">
		<label>Destinatário
			<select name="destinatario_id" class="form-control">
				<?php 
					$sql_dest = "SELECT * FROM destinatario ORDER BY nome_destinatario";
					$res_dest = $conn->query($sql_dest);
					while($row_dest = $res_dest->fetch_object()){
						$selected = ($row->destinatario_id == $row_dest->id_destinatario) ? 'selected' : '';
						print "<option value='{$row_dest->id_destinatario}' {$selected}>{$row_dest->nome_destinatario}</option>";
					}
				?>
			</select>
		</label>
	</div>

	<div class="mb-3">
		<label>Funcionário Responsável
			<select name="funcionario_id" class="form-control">
				<?php 
					$sql_func = "SELECT * FROM funcionario ORDER BY nome_funcionario";
					$res_func = $conn->query($sql_func);
					while($row_func = $res_func->fetch_object()){
						$selected = ($row->funcionario_id == $row_func->id_funcionario) ? 'selected' : '';
						print "<option value='{$row_func->id_funcionario}' {$selected}>{$row_func->nome_funcionario}</option>";
					}
				?>
			</select>
		</label>
	</div>

	<div class="mb-3">
		<label>Tipo de Serviço
			<select name="tipo_servico_id" class="form-control">
				<?php 
					$sql_serv = "SELECT * FROM tipo_servico ORDER BY nome_servico";
					$res_serv = $conn->query($sql_serv);
					while($row_serv = $res_serv->fetch_object()){
						$selected = ($row->tipo_servico_id == $row_serv->id_tipo_servico) ? 'selected' : '';
						$preco = number_format($row_serv->preco_base, 2, ',', '.');
						print "<option value='{$row_serv->id_tipo_servico}' {$selected}>{$row_serv->nome_servico} - R$ {$preco}</option>";
					}
				?>
			</select>
		</label>
	</div>

	<div class="mb-3">
		<label>Peso (kg)
			<input type="number" step="0.001" name="peso" class="form-control" value="<?php print $row->peso; ?>">
		</label>
	</div>

	<div class="row">
		<div class="col-md-4 mb-3">
			<label>Altura (cm)
				<input type="number" step="0.01" name="altura" class="form-control" value="<?php print $row->altura; ?>">
			</label>
		</div>
		<div class="col-md-4 mb-3">
			<label>Largura (cm)
				<input type="number" step="0.01" name="largura" class="form-control" value="<?php print $row->largura; ?>">
			</label>
		</div>
		<div class="col-md-4 mb-3">
			<label>Comprimento (cm)
				<input type="number" step="0.01" name="comprimento" class="form-control" value="<?php print $row->comprimento; ?>">
			</label>
		</div>
	</div>

	<div class="mb-3">
		<label>Valor Declarado (R$)
			<input type="number" step="0.01" name="valor_declarado" class="form-control" value="<?php print $row->valor_declarado; ?>">
		</label>
	</div>

	<div class="mb-3">
		<label>Valor Total (R$)
			<input type="number" step="0.01" name="valor_total" class="form-control" value="<?php print $row->valor_total; ?>">
		</label>
	</div>

	<div class="mb-3">
		<label>Status
			<select name="status_encomenda" class="form-control">
				<option value="POSTADO" <?php if($row->status_encomenda == 'POSTADO') print 'selected'; ?>>POSTADO</option>
				<option value="EM_TRANSITO" <?php if($row->status_encomenda == 'EM_TRANSITO') print 'selected'; ?>>EM TRÂNSITO</option>
				<option value="SAIU_PARA_ENTREGA" <?php if($row->status_encomenda == 'SAIU_PARA_ENTREGA') print 'selected'; ?>>SAIU PARA ENTREGA</option>
				<option value="ENTREGUE" <?php if($row->status_encomenda == 'ENTREGUE') print 'selected'; ?>>ENTREGUE</option>
				<option value="DEVOLVIDO" <?php if($row->status_encomenda == 'DEVOLVIDO') print 'selected'; ?>>DEVOLVIDO</option>
			</select>
		</label>
	</div>

	<div class="mb-3">
		<label>Previsão de Entrega
			<input type="date" name="previsao_entrega" class="form-control" value="<?php print $row->previsao_entrega; ?>">
		</label>
	</div>

 	<div>
		<button type="submit" class="btn btn-primary">ENVIAR</button>
	</div>
 </form>