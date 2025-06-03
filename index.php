<?php
// C:\xampp\php\php.exe index.php

include "banco/Banco.php";
include "funcoes/listarQuartoDisponveis.php";
include "funcoes/listarDescricoesQuarto.php";
include "funcoes/cadastrarUmClienteNovo.php";

$conexao = dbx_connecta("localhost", "root", "", "reservamm");

echo "Pousada Müller! Controle de hospedes e quartos! \n";

echo "Selecione uma opção: \n";
echo "1. Reservar um quarto. \n";
echo "2. Descrições dos quartos. \n";
echo "3. Cadastrar um cliente. \n";
echo "4. Cadastrar um novo quarto. \n";
$opcoesSelecionada = readline(" ");

if ($opcoesSelecionada == 1) {
    listarQuartosDisponiveis($conexao);
} elseif ($opcoesSelecionada == 2) {
    listarDescricoesQuarto($conexao);
} elseif ($opcoesSelecionada == 3) {
    cadastrarUmClienteNovo($conexao);
} elseif ($opcoesSelecionada == 4) {
    echo "Teste 4";
    // cadastrarUmChaleNovo($conexao);
} else {
    echo "Opção invalida, digite apenas números da seleção. \n";
} 

?>