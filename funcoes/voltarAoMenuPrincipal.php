<?php

function voltarAoMenuPrincipal() {

    echo "Gostaria de voltar ao Menu Principal?(S/N): \n";
    echo "[M:M]: ";
    $rspMenu = readline(" ");

    if ($rspMenu == 'S') {
        index($conexao);
    } else {
        echo "Finalizando...";
        limparTela();
    }
}

?>