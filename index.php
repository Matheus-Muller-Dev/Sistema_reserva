<?php
include "Banco.php";

$conexao = dbx_connecta("localhost", "root", "", "ReservaMM");

$Nome_cliente = "";

echo "Seja bem vindo, Ao chalé do Müller" . PHP_EOL;

$Nome_cliente = readline("Como é o seu nome? ");

$sql = "INSERT INTO clientes (nome) VALUES ('$Nome_cliente')";

if (mysqli_query($conexao, $sql)) {
    echo "Cliente salvo com sucesso!" . PHP_EOL;
} else {
    echo "Erro ao salvar cliente: " . mysqli_error($conexao) . PHP_EOL;
}

mysqli_close($conexao);

?> 