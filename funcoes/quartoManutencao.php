<?php 

function quartoManutencao($conexao) {
    limparTela();
    echo "\n";
    echo "Quartos em manutenção: \n";
        $sqlManutencao = "SELECT * FROM quartos WHERE DISPONIVEL = 3";
        $resultadoManutencao = mysqli_query($conexao, $sqlManutencao);

        $temManutencao = false;

        if ($resultadoManutencao && mysqli_num_rows($resultadoManutencao) > 0) {
            $temManutencao = true;
            while ($linha = mysqli_fetch_assoc($resultadoManutencao)) {
                echo "Numero: " . $linha['ID'] . " | Suíte: " . $linha['SUITE'] . " | Valor: R$ " . $linha['VALOR'] . "\n";
            }
        } else {
                echo "Nenhum quarto está em manutenção. \n";
        }
    

    echo "QUAL OPÇÃO VOCÊ DESEJA \n";
      
    echo "[1] Colocar em manutenção: \n";
    echo "[2] Retirar de manuteção: \n";
    echo "[M:M]: ";
    $rpManuntecao = readline(" ");


    echo "Qual quarto você deseja selecionar: \n";
    echo "[M:M]: ";
    $quartoSelecionado = trim(fgets(STDIN));
    $sqlFiltro = "SELECT * FROM quartos WHERE ID = $quartoSelecionado";

    $resultadoSql = mysqli_query($conexao, $sqlFiltro);

    if ( $rpManuntecao == 1 ) {
        $sqlCondicao = "UPDATE teste_quartos SET DISPONIVEL = 3 WHERE quartos . ID = $quartoSelecionado";
      
    $tratamento = $conexao->prepare($sqlCondicao);

        if (!$tratamento) {
            echo "Erro ao preparar tratamento: " . $conexao->error . PHP_EOL;
            return;
        }
        
        if ($tratamento->execute()) {
          echo "Suite foi colocada em manutenção com sucesso. ";
        } else {
          echo "Não foi possivel colocar suite em manuteção. ";
        }
        $tratamento->close();
      } 
}


