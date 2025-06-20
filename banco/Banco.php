<?php
$bancoDados = "reservamm";
$host = "127.0.0.1";
$usuario = "root";
$Senha = "";

function dbx_connecta($host, $usuario, $senha, $bancoDados) {
    $conexao = mysqli_connect($host, $usuario, $senha, $bancoDados);

    if (!$conexao) {
        die("Erro ao conectar: " . mysqli_connect_error());
    }
    
    return $conexao;
}
?>


