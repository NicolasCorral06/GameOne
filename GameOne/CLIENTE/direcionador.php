<?php
    session_start();

    if(!isset($_SESSION['id-Cliente'])){
        header("Location: login.php");
        exit();
    } else {
        header("Location: View/cliente.php");
        exit();
    }

?>