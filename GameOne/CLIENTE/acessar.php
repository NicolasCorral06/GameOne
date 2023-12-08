<?php

session_start();

if (isset($_SESSION["id-Cliente"])) {
    header("Location: View/cliente.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" sizes="32x32" href="../assets/favicon-16x16.png">
<link rel="icon" type="image/x-icon" sizes="16x16" href="../assets/favicon.icon">
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


        .colAcesso {
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .imgAcesso {
            width: 90px;
            height: 90px;
            border-radius: 50px;
            justify-content: center;
            align-items: center;
            display: flex;
        }

        .imgAcesso img {
            width: 100%;
        }

        .colAcesso2 {
            text-align: center;
        }

        .colAcesso2 h3 {
            font-weight: bold;
        }

        .colAcesso2 p {
            margin-top: 2%;
            font-size: 17px;
        }

        .colAcesso3 {
            text-align: center;
        }

        .colAcesso3 button {
            width: 600px;
            padding: 1.3% 0% 1.3% 0%;
            border: 2.3px solid purple;
            border-radius: 10px;
            background-color: #fff;
            color: purple;
        }
    </style>
</head>

<body>


    <?php
    include_once "../ADM/Model/conexao.php";

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $sqlprod = "SELECT id_produtos, imgpq, nome, preco FROM produtos WHERE tipo_produto_macro = 'playstation'";
    $resultprod = $conn->query($sqlprod);
    $sqlLogo = "SELECT id, imgpq, imggd FROM logotipo WHERE id = 2";
    $resultLogo = $conn->query($sqlLogo);
    ?>
    <header class="header" style="position: absolute;">
        <div class="container">
            <div class="logo">
                <a href="../index.php"><img src="../assets/imgs/LogoNav2.png"></a>
            </div>
            <nav class="menu">
                <div class="head">
                    <div class="logo">
                        <a href="../index.php"><img src="../assets/imgs/logonav.png"></a>
                        <button type="button" class="close-menu-btn"></button>
                    </div>
                </div>
                <ul>
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
                <button type="button" class="cart icon-btn"><a href="carrinho.php"><i class="fa-solid fa-shopping-cart" style="color:#8C52FF;"></a></i></button>
                <button type="button" class="user icon-btn"><a href="acessar.php"><i class="fa-solid fa-user" style="color:#8C52FF;"> </a></i></button>
                <button type="button" class="open-menu-btn">
                    <span class="line line-1"></span>
                    <span class="line line-2"></span>
                    <span class="line line-3"></span>
                </button>
            </div>
        </div>
    </header>


    <div class="container">
        <div class="row" style="margin-top: 15%;">
            <div class="col-12 colAcesso">
                <div class="imgAcesso">
                    <img src="../assets/imgs/user.png" alt="">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 colAcesso2">
                <h3>Acesse sua conta</h3>
                <p>Use uma das opções para confirmar sua identidade</p><br>
            </div>
        </div>
        <div class="row">
            <div class="col-12 colAcesso3">
                <div class="row">
                    <div class="col-12">
                        <a href="login.php"><button>Entrar com email e senha</button></a>
                    </div>
                    <br><br><br><br>
                    <div class="col-2"></div>
                    <div class="col-2">
                        <hr>
                    </div>
                    <div class="col-4" style="margin-top: 1%; font-size: 16px;">
                        <p>Ainda não possui cadastro na GameOne?</p>
                    </div>
                    <div class="col-2">
                        <hr>
                    </div>
                    <div class="col-2"></div>
                    <br><br><br>
                    <div class="col-12">
                        <a href="cadastro.php"><button>Crie sua conta</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../script.js"></script>
</body>

</html>


<?php
if (isset($_REQUEST["msg"])) {
    require_once "../ADM/Ferramentas/msg.php";
    $cod = $_REQUEST["msg"];
    $msgExibir = $MSG[$cod];
    echo "<script>alert('" . $msgExibir . "')</script>";
}
?>