<?php
    session_start();
    if(!isset($_SESSION["id-Cliente"])   ||  ($_SESSION["id-Cliente"] == "")){
        session_destroy();
?>
    <form method="post" name="myForm" id="myForm" action="../index.php">
        <input type="hidden" name="msg" value="OA03">
    </form>

    <script>
        document.getElementById('myForm').submit();
    </script>

    <?php

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Area do Cliente</title>
    <script>
        function logout(){
            var resp = confirm("Deseja realmente fazer logout?");
            if (resp == true){
                window.location.assign("logout.php");
            }
        }
    </script>
</head>

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
<body>
    <div id="header">
        <div id="dadosAdm">
            <!--LEMBRA DE TIRAR A MERDA DO ID, SO ESTOU FAZENDO TESTES -->
            ID: <?=$_SESSION['id-Cliente'];?><br>
            Nome: <?=$_SESSION['nome-Cliente'];?><br>
            Email: <?=$_SESSION["email-Cliente"];?><br>
            Telefone: <?=$_SESSION["telefone-Cliente"];?><br>
            <a href="../../index.php"> Voltar </a>
            <button onclick="logout()"> Logout </button>
        </div>

        <a href="senha.php" target="screen" class="linkMenu"> Mudar senha </a><br><br>
        <a href="endereco.php" target="screen" class="linkMenu"> Endereço </a><br><br>
        <a href="pedido.php" target="screen" class="linkMenu"> Pedidos </a><br><br>
        
        
    </div>

    <div id="container">
        <div id="menu">
        
        </div>

        <div id="">
            <iframe name="screen" id="screen" width="100%" height="1180px" src="" style="border: 0px;"></iframe>
        </div>
    </div>
</body>
</html>

<?php

if (isset($_REQUEST["msg"])) {
    require_once "../../ADM/Ferramentas/msg.php";
    $cod = $_REQUEST["msg"];
    $msgExibir = $MSG[$cod];
    echo "<script>alert('" . $msgExibir . "')</script>";
}

?>

