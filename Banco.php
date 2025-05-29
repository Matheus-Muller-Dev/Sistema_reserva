<?php
$bancoDados = ReservaMM;
$host = localhost;
$port = 3306;
$usuario = root;
$Password = "";

function dbx_connecta($host, $usuario, $senha, $bancoDados) {
	
	$conexao 	= 	@mysql_connect($host, $usuario, $senha, true) or die('Erro conexao ao Banco de dados ' . $bancoDados);
	
	return $conexao;

}

?>


