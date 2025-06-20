<?php

function cadastrarUmClienteNovo($conexao){
    echo "Como é o nome do cliente: ";
    $nome = trim(fgets(STDIN));

    echo "Como é o número de telefone: ";
    $numero = trim(fgets(STDIN));

    echo "Quantos anos você tem: ";
    $idade = trim(fgets(STDIN));

    $sql = "INSERT INTO clientes
            (nome, 
             telefone, 
             idade) 
             VALUES (?, ?, ?)";

    $statement = $conexao->prepare($sql);

    if (!$statement) {
        echo "Erro ao preparar statement: " . $conexao->error .  PHP_EOL;
        return;
    } 

    $statement->bind_param("sss", $nome, $telefone, $idade);

    if ($statement->execute()) {
        echo "Novo cliente foi cadastrado com sucesso";
    } else {
        echo "Não foi possivel cadastrar novo cliente";
    }
    $statement->close();
}
?>



