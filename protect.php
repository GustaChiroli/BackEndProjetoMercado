<?php
    if(!isset($_SESSION)) {
        session_start(); //caso nao esteja iniciada a sessao ele inicia
    }

    if(!isset($_SESSION['id'])) { //caso nao esteja logado ele mata a aplicação
        die("Você não pode acessar essa página porque não está logado.<p><a href=\"index.php\">Entrar</a></p>");
    }
?>