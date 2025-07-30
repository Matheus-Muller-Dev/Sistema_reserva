<?php

function cadastrarUmChaleNovo($conexao) {
    limparTela(); 
    echo "Como é o nome da suite nova: \n";
    echo "[M:M]: ";
    $suite = trim(fgets(STDIN));

    echo "Qual será o valor inicial da suite: \n";
    echo "[M:M]: ";
    $valor = trim(fgets(STDIN));

    echo "Descreva uma breve descrição sobre a suite: \n";
    echo "[M:M]: ";
    $descricao = trim(fgets(STDIN));

    $sql = "INSERT INTO teste_quartos(SUITE, VALOR, DESCRICAO) VALUES ('$suite', '$valor', '$descricao')";
    mysqli_query($conexao, $sql);

    
}