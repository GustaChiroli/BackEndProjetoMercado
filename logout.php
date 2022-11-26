<?php
    if(!isset($SESSION)) {
        session_start();
    }

    session_destroy(); //destroy a sessão
    header("Location: index.php"); //redireciona o usuario
?>