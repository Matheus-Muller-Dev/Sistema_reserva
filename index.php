<?php
// C:xampp\php\php.exe index.php

include "Banco.php";

$conexao = dbx_connecta("localhost", "root", "", "reservamm");

$Nome_cliente = "";

echo "Seja bem vindo, Ao chalé do Müller ";

$Nome_cliente = readline("Como é o seu nome? ");

$sql = "INSERT INTO clientes (nome) VALUES ('$Nome_cliente')";

if (mysqli_query($conexao, $sql)) {
    echo "Cliente salvo com sucesso!";
} else {
    echo "Erro ao salvar cliente: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>