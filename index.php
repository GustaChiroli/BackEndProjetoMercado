<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {
    if(strlen($_POST['email']) == 0) {
        echo "Preencha seu e-mail";
    } else if(strlen($_POST['senha']) == 0) {
        echo "Preencha sua senha";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']); //limpa para caso venha uma injection sql tipo 'OR 1='1'
        $senha = $mysqli->real_escape_string($_POST['senha']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'"; //select montado
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do codigo sql: " . $mysqli->error); //select injetado na query

        $quantidade = $sql_query->num_rows; //capturando o numero de linhas que sao compativeis
        if($quantidade == 1) { // verifica se encontrou apenas 1 conta com esse login/senha
            $usuario = $sql_query->fetch_assoc(); // capturando dados do usuario vindos do sql

            if(!isset($_SESSION)) { //se nao houver uma sessao criada
                session_start(); //inicia uma nova sessão 
            }

            $_SESSION['id'] = $usuario['id']; // armazenando a id que identifica o usuario
            $_SESSION['nome'] = $usuario['nome'];

            header("Location: painel.php"); //redirecionando para a pagina painel;

        } else {
            echo "Falha ao logar! e-mail ou senha incorretos";
        }
        
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h1>Acesse sua conta</h1>
    <form action="" method="POST">
        <p>
            <label>E-mail</label>
            <input type="text" name="email">
        </p>
        <p>
            <label>Senha</label>
            <input type="password" name="senha">
        </p>
        <p>
            <button type="submit">Entrar</button> 
        </p>
        
        </input>
    </form>

    <p>
        <a href="cadastro.php">Cadastrar</a>
    </p>
    
</body>
</html>