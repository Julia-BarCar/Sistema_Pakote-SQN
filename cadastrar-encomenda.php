<h1>Cadastrar Encomenda</h1>
<form action="?page=salvar-encomenda" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	
	<div class="mb-3">
		<label>Código de Rastreio
			<input type="text" name="codigo_rastreio" class="form-control" maxlength="13" placeholder="Ex: AA123456789BR" required>
		</label>
		<small class="form-text text-muted">13 caracteres</small>
	</div>

	<div class="mb-3">
		<label>Remetente
			<select name="remetente_id" class="form-control" required>
				<option value="">Selecione</option>
				<?php 
					$sql_rem = "SELECT * FROM remetente ORDER BY nome_remetente";
					$res_rem = $conn->query($sql_rem);
					while($row_rem = $res_rem->fetch_object()){
						print "<option value='{$row_rem->id_remetente}'>{$row_rem->nome_remetente}</option>";
					}
				?>
			</select>
		</label>
	</div>

	<div class="mb-3">
		<label>Destinatário
			<select name="destinatario_id" class="form-control" required>
				<option value="">Selecione</option>
				<?php 
					$sql_dest = "SELECT * FROM destinatario ORDER BY nome_destinatario";
					$res_dest = $conn->query($sql_dest);
					while($row_dest = $res_dest->fetch_object()){
						print "<option value='{$row_dest->id_destinatario}'>{$row_dest->nome_destinatario}</option>";
					}
				?>
			</select>
		</label>
	</div>

	<div class="mb-3">
		<label>Funcionário Responsável
			<select name="funcionario_id" class="form-control" required>
				<option value="">Selecione</option>
				<?php 
					$sql_func = "SELECT * FROM funcionario ORDER BY nome_funcionario";
					$res_func = $conn->query($sql_func);
					while($row_func = $res_func->fetch_object()){
						print "<option value='{$row_func->id_funcionario}'>{$row_func->nome_funcionario}</option>";
					}
				?>
			</select>
		</label>
	</div>

	<div class="mb-3">
		<label>Tipo de Serviço
			<select name="tipo_servico_id" class="form-control" required>
				<option value="">Selecione</option>
				<?php 
					$sql_serv = "SELECT * FROM tipo_servico ORDER BY nome_servico";
					$res_serv = $conn->query($sql_serv);
					while($row_serv = $res_serv->fetch_object()){
						$preco = number_format($row_serv->preco_base, 2, ',', '.');
						print "<option value='{$row_serv->id_tipo_servico}'>{$row_serv->nome_servico} - R$ {$preco}</option>";
					}
				?>
			</select>
		</label>
	</div>

	<div class="mb-3">
		<label>Peso (kg)
			<input type="number" step="0.001" name="peso" class="form-control" placeholder="Ex: 1.500">
		</label>
	</div>

	<div class="row">
		<div class="col-md-4 mb-3">
			<label>Altura (cm)
				<input type="number" step="0.01" name="altura" class="form-control" placeholder="Ex: 10">
			</label>
		</div>
		<div class="col-md-4 mb-3">
			<label>Largura (cm)
				<input type="number" step="0.01" name="largura" class="form-control" placeholder="Ex: 15">
			</label>
		</div>
		<div class="col-md-4 mb-3">
			<label>Comprimento (cm)
				<input type="number" step="0.01" name="comprimento" class="form-control" placeholder="Ex: 20">
			</label>
		</div>
	</div>

	<div class="mb-3">
		<label>Valor Declarado (R$)
			<input type="number" step="0.01" name="valor_declarado" class="form-control" placeholder="Ex: 100.00">
		</label>
	</div>

	<div class="mb-3">
		<label>Valor Total (R$)
			<input type="number" step="0.01" name="valor_total" class="form-control" placeholder="Ex: 25.00" required>
		</label>
	</div>

	<div class="mb-3">
		<label>Previsão de Entrega
			<input type="date" name="previsao_entrega" class="form-control">
		</label>
	</div>

	<div>
		<button type="submit" class="btn btn-primary">ENVIAR</button>
	</div>
</form>