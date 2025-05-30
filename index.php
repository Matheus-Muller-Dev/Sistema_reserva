<?php
// C:\xampp\php\php.exe index.php

include "Banco.php";

$conexao = dbx_connecta("localhost", "root", "", "reservamm");

echo "Pousada Müller! Controle de hospedes e quartos! \n";

$nomeCliente = readline("Como é o seu nome? \n");

$sql = "INSERT INTO clientes (nome) VALUES ('$nomeCliente')";

if (mysqli_query($conexao, $sql)) {
    echo "Cliente salvo com sucesso!";
} else {
    echo "Erro ao salvar cliente: " . mysqli_error($conexao);
}

mysqli_close($conexao);
?>