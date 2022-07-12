<!-- NO MÉTODO GET, AS VARIÁVEIS SÃO PASSADAS NA URL DO SITE, E EXISTE UMA FORMA DE CAPTURÁ-LAS*/
http://localhost/Curso_PHP/aula04.php?nome=Arthur&idade=20
<!-->

<!-- NO MÉTODO POST, AS VARIÁVEIS NÃO SÃO PASSADAS NA URL DO SITE, PORTANTO É MAIS INDICADO PARA CADASTROS POIS É MAIS SEGURO*/
http://localhost/Curso_PHP/aula04.php e para recuperá-las, basta  $_POST['nome']; <!-->
<p>O nome é: <?php echo $_GET['nome']; ?> </p>
<p>A idade é: <?php echo $_GET['idade']; ?> </p>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário</title>
</head>
<body>
    <form action="aula04.php" method="GET"> <!-- O campo "action" se refere para onde o formulário vai ser enviado,<!-->
     <label for="nome">Nome:</label>
     <input type="text" name="nome"> <br><br>
     <label for="idade">Idade:</label>
     <input type="text" name="idade"><br><br>
     <button type="submit">Enviar</button> <!-- O "type" submit indica que é para enviar os dados<!-->
    </form>
</body>
</html>