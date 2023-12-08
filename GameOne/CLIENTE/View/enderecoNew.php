<?php
    session_start();
    if(!isset($_SESSION["id-Cliente"])   ||  ($_SESSION["id-Cliente"] == "")){
        session_destroy();
?>
    <form method="post" name="myForm" id="myForm" action="../enderecoNew.php">
        <input type="hidden" name="msg" value="OA03">
    </form>

    <script>
        document.getElementById('myForm').submit();
    </script>

    <?php

    }
    $idCli = $_SESSION["id-Cliente"];
    $nomeCli = $_SESSION["nome-Cliente"];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Endereço</title>
    <link rel="stylesheet" href="css/estilo.css">

    <style>
    @import url('https://fonts.googleapis.com/css2?family=Corinthia&family=Inter:wght@100;200;300;400;500;600&family=Poppins:wght@100;200;300;400;500;600;700&display=swap'); 

    @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,600;0,700;1,500;1,600&display=swap');

        body {
            font-family: 'Raleway', sans-serif;
        }

        h1,
        h2,
        h3,
        h4 {
            font-family: 'Raleway', sans-serif;
        }

        p {
            font-family: 'Raleway', sans-serif;
        }

</style>
</head>
<body>
    <div id="titulo">
        <h4>Olá, <?= $nomeCli ?>.</h4><br>
        <h3>Novo endereço<h3>
    </div><br><br>

    


    <div id="admForm">
        <form action="../../ADM/Controller/cliController.php" method="post" name="enderecoNew">
    <input type="hidden" name="endereco_new" value="1">

    <label for="pais">Estado</label>
	<input type='text' id='pais' name='estado' required><br><br>

    <label for="pais">Cep</label>
	<input type='text' id='cep' name='cep' required><br><br>

    <label for="pais">Endereço</label>
	<input type='text' id='endereco' name='endereco' required><br><br>

    <label for="pais">Número</label>
	<input type='text' id='numero' name='numero' required><br><br>

    <label for="status">Status</label>
    <select name="status"><br>
        <option value="Ativo"> Ativo </option>
        <option value="Inativo"> Inativo </option>
    </select><br><br>


    <input type="hidden" name="id_cliente" value="<?= $idCli ?>">
    <input type="submit" value="Enviar" name="sbmt" class="formBasico sbmt">
</form><br><br>   
<button class="btnVoltar" onclick="voltar();" id="btnvoltar"> &larr; </button>
</div>

</body>
</html>