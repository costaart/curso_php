<?php
if(isset($_POST['nome'])){
    $vencimentoCookie = time() + (30 * 24 * 60 * 60); //timestamp atual + 30 dias (60 segundos > 60 minutos > 24 horas e 30 dias)
    setcookie ("nome", $_POST['nome'], $vencimentoCookie);
      
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Utilizando Cookies</title>
</head>
<body>
    <?php
    if(isset($_COOKIE['nome'])) {
        echo "Bem-vindo, " . $_COOKIE['nome'];
    } else {
     ?>
    <form action="" method="POST">
    <h1>Formulário</h1>
     
    <label for="nome">Nome:</label>
     <input  type="text" name="nome">
     <button name="" type="submit">Enviar</button> <!-- O "type" submit indica que é para enviar os dados<!-->
    </form>
    <?php
 }
  ?>
</body>
</html>