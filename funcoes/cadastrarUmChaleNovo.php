<?php

function cadastrarUmChaleNovo($conexao) {
    echo "Qual vai ser a Suite nova: ";
    $suite = trim(fgets(STDIN));

    echo "Qual será o valor inicial da suite: ";
    $valor = trim(fgets(STDIN));

    echo "Descreva uma breve descrição sobre a suite";
    $descricao = trim(fgets(STDIN));

    $sql = "INSERT INTO teste_quartos(suite, valor, descricao) VALUES (?, ?, ?)";
    $statement = $conexao->prepare($sql);

    if (!$statement) {
        echo "Erro ao preparar statement: " . $conexao->error . PHP_EOL;
        return;
    }

    $statement->bind_param("sss", $suite, $valor, $descricao);

    if ($statement->execute()) {
        echo "Nova suite foi cadastrada com sucesso";
    } else {
        echo "Não foi possivel cadastrar nova suite";
    }
    $statement->close();
}