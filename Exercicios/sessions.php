<?php

/* A UTILIZAÇÃO DE SESSION É INDICADA PARA QUANDO O USUÁRIO NECESSITA DAQUELA INFORMAÇÃO MEESMO DEPOIS DE FECHAR O SISTEMA, OU SEJA, MUITO UTILIZADA EM LOGINS
é uma variavel que necessita de inicialização -> if(!isset($_SESSION)) { se n tiver sessão, criar uma;

    session_start();
    session_destroy(); qnd o usuário se deslogar

}
*/






if(isset($_POST['email'])) {
    include('conexaoSenha.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql_code = "SELECT * FROM senhas WHERE email = '$email' LIMIT 1";
    $sql_exec = $mysqli->query($sql_code) or die($mysqli->error);

    $usuario = $sql_exec->fetch_assoc();
    if (password_verify($senha, $usuario['senha'])){
        if(!isset($_SESSION))
        session_start();
        $_SESSION['usuario'] = $usuario['id'];
        header("Location: index.php");
    } else {
        echo "Erro ao Logar!";
    }
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
    <h1>LOGIN</h1>
    <form action="" method="POST">
        <label for="email">Digite seu email:</label>
        <input name="email" type="text"> <br><br>
        <label for="senha">Digite sua senha:</label>
        <input name="senha" type="text">
        <button type="submit">Cadastrar</button>
    </form>
    <a href="criptografia.php">Cadastrar usuário</a>
</body>
</html>
