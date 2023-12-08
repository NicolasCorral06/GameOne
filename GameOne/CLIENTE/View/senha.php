<?php
     session_start();
    if(!isset($_SESSION["id-Cliente"])   ||  ($_SESSION["id-Cliente"] == "")){
        session_destroy();
?>
    <form method="post" name="myForm" id="myForm" action="../acessar.php">
        <input type="hidden" name="msg" value="OA03">
    </form>

    <script>
        document.getElementById('myForm').submit();
    </script>

    <?php

    }
    $idCli = $_SESSION["id-Cliente"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Senha</title>
    <link rel="icon" type="image/x-icon" sizes="32x32" href="../assets/favicon-16x16.png">
<link rel="icon" type="image/x-icon" sizes="16x16" href="../assets/favicon.icon">
</head>
<body>
    <form action="../../ADM/Controller/cliController.php" method="post">
        <input type="hidden" name="novaSenha" value="1">
        <input type="hidden" name="idCli" value="<?= $idCli ?>">

        <label> Senha atual </label><br>
        <input type="password" name="senhaA" id="" required><br><br>

        <label> Nova senha </label><br>
        <input type="password" name="senhaN1" id="" required><br><br>

        <label> Repita a nova senha </label><br>
        <input type="password" name="senhaN2" id="" required><br><br>

        <button type="submit"> Atualizar </button>

    </form>
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

