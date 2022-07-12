<?php 
include("conexao.php");
if(isset($_POST['confirmar'])) {

    $id_cliente = intval($_GET['id']); //Pegando o parâmetro id na url e transformando para int para n ter erro;
    $sql_code = "DELETE FROM clientes WHERE id_cliente = '$id_cliente'";
    $sql_query = $mysqli->query($sql_code) or die($mysqli->error); 

    if($sql_query) { ?>
    <h2>Cliente removido com sucesso!</h2>
    <a href="clientes.php">Voltar para a lista de clientes</a>
    <?php
    die();
    }

}
?>


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deletar cliente</title>
</head>
<body>
    <h1>Tem certeza que deseja excluir esse cliente?</h1>

    <form action="" method="POST">
    <button type="submit" name="confirmar" value="1">Sim</button>
    <a style="margin-left: 50px;" href="clientes.php">Não</a>
    </form>
    
</body>
</html>