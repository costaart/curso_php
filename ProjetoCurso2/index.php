<?php
include("conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Busca</title>
</head>
<body>
    <h1>Lista de Veículos</h1>
    <!-- Poderia usar o método POST, mas ele nao aparece na url, e pra pegar ele usaria o $_POST-->
    <form action="">
        <input value="<?php if(isset($_GET['busca'])) echo $_GET['busca'] ;?>" placeholder="Digite os termos da pesquisa:" name="busca" type="text">
        <button type="submit">Pesquisar</button>
    </form>
    <br><br>

    <table width="600px" border="1">
        <tr>
            <th>Fabricante</th>
            <th>Veículo</th>
            <th>Modelo</th>
        </tr>
        <?php
        if(!isset($_GET['busca'])) {
            ?>
            <tr>
            <td colspan="3">Digite algo para pesquisar...</td>
            </tr>
            <?php 
            } else {
          
           $pesquisa = $mysqli->real_escape_string($_GET['busca']); //Tratar a variavel de pesquisa pra n ter sql injection, caso n queria tratar ficaria só $pesquisa = $_GET['busca']
           $sql_code = "SELECT * FROM veiculos WHERE fabricante LIKE '%$pesquisa%' OR modelo LIKE '%$pesquisa%' OR veiculo LIKE '%$pesquisa%'";
   
           $sql_query = $mysqli->query($sql_code) or die($mysqli->error); //cria uma variavel sql-query, e atribui a ela a pesquisa feita em cima 'sqlcode' 
           
           if($sql_query->num_rows == 0 ) {
               ?>
               <tr><td colspan="3">Nenhum resultado encontrado...</td></tr>
               <?php
           } else {
                while($dados = $sql_query->fetch_assoc()) {
                    ?>
                    <tr>
                        <td><?php echo $dados['fabricante'];?></td>
                        <td><?php echo $dados['veiculo'];?></td>
                        <td><?php echo $dados['modelo'];?></td>
                    </tr>
                    <?php
                }
           }
           
           
           
           
           
           ?>

             
              <?php } ?>  
    </table>

</body>
</html>