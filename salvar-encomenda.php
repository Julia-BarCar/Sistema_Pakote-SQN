<h1>Salvar Encomenda</h1>
<?php 
	switch (@$_REQUEST['acao']) {
		case 'cadastrar':
			$codigo_rastreio = $_POST['codigo_rastreio'];
			$remetente_id = $_POST['remetente_id'];
			$destinatario_id = $_POST['destinatario_id'];
			$funcionario_id = $_POST['funcionario_id'];
			$tipo_servico_id = $_POST['tipo_servico_id'];
			$peso = isset($_POST['peso']) ? $_POST['peso'] : null;
			$altura = isset($_POST['altura']) ? $_POST['altura'] : null;
			$largura = isset($_POST['largura']) ? $_POST['largura'] : null;
			$comprimento = isset($_POST['comprimento']) ? $_POST['comprimento'] : null;
			$valor_declarado = isset($_POST['valor_declarado']) ? $_POST['valor_declarado'] : null;
			$valor_total = $_POST['valor_total'];
			$previsao_entrega = isset($_POST['previsao_entrega']) ? $_POST['previsao_entrega'] : null;

			$sql = "INSERT INTO encomenda (codigo_rastreio, remetente_id, destinatario_id, funcionario_id, tipo_servico_id, peso, altura, largura, comprimento, valor_declarado, valor_total, previsao_entrega, status_encomenda) 
					VALUES ('{$codigo_rastreio}', '{$remetente_id}', '{$destinatario_id}', '{$funcionario_id}', '{$tipo_servico_id}', " . 
					($peso ? "'{$peso}'" : "NULL") . ", " . 
					($altura ? "'{$altura}'" : "NULL") . ", " . 
					($largura ? "'{$largura}'" : "NULL") . ", " . 
					($comprimento ? "'{$comprimento}'" : "NULL") . ", " . 
					($valor_declarado ? "'{$valor_declarado}'" : "NULL") . ", " . 
					"'{$valor_total}', " . 
					($previsao_entrega ? "'{$previsao_entrega}'" : "NULL") . ", 'POSTADO')";
			$res = $conn->query($sql);

			if ($res == true) {
				// Inserir primeiro registro de rastreamento
				$id_encomenda = $conn->insert_id;
				$sql_rastreio = "INSERT INTO rastreamento (encomenda_id, local, status, observacao) 
								VALUES ('{$id_encomenda}', 'Agência Pakote', 'Objeto postado', 'Encomenda postada no sistema')";
				$conn->query($sql_rastreio);
				
				print"<script>alert('Cadastrou com sucesso!');</script>";
				print"<script>location.href='?page=listar-encomenda';</script>";
			} else {
				print"<script>alert('Não cadastrou! Erro: {$conn->error}');</script>";
				print"<script>location.href='?page=listar-encomenda';</script>";
			}
			break;
			
		case 'editar':
			$codigo_rastreio = $_POST['codigo_rastreio'];
			$remetente_id = $_POST['remetente_id'];
			$destinatario_id = $_POST['destinatario_id'];
			$funcionario_id = $_POST['funcionario_id'];
			$tipo_servico_id = $_POST['tipo_servico_id'];
			$peso = isset($_POST['peso']) ? $_POST['peso'] : null;
			$altura = isset($_POST['altura']) ? $_POST['altura'] : null;
			$largura = isset($_POST['largura']) ? $_POST['largura'] : null;
			$comprimento = isset($_POST['comprimento']) ? $_POST['comprimento'] : null;
			$valor_declarado = isset($_POST['valor_declarado']) ? $_POST['valor_declarado'] : null;
			$valor_total = $_POST['valor_total'];
			$status_encomenda = $_POST['status_encomenda'];
			$previsao_entrega = isset($_POST['previsao_entrega']) ? $_POST['previsao_entrega'] : null;

			$sql = "UPDATE encomenda SET 
						codigo_rastreio='{$codigo_rastreio}', 
						remetente_id='{$remetente_id}',
						destinatario_id='{$destinatario_id}',
						funcionario_id='{$funcionario_id}',
						tipo_servico_id='{$tipo_servico_id}',
						peso=" . ($peso ? "'{$peso}'" : "NULL") . ",
						altura=" . ($altura ? "'{$altura}'" : "NULL") . ",
						largura=" . ($largura ? "'{$largura}'" : "NULL") . ",
						comprimento=" . ($comprimento ? "'{$comprimento}'" : "NULL") . ",
						valor_declarado=" . ($valor_declarado ? "'{$valor_declarado}'" : "NULL") . ",
						valor_total='{$valor_total}',
						status_encomenda='{$status_encomenda}',
						previsao_entrega=" . ($previsao_entrega ? "'{$previsao_entrega}'" : "NULL") . "
					WHERE id_encomenda=".$_REQUEST['id_encomenda'];
			$res = $conn->query($sql);
			
			if ($res == true) {
				print "<script>alert('Editou com sucesso!');</script>";
				print "<script>location.href='?page=listar-encomenda';</script>";
			} else {
				print "<script>alert('Não editou! Erro: {$conn->error}');</script>";
				print "<script>location.href='?page=listar-encomenda';</script>";
			}
			break;
			
		case 'excluir':
			$sql = "DELETE FROM encomenda WHERE id_encomenda=".$_REQUEST['id_encomenda'];
			$res = $conn->query($sql);
			if ($res == true) {
				print "<script>alert('Excluiu com sucesso!');</script>";
				print "<script>location.href='?page=listar-encomenda';</script>";
			} else {
				print "<script>alert('Não excluiu!');</script>";
				print "<script>location.href='?page=listar-encomenda';</script>";
			}
			break;
	}
?>