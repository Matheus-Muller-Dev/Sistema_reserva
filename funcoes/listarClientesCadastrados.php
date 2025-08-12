<?php

function listarClientesCadastrados($conexao) {
    limparTela();
    echo "Clientes cadastrados: \n";
    $sql = "SELECT * FROM clientes";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "| Nome: " . $linha['NOME'] . " | Número de telefone: " . $linha['NUMERO_TELEFONE'] . " | Idade: " . $linha['IDADE'] . " | \n";
        }
    } else {
        echo "Não foi possivel mostrar clientes cadastrados";
    }
    voltarAoMenuPrincipal();
}

?>