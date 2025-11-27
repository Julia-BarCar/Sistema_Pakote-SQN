<h1>Cadastrar Funcionário</h1>
<form action="?page=salvar-funcionario" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="mb-3">
		<label>Nome
			<input type="text" name="nome_funcionario" class="form-control" required>
		</label>
	</div>
	<div class="mb-3">
		<label>CPF
			<input type="text" name="cpf" class="form-control" maxlength="11" placeholder="Somente números" required>
		</label>
		<small class="form-text text-muted">Digite apenas números (11 dígitos)</small>
	</div>
	<div class="mb-3">
		<label>Cargo
			<input type="text" name="cargo" class="form-control" required>
		</label>
	</div>
	<div class="mb-3">
		<label>E-mail
			<input type="email" name="email_funcionario" class="form-control" required>
		</label>
	</div>
	<div class="mb-3">
		<label>Telefone
			<input type="text" name="telefone_funcionario" class="form-control" required>
		</label>
	</div>
	<div class="mb-3">
		<label>Data de Admissão
			<input type="date" name="data_admissao" class="form-control">
		</label>
	</div>
	<div>
		<button type="submit" class="btn btn-primary">ENVIAR</button>
	</div>
</form>