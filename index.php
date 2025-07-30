<?php
// C:\xampp\php\php.exe index.php

include 'banco/Banco.php';
include 'funcoes/listarQuartosDisponiveis.php';
include 'funcoes/listarDescricoesQuarto.php';
include 'funcoes/cadastrarUmChaleNovo.php';
include 'funcoes/cadastrarUmClienteNovo.php';
include 'funcoes/gerenciarInformacoes.php';
include 'funcoes/quartoManutencao.php';
include 'funcoes/limparTela.php';
include 'funcoes/voltarAoMenuPrincipal.php';

$conexao = dbx_connecta($host, $usuario, $Senha, $bancoDados);
index($conexao);

function index($conexao) {
        limparTela();
        echo "Pousada Müller! Controle de hospedes e quartos! \n";

        echo "Selecione uma opção: \n";
        echo "1. Informações. \n";
        echo "2. Reserva de quartos\n";
        echo "[M:M]: ";
        $opcoesSelecionada = readline(" ");

        if ($opcoesSelecionada == 1) {
            gerenciarInformacoes($conexao);
        } elseif ($opcoesSelecionada == 2) {
            listarQuartosDisponiveis($conexao);
        } else {
            echo "Opção invalida, digite apenas números da seleção. \n";
        }
    }

?>