<h1>Editar Destinatário</h1>
<?php 
	$sql = "SELECT * FROM destinatario  WHERE id_destinatario = ".@$_REQUEST['id_destinatario'];
	$res = $conn->query($sql);
	$row = $res->fetch_object();
 ?>
 <form action="?page=salvar-destinatario" method="POST">
 	<input type="hidden" name="acao" value="editar">
 	<input type="hidden" name="id_destinatario" 	value="<?php print $row->id_destinatario; ?>">
 	<div class="mb-3">
 		<label>Nome
 			<input type="text" name="nome_destinatario" class="form-control" value="<?php print $row->nome_destinatario; ?>">
 		</label>
 	</div>
 	<div class="mb-3">
 		<label>CPF/CNPJ
 			<input type="text" name="cpf_cnpj" class="form-control" value="<?php print $row->cpf_cnpj; ?>">
 		</label>
 	</div>
 	<div class="mb-3">
 		<label>E-mail
 			<input type="text" name="email" class="form-control" value="<?php print $row->email; ?>">
 		</label>
 	</div>
 	<div class="mb-3">
 		<label>Telefone
 			<input type="text" name="telefone" class="form-control" value="<?php print $row->telefone; ?>">
 		</label>
 	</div>
 	<div class="mb-3">
 		<label>Endereço
 			<input type="text" name="endereco" class="form-control" value="<?php print $row->endereco; ?>">
 		</label>
 	</div>
 	<div class="mb-3">
 		<label>Cidade
 			<input type="text" name="cidade" class="form-control" value="<?php print $row->cidade; ?>">
 		</label>
 	</div>
 	<div class="mb-3">
 		<label>Estado
 			<select name="estado" class="form-control">
				<option value="">Selecione</option>
				<option value="AC" <?php if($row->estado == 'AC') print 'selected'; ?>>AC</option>
				<option value="AL" <?php if($row->estado == 'AL') print 'selected'; ?>>AL</option>
				<option value="AP" <?php if($row->estado == 'AP') print 'selected'; ?>>AP</option>
				<option value="AM" <?php if($row->estado == 'AM') print 'selected'; ?>>AM</option>
				<option value="BA" <?php if($row->estado == 'BA') print 'selected'; ?>>BA</option>
				<option value="CE" <?php if($row->estado == 'CE') print 'selected'; ?>>CE</option>
				<option value="DF" <?php if($row->estado == 'DF') print 'selected'; ?>>DF</option>
				<option value="ES" <?php if($row->estado == 'ES') print 'selected'; ?>>ES</option>
				<option value="GO" <?php if($row->estado == 'GO') print 'selected'; ?>>GO</option>
				<option value="MA" <?php if($row->estado == 'MA') print 'selected'; ?>>MA</option>
				<option value="MT" <?php if($row->estado == 'MT') print 'selected'; ?>>MT</option>
				<option value="MS" <?php if($row->estado == 'MS') print 'selected'; ?>>MS</option>
				<option value="MG" <?php if($row->estado == 'MG') print 'selected'; ?>>MG</option>
				<option value="PA" <?php if($row->estado == 'PA') print 'selected'; ?>>PA</option>
				<option value="PB" <?php if($row->estado == 'PB') print 'selected'; ?>>PB</option>
				<option value="PR" <?php if($row->estado == 'PR') print 'selected'; ?>>PR</option>
				<option value="PE" <?php if($row->estado == 'PE') print 'selected'; ?>>PE</option>
				<option value="PI" <?php if($row->estado == 'PI') print 'selected'; ?>>PI</option>
				<option value="RJ" <?php if($row->estado == 'RJ') print 'selected'; ?>>RJ</option>
				<option value="RN" <?php if($row->estado == 'RN') print 'selected'; ?>>RN</option>
				<option value="RS" <?php if($row->estado == 'RS') print 'selected'; ?>>RS</option>
				<option value="RO" <?php if($row->estado == 'RO') print 'selected'; ?>>RO</option>
				<option value="RR" <?php if($row->estado == 'RR') print 'selected'; ?>>RR</option>
				<option value="SC" <?php if($row->estado == 'SC') print 'selected'; ?>>SC</option>
				<option value="SP" <?php if($row->estado == 'SP') print 'selected'; ?>>SP</option>
				<option value="SE" <?php if($row->estado == 'SE') print 'selected'; ?>>SE</option>
				<option value="TO" <?php if($row->estado == 'TO') print 'selected'; ?>>TO</option>
			</select>
 		</label>
 	</div>
 	<div class="mb-3">
 		<label>CEP
 			<input type="text" name="cep" class="form-control" value="<?php print $row->cep; ?>">
 		</label>
 	</div>
 	<div>
		<button type="submit" class="btn btn-primary">ENVIAR</button>
	</div>
 </form>