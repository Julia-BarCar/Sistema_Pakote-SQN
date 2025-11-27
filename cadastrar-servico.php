<h1>Cadastrar Serviço</h1>
<form action="?page=salvar-servico" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="mb-3">
		<label>Nome do Serviço
			<input type="text" name="nome_servico" class="form-control" placeholder="Ex: SEDEX, PAC" required>
		</label>
	</div>
	<div class="mb-3">
		<label>Descrição
			<textarea name="descricao" class="form-control" rows="3"></textarea>
		</label>
	</div>
	<div class="mb-3">
		<label>Prazo (dias)
			<input type="number" name="prazo_dias" class="form-control" min="1" placeholder="Ex: 2">
		</label>
	</div>
	<div class="mb-3">
		<label>Preço Base (R$)
			<input type="number" step="0.01" name="preco_base" class="form-control" placeholder="Ex: 25.00">
		</label>
	</div>
	<div>
		<button type="submit" class="btn btn-primary">ENVIAR</button>
	</div>
</form>