<?php 

function gerenciarInformacoes($conexao) { 
    limparTela();
    echo "Pousada Müller! Controle de hospedes e quartos! \n";

    echo "Selecione uma opção: \n";
    echo "1. Quartos cadastrados. \n";
    echo "2. Clientes cadastrados. \n";
    echo "3. Cadastrar um novo quarto. \n";
    echo "4. Cadastrar um novo cliente. \n";
    echo "5. Colocar quarto em manutenção \n";
    echo "[M:M]: ";
    $opcoesSelecionada = readline(" ");

    if ($opcoesSelecionada == 1) {
        listarDescricoesQuarto($conexao);
    } elseif ($opcoesSelecionada == 2) {
        listarClientesCadastrados($conexao); // Criar algoritimo para listar clientes cadastrados.
    } elseif ($opcoesSelecionada == 3) {
        cadastrarUmChaleNovo($conexao);
    } elseif ($opcoesSelecionada == 4) {
        cadastrarUmClienteNovo($conexao);
    } elseif ($opcoesSelecionada == 5) {
        quartoManutencao($conexao);
    } else {
        echo "Opção invalida, digite apenas números da seleção. \n";
    } 
}

?>

