<?php 

function listarQuartosDisponiveis($conexao) {
    echo "Quartos disponiveis para reservar: \n";
    $sql = "SELECT * FROM teste_quartos WHERE disponivel = 1";
    $resultado = mysqli_query($conexao, $sql);

    if ($resultado && mysqli_num_rows($resultado) > 0) {
    while ($linha = mysqli_fetch_assoc($resultado)) {
        echo "Numero: " . $linha['id'] . " | Suíte: " . $linha['suite'] . " | Valor: R$ " . $linha['valor'] . "\n";
      }
  } else {
    echo "Nenhum quarto disponivel no momento. \n";

  }
}

?>