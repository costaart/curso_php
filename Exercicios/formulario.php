<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulário com PHP - Exemplo Prático</title>
</head>
<body>
    <form action="" method="POST">
    <h1>Formulário com PHP</h1>
    <p class="erro">* Obrigatório</p>
   
    <label for="nome">Nome:</label>
     <input  type="text" name="nome"><span class="erro"> *</span> <br><br>

     <label for="email">E-mail:</label>
     <input  type="text" name="email"><span class="erro"> *</span><br><br>

     <label for="website">Website:</label>
     <input  type="text" name="website"><br><br>

     <label for="coment">Comentário:</label>
     <textarea  name="coment" cols="30" rows="3"></textarea><span class="erro"> *</span><br><br>

     <label for="gen">Gênero:</label>
     <input type="radio" value ="Masculino" name="gen"> Masculino
     <input type="radio" value ="Feminino" name="gen"> Feminino
     <input type="radio" value ="Outro" name="gen"> Outro <span class="erro"> *</span><br> <br>

     <button name="enviado" type="submit">Enviar</button> <!-- O "type" submit indica que é para enviar os dados<!-->

     <h2>Dados enviados:</h2>
        <?php

        if (isset($_POST['enviado'])) {     //Verifica se foi clicado no botão isset =>  'se ela foi iniciada'
            if (empty($_POST['nome']) || strlen($_POST['nome']) < 3 || strlen($_POST['nome'])> 100) {    //Verifica se o campo nome foi preenchido, é menor que 3 ou maior que 100
                echo '<p class="erro">Preencha o campo NOME!</p>';
                die();
            }

            if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {    //Verifica se o campo email foi preenchido e se o email inserido NÃO é válido (a função filter_var, verifica se é valido, mas tem o ! para ver se NÃO é)
                echo '<p class="erro">Preencha o campo E-mail!</p>';
                die();
            }

            if (!empty($_POST['website']) && !filter_var($_POST['website'], FILTER_VALIDATE_URL)) {    //Verifica se o campo url NÃO ESTÁ VAZIO (foi preenchido) E SE ESTÁ INVÁLIDO => Se ela preencher, que seja algo válido, mas se não preencher, tudo bem.
                echo '<p class="erro">Preencha corretamente o campo WEBSITE!</p>';
                die();
            }











            $gen = "Não selecionado";

            if (isset($_POST['gen'])) {
                $gen = $_POST['gen'];
                if($gen != "Masculino" && $gen != "Feminino" && $gen != "Outro") { //se os generos marcados foram os disponiveis, pois se mudar o 'value' no inspecionar elemento dava um bug q mandava o que estava la
                    echo '<p class="erro">Preencha corretamente o campo GÊNERO!</p>';
                    die();
                }
                
            }
            echo "<p><b> Nome: </b>" . $_POST['nome'] . "</p>";
            echo "<p><b> E-mail: </b>" . $_POST['email'] . "</p>";
            echo "<p><b> Website: </b>" . $_POST['website'] . "</p>";
            echo "<p><b> Comentário: </b>" . $_POST['coment'] . "</p>";
            echo "<p><b> Gênero: </b>" . $gen . "</p>";
        }
        ?>
    </form>
</body>
</html>