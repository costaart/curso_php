<?php
include("conexaoSenha.php");
if(isset($_POST['email'])) {
    
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); //método indicado para criptografia, o md5 não é mt indicado pois na internet fizeram uma relaçao entre as senhas e o calculo obtido de criptografia, ou seja, tem como retornar e descobrir a senha. Esse password hash é aleatorio portanto n tem esse problema
    //ai para verificar essa senha criptografada em um login, basta usar a função
    /*
    password_verify($senha, $usuario['senha']);
    
    */
    $mysqli->query("INSERT INTO senhas (email, senha) VALUES ('$email', '$senha')");
}

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criptografia de Senha</title>
</head>
<body>
    <h1>CADASTRO DE USUÁRIO</h1>
    <form action="" method="POST">
        <label for="email">Digite seu email:</label>
        <input name="email" type="text"><br><br>
        <label for="senha">Digite sua senha:</label>
        <input name="senha" type="text">
        <button type="submit">Cadastrar</button>
    </form>
    <a href="sessions.php">Realizar login</a>
</body>
</html>


