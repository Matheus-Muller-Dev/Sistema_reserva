<?php 

function listarQuartosDisponiveis($conexao) { 
  limparTela();
  echo "Quartos disponiveis para reservar: \n";
        $sqlDisponivel = "SELECT * FROM teste_quartos WHERE DISPONIVEL = 1";
        $resultado = mysqli_query($conexao, $sqlDisponivel);

        $temDisponivel = false; // Flag para saber se tem quartos disponivel

  if ($resultado && mysqli_num_rows($resultado) > 0) {
      $temDisponivel = true;
      while ($linha = mysqli_fetch_assoc($resultado)) {
      echo "Numero: " . $linha['ID'] . " | Suíte: " . $linha['SUITE'] . " | Valor: R$ " . $linha['VALOR'] . "\n";
        }
      } else {
        echo "Nenhum quarto disponivel no momento. \n";
    }

  echo "\n";
  echo "Quartos reservados: \n";
        $sqlReservados = "SELECT * FROM teste_quartos WHERE DISPONIVEL = 2";
        $resultadoReservado = mysqli_query($conexao, $sqlReservados);

        $temReservado = false;
        
  if ($resultadoReservado && mysqli_num_rows($resultadoReservado) > 0){
    $temReservado = true;
    while ($linha = mysqli_fetch_assoc($resultadoReservado)) {
      echo "Numero: " . $linha['ID'] . " | Suíte: " . $linha['SUITE'] . " | Valor: R$ " . $linha['VALOR'] . "\n";
    }
  } else {
      echo "Nenhum quarto foi reservado no momento. \n";
  }

  echo "\n";
  echo "[MENU DE OPÇÕES]\n";
  echo "\n";
  echo "[1] Reservar um quarto. \n";
  echo "[2] Liberar um quarto? \n";
  echo "[M:M]: ";
  $opcaoSelecionada = trim(fgets(STDIN));

  if ($opcaoSelecionada == 1) {
      if (!$temDisponivel) {
          echo "Não há quartos para reservar, libere primeiro. \n";
          return;       
      }

        echo "Qual Suite você deseja agendar? \n";
        echo "[M:M]: ";
        $agendarSuite = trim(fgets(STDIN)); // valor de entrada de usuario
        $sqlNumeroQuarto = "SELECT * FROM teste_quartos WHERE ID = $agendarSuite;"; // slq codição para verificar se estar disponivel
    
        $resultadoCondicao = mysqli_query($conexao, $sqlNumeroQuarto);
        $linhaId = mysqli_fetch_assoc($resultadoCondicao);


        if ($agendarSuite == $linhaId['ID']) {
        $sqlCondicao = "UPDATE teste_quartos SET DISPONIVEL = 2 WHERE teste_quartos . ID = $agendarSuite";
       
        $tratamento = $conexao->prepare($sqlCondicao);

        if (!$tratamento) {
            echo "Erro ao preparar statement: " . $conexao->error .  PHP_EOL;
            return;
        } 

      if ($tratamento->execute()) {
        echo "Suite foi agendada com sucesso.";
      } else {
        echo "Não foi possivel agendar suite.";
      }
      $tratamento->close();
      // também podendo usar apenas: 
      //mysqli_query($conexao, $sqlCondicao); 
      }

  } elseif ($opcaoSelecionada == 2) {
      
      if (!$temReservado) {
          echo "Não tem quartos para liberar, agende primeiro";
          return;
      }

      echo "Qual suite você deseja liberar: \n";
      echo "[M:M]: ";
      $liberarSuite = trim(fgets(STDIN));
      $sqlNumeroQuarto = "SELECT * FROM teste_quartos WHERE ID = $liberarSuite";
      
      $resultadoCondicao = mysqli_query($conexao, $sqlNumeroQuarto);
      $linhaId = mysqli_fetch_assoc($resultadoCondicao);

      if ($liberarSuite == $linhaId['ID']) {
        $sqlCondicao = "UPDATE teste_quartos SET DISPONIVEL = 1 WHERE teste_quartos . ID = $liberarSuite";

        $tratamento = $conexao->prepare($sqlCondicao);

        if (!$tratamento) {
            echo "Erro ao preparar tratamento: " . $conexao->error . PHP_EOL;
            return;
        }
        if ($tratamento->execute()) {
          echo "Suite foi liberada com sucesso. ";
        } else {
          echo "Não foi possivel liberar suite. ";
        }
        $tratamento->close();
      }
  } else {
    echo "Digite uma opção valida! ";
  }

}

?>

