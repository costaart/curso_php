<?php
/*Como o PHP instancia na inicialização a variavel _POST, o 'isset$_POST não cumpre sua função pq de fato sempre vai existir essa variavel, mesmo qnd ela estiver vazia. Então nesse caso, usa-se o COUNT > 0, pois ai só aparece algo se a variavel POST for usada' */
include ('conexao.php');
$id_cliente = intval($_GET['id']); //Pegando o parâmetro id na url e transformando para int para n ter erro;

function limpar_texto($str){ 
    return preg_replace("/[^0-9]/", "", $str); 
}
 
if(count($_POST) > 0) {
  
    $erro = false;
    $nome = $_POST['nome_cliente'];
    $email = $_POST["email_cliente"];
    $data_nascimento = $_POST["data_nasc_cliente"];
    $telefone = $_POST["telefone_cliente"];
   
    if (empty($nome)) {
    $erro = "Preencha o nome!";
    } if (empty($email)) {
    $erro = "Preencha o E-mail!";
    }
        if(!empty($data_nascimento)){
            $divisao = explode('/', $data_nascimento);
            if(count($divisao) == 3) {
                $data_nascimento = implode('-', array_reverse($divisao)); 
            } else {
                $erro = "A data de nascimento deve seguir o padrão dia/mês/ano.";
                /* EXPLICAÇÃO -> Primeiro ele explode a data inserida pelo usuário em 3:
            28/01/2002 vira 28|01|2002.
            Depois ele verifica se a data inserida pelo usuario tem as 3 coisas "dia mes e ano"
            Depois ele inverte a ordem para inserir no modelo americano com o array_reverse:
            2002|01|28
            E por fim, ele junta todos usando o implode com o traço
            2002-01-28            
            */
            }
        }
        if(!empty($telefone)) {
            $telefone = limpar_texto($telefone);
            if(strlen($telefone) != 11) {
                $erro = "O telefone deve ser preenchido no padrão (xx) 9xxxx-xxxx.";
            }
        }
         if($erro){
        echo "<p><b>ERRO: $erro</b></p>";
        } else {
            $sql_code = "UPDATE clientes
            SET nome_cliente = '$nome', 
            email_cliente = '$email', 
            data_nasc_cliente = '$data_nascimento',
            telefone_cliente = '$telefone'
            WHERE id_cliente = '$id_cliente'";
            $funcionou = $mysqli->query($sql_code) or die($mysqli->error);
            if ($funcionou){
                echo "<p><b>Cliente atualizado com sucesso!</b></p>";
                unset($_POST); /*limpa a variável apos o cadastro ter feito realizado com sucesso.*/
            }
        }

}

$sql_clientes = "SELECT * FROM clientes WHERE id_cliente = '$id_cliente'";
$query_clientes = $mysqli->query($sql_clientes) or die($mysqli->error);  
$cliente = $query_clientes->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastrar_cliente.css">
    <title>Cadastro de Cliente</title>
</head>

<body>
    <!-- É recomendado colocar o "name" igual a coluna do banco de dados -->
    <a href="./clientes.php">Voltar para a lista</a>

    <section>
        <form method="POST" action="">
        <div class="formulario">
            <label>Nome:</label>
            <input value="<?php echo $cliente["nome_cliente"];?>" name="nome_cliente" type="text">
        </div>
        <div class="formulario">
            <label>E-mail:</label>
            <input value="<?php echo $cliente["email_cliente"];?>" name="email_cliente" type="text">
        </div> 
        <div class="formulario">
            <label>Data de Nascimento:</label>
            <input value="<?php if(!empty($cliente['data_nasc_cliente'])) echo formatarData($cliente["data_nasc_cliente"]);?>" name="data_nasc_cliente" type="text">
        </div>   
        <div class="formulario">
            <label>Telefone:</label>
            <input value="<?php if(!empty($cliente['telefone_cliente'])) echo formatarTelefone($cliente["telefone_cliente"]);?>" placeholder="(xx) 9xxxx-xxxx"name="telefone_cliente" type="text">
        </div>   
        <div class="formulario">
            <button type="submit">Cadastrar</button>
        </div>   
        </form>
    </section>
</body>
</html>