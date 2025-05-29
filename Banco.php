<?php
$bancoDados = "ReservaMM";
$host = "localhost";
$usuario = root;
$Senha = "";

function dbx_connecta($host, $usuario, $senha, $bancoDados) {
	$conexao 	= 	@mysql_connect($host, $usuario, $senha, true);
	
	if (!$conexao) {
	die('Erro conexao ao Banco de dados ' . mysqli_connect_error());
	}

	return $conexao;
}
?>


