<?php
function listarDescricoesQuarto($conexao) {
    echo "Descricoes dos Chalés: \n";
    $sql = "SELECT * FROM teste_quartos";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
        while ($linha = mysqli_fetch_assoc($resultado)) {
            echo "Chalé: " . $linha['id'] . " | Descrição: " . $linha['descricao'] . "\n";
        }
    } else {
        echo "Não foi possivel mostrar descrições dos chalés";
    }
}
?>