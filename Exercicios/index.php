<?php
if(!isset($_SESSION)){
    session_start();
}

if(!isset($_SESSION['usuario'])){
    die('Você não está logado! <a href="sessions.php">Login</a>' );
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário Logado</title>
</head>
<body>
    <h1>Usuário Logado com sucesso!</h1>
</body>
</html>