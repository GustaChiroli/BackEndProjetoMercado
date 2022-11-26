<?php
    if(isset($_POST['email'])) {
        include('conexao.php');
        $nome = $_POST['nome'];
        $email = $_POST['email']; //fazer validação mais tarde(email ja existe? email segue o padrao?)
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); //criptografando senha e adicionando a variavel


        $mysqli->query("INSERT INTO usuarios (nome, email, senha) VALUES('$nome', '$email', '$senha')");

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
</head>
<body>
    Cadastrar Senha
    <form action="" method="post">
        <p>
            <label>Nome</label>
            <input type="text" name="nome"/>
        </p>
        <p>
            <label>E-mail</label>
            <input type="text" name="email"/>
        </p>
        <p>
            <label>Senha</label>
            <input type="password" name="senha"/>
        </p>
        <p>
            <button type="submit">Cadastrar Senha</button>
        </p>
    </form> 
    
</body>
</html>