<h1>Cadastrar Destinatário</h1>
<form action="?page=salvar-destinatario" method="POST">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="mb-3">
		<label>Nome
			<input type="text" name="nome_destinatario" class="form-control" required>
		</label>
	</div>
	<div class="mb-3">
		<label>CPF
			<input type="text" name="cpf_cnpj" class="form-control" maxlength="11" placeholder="Somente números">
		</label>
		<small class="form-text text-muted">Digite apenas números (11 dígitos)</small>
	</div>
	<div class="mb-3">
		<label>E-mail
			<input type="email" name="email" class="form-control">
		</label>
	</div>
	<div class="mb-3">
		<label>Telefone
			<input type="text" name="telefone" class="form-control">
		</label>
	</div>
	<div class="mb-3">
		<label>Endereço
			<input type="text" name="endereco" class="form-control" required>
		</label>
	</div>
	<div class="mb-3">
		<label>Cidade
			<input type="text" name="cidade" class="form-control" required>
		</label>
	</div>
	<div class="mb-3">
		<label>Estado
			<select name="estado" class="form-control" required>
				<option value="">Selecione</option>
				<option value="AC">AC</option>
				<option value="AL">AL</option>
				<option value="AP">AP</option>
				<option value="AM">AM</option>
				<option value="BA">BA</option>
				<option value="CE">CE</option>
				<option value="DF">DF</option>
				<option value="ES">ES</option>
				<option value="GO">GO</option>
				<option value="MA">MA</option>
				<option value="MT">MT</option>
				<option value="MS">MS</option>
				<option value="MG">MG</option>
				<option value="PA">PA</option>
				<option value="PB">PB</option>
				<option value="PR">PR</option>
				<option value="PE">PE</option>
				<option value="PI">PI</option>
				<option value="RJ">RJ</option>
				<option value="RN">RN</option>
				<option value="RS">RS</option>
				<option value="RO">RO</option>
				<option value="RR">RR</option>
				<option value="SC">SC</option>
				<option value="SP">SP</option>
				<option value="SE">SE</option>
				<option value="TO">TO</option>
			</select>
		</label>
	</div>
	<div class="mb-3">
		<label>CEP
			<input type="text" name="cep" class="form-control" maxlength="9" placeholder="00000-000" required>
		</label>
	</div>
	<div>
		<button type="submit" class="btn btn-primary">ENVIAR</button>
	</div>
</form>