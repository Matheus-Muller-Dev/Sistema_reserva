<?php
// C:\xampp\php\php.exe index.php

include "banco/Banco.php";
include "funcoes/listarQuartoDisponveis.php";
include "funcoes/listarDescricoesQuarto.php";

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
} else {
    echo "Opção invalida, digite apenas números da seleção. \n";
} 

?>