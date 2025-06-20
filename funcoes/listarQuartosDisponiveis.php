<?php 

function listarQuartosDisponiveis($conexao) {
  echo "Quartos disponiveis para reservar: \n";
        $sqlDisponivel = "SELECT * FROM teste_quartos WHERE disponivel = 1";
        $resultado = mysqli_query($conexao, $sqlDisponivel);

        $temDisponivel = false; // Flag para saber se tem quartos disponivel

  if ($resultado && mysqli_num_rows($resultado) > 0) {
      $temDisponivel = true;
      while ($linha = mysqli_fetch_assoc($resultado)) {
      echo "Numero: " . $linha['id'] . " | Suíte: " . $linha['suite'] . " | Valor: R$ " . $linha['valor'] . "\n";
        }
      } else {
        echo "Nenhum quarto disponivel no momento. \n";
    }

  echo "\n";
  echo "Quartos reservados: \n";
        $sqlReservados = "SELECT * FROM teste_quartos WHERE disponivel = 2";
        $resultadoReservado = mysqli_query($conexao, $sqlReservados);

        $temReservado = false;
        $quantidadeReservado = mysqli_num_rows($resultadoReservado);
  if ($resultadoReservado && $quantidadeReservado > 0){
    while ($linha = mysqli_fetch_assoc($resultadoReservado)) {
      echo "Numero: " . $linha['id'] . " | Suíte: " . $linha['suite'] . " | Valor: R$ " . $linha['valor'] . "\n";
    }
  } else {
      echo "Nenhum quarto foi reservado no momento. \n";
  }

  echo "\n";
  echo "Você deseja qual opção: \n";
  echo "[1] Reservar um quarto. \n";
  echo "[2] Liberar um quarto? \n";
  echo "\n";
  $opcaoSelecionada = trim(fgets(STDIN));

  // Realizar tratamento para analisar, se a opção informada há algum valor, se não, não mostrar!

  if ($opcaoSelecionada == 1) {
      if (!$temDisponivel) {
          echo "Não há quartos para reservar, libere primeiro. \n";
          return;       
      }

        echo "Qual Suite você deseja agendar? ";
        $agendarSuite = trim(fgets(STDIN)); // valor de entrada de usuario
        $sqlNumeroQuarto = "SELECT * FROM teste_quartos WHERE id = $agendarSuite;"; // slq codição para verificar se estar disponivel
    
        $resultadoCondicao = mysqli_query($conexao, $sqlNumeroQuarto);
        $linhaId = mysqli_fetch_assoc($resultadoCondicao);


        if ($agendarSuite == $linhaId['id']) {
        $sqlCondicao = "UPDATE teste_quartos SET disponivel = 2 WHERE teste_quartos . id = $agendarSuite";
       
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

      echo "Qual suite você deseja liberar: ";
      $liberarSuite = trim(fgets(STDIN));
      $sqlNumeroQuarto = "SELECT * FROM teste_quartos WHERE id = $liberarSuite";
      
      $resultadoCondicao = mysqli_query($conexao, $sqlNumeroQuarto);
      $linhaId = mysqli_fetch_assoc($resultadoCondicao);

      if ($liberarSuite == $linhaId['id']) {
        $sqlCondicao = "UPDATE teste_quartos SET disponivel = 1 WHERE teste_quartos . id = $liberarSuite";

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

