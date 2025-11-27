<?php 
// Configurações do Banco de Dados - Sistema Pakote Correios
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '');
	define('BASE', 'pakote_correios');
	
// Conexão com o banco de dados
	$conn = new MySQLi(HOST, USER, PASS, BASE);
	
// Verificar conexão
	if ($conn->connect_error) {
		die("Falha na conexão: " . $conn->connect_error);
	}
	
// Definir charset para UTF-8
	$conn->set_charset("utf8mb4");
?>