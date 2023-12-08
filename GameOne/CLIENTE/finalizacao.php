<?php

session_start();
include_once 'head.html';

if (isset($_SESSION["id-Cliente"]) || isset($_SESSION["id-Cliente"])) {
    $idCli = $_SESSION["id-Cliente"];
    $nomeCli = $_SESSION['nome-Cliente'];
}
/*
$endereco = $_GET["ende"];
$metodoPagamento = $_GET["metodoPagamento"];


$partes = explode(',', $endereco);

$id = isset($partes[0]) ? $partes[0] : '';
$endereco = isset($partes[1]) ? $partes[1] : '';
$numero = isset($partes[2]) ? $partes[2] : '';
$cep = isset($partes[3]) ? $partes[3] : '';
/*
$partes = array();
$partes = explode('|', $endereco);
$id = $partes[0];  
$endereco = $partes[1];  
$numero = $partes[2];  
$cep = $partes[3];  
*/

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalização da Compra</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-...." crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" sizes="32x32" href="../assets/favicon-16x16.png">
<link rel="icon" type="image/x-icon" sizes="16x16" href="../assets/favicon.icon">
    <style>
        
        @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,600;0,700;1,500;1,600&display=swap');

        h1,
        h2,
        h3,
        h4 {
            font-family: 'Raleway', sans-serif;
        }

        p {
            font-family: 'Raleway', sans-serif;
        }

        body {
            overflow: initial;
            font-family: 'Raleway', sans-serif;
        }

        .product-name .one-forth span,
        .product-name .one-eight span {
            color: #000;
            font-weight: bold;
            text-transform: uppercase;
        }

        .product-name {
            padding: .8em 0;
            background: #f0f0f0;
            border: none;
            height: 7vh;
            align-items: center;
            display: flex;
            border-style: solid;
            border-width: 0px 0px 2px 0px;
            border-color: #7d4be4;
            justify-content: center;
            border-radius: 0px;
            background: #ffffff;
            /* box-shadow: 22px 22px 56px #c4c4c459, -22px -22px 56px #ffffff; */
        }

        .btn-primary {
            color: #fff;
            background-color: #8c52ff;
            border-color: #ceb9f9;
        }

        .process.active p span {
            color: #8952f7;
            font-weight: bold;
        }

        .process:after {
            position: absolute;
            top: 35%;
            right: -37%;
            content: '';
            width: 100%;
            font-weight: bold;
            height: 1px;
            background: #925bff;
            z-index: -1;
        }

        .finalizarCompra .btn {
            background-color: #854ef2;
            right: 3%;
        }

        .btn-primary:hover {
            background-color: #854ef2;
        }

        .finalizarCompra {
            margin-top: 5%;
            right: 3%;
        }

        .finalizarCompra p {
            font-size: 15px;
        }

        .btn-primary.btn-outline {
            background: transparent;
            color: #8c52ff;
            border: 1px solid #8c52ff;
        }

        .btn:hover {
            background: transparent;
            color: #8c52ff;
            border: 1px solid #8c52ff;
        }
    </style>
</head>


<body>
    <header class="header">
        <div class="container">
            <div class="logo">
                <a href="../index.php"><img src="../assets/imgs/Logonav.png"></a>
            </div>
            <nav class="menu">
                <div class="head">
                    <div class="logo">
                        <a href="../index.php"><img src="../assets/imgs/logorespplay.png"></a>
                        <button type="button" class="close-menu-btn"></button>
                    </div>
                </div>
                <ul>
                    <li class="dropdown">
                        <a href="../index.php" class="nin">Início</a>

                    <li class="dropdown">
                        <a href="nintendo.php" class="nin">Nintendo</a>
                        <!-- <i class="fa-solid fa-chevron-down"></i> -->

                    <li class="dropdown">
                        <a href="playstation.php">Playstation</a>
                        <!-- <i class="fa-solid fa-chevron-down"></i> -->


                    <li class="dropdown">
                        <a href="xbox.php">Xbox</a>

                </ul>

            </nav>


            <div class="header-right">
                <button type="button" class="cart icon-btn"><a href="carrinho.php"><i class="fa-solid fa-shopping-cart" style="color: #854ef2;"></i></a></button>
                <button type="button" class="user icon-btn"><a href="acessar.php"><i class="fa-solid fa-user" style="color: #854ef2;"></a></i></button>
                <button type="button" class="open-menu-btn">
                    <span class="line line-1"></span>
                    <span class="line line-2"></span>
                    <span class="line line-3"></span>
                </button>
            </div>
        </div>
    </header>
    <br><br><br>

    <br><br><br><br><br>
    <div class="row row-pb-md">
                <div class="col-md-10 col-md-offset-1">
                    <div class="process-wrap">
                        <div class="process text-center active">
                            <p><span>01</span></p>
                            <h3>Carrinho de compras</h3>
                        </div>
                        <div class="process text-center">
                            <p><span>02</span></p>
                            <h3> Pagamento </h3>
                        </div>
                        <div class="process text-center">
                            <p><span>03</span></p>
                            <h3>Finalizado</h3>
                        </div>
                    </div>
                </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1 text-center">
            <br><br>
            <h2>Obrigado por comprar, seu pedido está finalizado</h2>
            <p>
                <a href="../index.php" class="btn btn-primary" style="color: #ffffff;">Início</a>
                <a href="acessar.php" class="btn btn-primary" style="color: #ffffff;">Ver Pedido</a>
                <a href="../index.php" class="btn btn-primary" style="color: #ffffff;">Continue comprando</a>
            </p>
        </div>
    </div>
    </div>

</body>

</html>