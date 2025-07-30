<?php

function cadastrarUmClienteNovo($conexao){
    limparTela();
    echo "Como é o nome do cliente: \n";
    echo "[M:M]: ";
    $nome = trim(fgets(STDIN));

    echo "Como é o número de telefone: \n";
    echo "[M:M]: ";
    $numero = trim(fgets(STDIN));

    echo "Quantos anos você tem: \n";
    echo "[M:M]: ";
    $idade = trim(fgets(STDIN));

    $sql = "INSERT INTO clientes (NOME, NUMERO_TELEFONE, IDADE) VALUES ('$nome', '$numero', '$idade')";
    mysqli_query($conexao, $sql);

    

}
?>



