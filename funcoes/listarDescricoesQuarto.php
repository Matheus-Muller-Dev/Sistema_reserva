<?php

function listarDescricoesQuarto($conexao) {
    limparTela();
    echo "Descricoes dos Chalés: \n";
    $sql = "SELECT * FROM teste_quartos";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "| Chalé: " . $linha['ID'] . " | Nome do quarto: " . $linha['SUITE'] . " | Descrição: " . $linha['DESCRICAO'] . " | \n";
        }
    } else {
        echo "Não foi possivel mostrar descrições dos chalés";
    }
    voltarAoMenuPrincipal();
}

?>