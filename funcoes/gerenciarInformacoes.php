<?php 

function gerenciarInformacoes($conexao) { 
    limparTela();
    echo "Pousada Müller! Controle de hospedes e quartos! \n";

    echo "Selecione uma opção: \n";
    echo "1. Descrições dos quartos. \n";
    echo "2. Cadastrar um novo quarto. \n";
    echo "3. Cadastrar um novo cliente. \n";
    echo "4. Colocar quarto em manutenção \n";
    echo "[M:M]: ";
    $opcoesSelecionada = readline(" ");

    if ($opcoesSelecionada == 1) {
        listarDescricoesQuarto($conexao);
    } elseif ($opcoesSelecionada == 2) {
        cadastrarUmChaleNovo($conexao);
    } elseif ($opcoesSelecionada == 3) {
        cadastrarUmClienteNovo($conexao);
    } elseif ($opcoesSelecionada == 4) {
        quartoManutencao($conexao);
    } else {
        echo "Opção invalida, digite apenas números da seleção. \n";
    } 
}

?>

