<?php include("conexao.php");

$sql_clientes = "SELECT * FROM clientes";
$query_clientes = $mysqli->query($sql_clientes) or die($mysqli->error);
$numero_clientes = $query_clientes->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>
</head>
<body>
    <a href="cadastrar_cliente.php">Cadastrar Clientes</a>
    <h1>Lista de Clientes</h1>
    <p>Esses são os clientes cadastrados no seu sistema:</p>
    <table border="1" cellpadding="10">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Data de Nascimento</th>
            <th>Telefone</th>
            <th>Data de Cadastro</th>
            <th>Ações</th>
        </thead>
        <tbody>
            <?php if($numero_clientes == 0) { ?>
                <tr>
                     <td colspan="7">Nenhum cliente foi cadastrado!</td> 
                </tr>
            <?php 
            } else { 
                while ($cliente = $query_clientes->fetch_assoc()){
                /*Enquanto tiver referencias no banco, vai imprimir*/

               $telefone = "Não informado.";
               if(!empty($cliente['telefone_cliente'])) {
                   $telefone = formatarTelefone($cliente['telefone_cliente']);
               }      
               $nascimento = "Não informado.";   
               if (!empty($cliente['data_nasc_cliente'])) {
                    $nascimento = formatarData($cliente['data_nasc_cliente']);
                    /* EXPLICAÇÃO -> NA FUNÇÃO formataData. Primeiro ele explode a data inserida pelo usuário em 3:
                     2002-01-28 vira 2002|01|28.
                    Depois ele inverte a ordem para mostrar no modelo br com o array_reverse:
                    28|01|2002
                     E por fim, ele junta todos usando o implode com a barra
                    28/01/2002            
            */
               }
               $data_cadastro = date("d/m/Y H:i", strtotime($cliente['data_cadastro_cliente'])); //strtotime transforma a data em timestamp 'uma medida' e o date transforma o timestamp em data normal formatada.





            ?>  
            <tr>
                <td><?php echo $cliente['id_cliente'];?></td>
                <td><?php echo $cliente['nome_cliente'];?></td>
                <td><?php echo $cliente['email_cliente'];?></td>
                <td><?php echo $nascimento;?></td>
                <td><?php echo $telefone;?></td>
                <td><?php echo $data_cadastro;?></td>
                <td>
                    <a href="editar_cliente.php?id=<?php echo $cliente['id_cliente'];?>">Editar</a> 
                    <a href="excluir_cliente.php?id=<?php echo $cliente['id_cliente'];?>">Excluir</a>
                    <!-- Está passando na url o id do cliente para identificar qual ele está modificando -->
                </td>
            </tr>
            <?php 
            }
        } ?>
        </tbody>
    </table>
</body>
</html>