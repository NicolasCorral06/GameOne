<?php
session_start();
session_unset();
session_destroy();
?>




<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../css/descricao.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/x-icon" sizes="32x32" href="../assets/favicon-16x16.png">
<link rel="icon" type="image/x-icon" sizes="16x16" href="../assets/favicon.icon">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Corinthia&family=Inter:wght@100;200;300;400;500;600&family=Poppins:wght@100;200;300;400;500;600;700&display=swap');

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

        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins';
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            background: #ffff;
            min-height: 100vh;
            font-family: 'Raleway', sans-serif;
        }

        .containerl {
            position: relative;
            width: 400px;
            height: 256px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-box {
            position: absolute;
            width: 400px;
            height: 500px;
        }

        .login-box form {
            width: 100%;
            padding: 0 50px;
            margin-top: 10%;
        }

        h2 {
            font-size: 2em;
            color: #8C52FF;
            text-align: center;
            margin-top: 20%;
        }

        .input-box {
            position: relative;
            margin: 25px 0;
        }

        .input-box input {
            width: 100%;
            height: 50px;
            background: transparent;
            border: 2px solid #7f4fe0;
            outline: none;
            border-radius: 40px;
            font-size: 1em;
            color: #000000;
            padding: 0 20px;
            transition: 0.5s
        }

        .input-box input:focus,
        .input-box input:valid {
            border-color: #b08dd1;
        }

        .input-box label {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            font-size: 1em;
            color: #000000;
            pointer-events: none;
            transition: 0.5s ease;
        }

        .input-box input:focus~label,
        .input-box input:valid~label {
            top: -8px;
            font-size: 0.8em;
            padding: 0 6px;
            color: #000;
        }

        .forgot-password {
            margin: -15px 0 10px;
            text-align: center;
        }

        .forgot-password a {
            font-size: 0.85em;
            color: #000;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }

        .btn {
            width: 100%;
            height: 45px;
            border-radius: 45px;
            background: #7f4fe0;
            border: none;
            outline: none;
            cursor: pointer;
            color: #ffff;
            font-size: 1em;
            font-weight: 600;
        }

        .btn:hover {
            width: 100%;
            height: 45px;
            border-radius: 45px;
            background: #7f4fe0;
            border: none;
            outline: none;
            cursor: pointer;
            color: #ffff;
            font-size: 1em;
            font-weight: 600;
            opacity: 0.9;
        }

        .signup-link {
            margin: 20px 0 10px;
            text-align: center;
        }

        .signup-link a {
            font-size: 1em;
            color: #7f4fe0;
            text-decoration: none;
            font-weight: 600;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <?php
    include_once "../ADM/Model/conexao.php";

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
    $sqlLogo = "SELECT id, imgpq, imggd FROM logotipo";
    $resultLogo = $conn->query($sqlLogo);
    ?>

    <header class="header" style="position: absolute;">
        <div class="container">
            <div class="logo">
                <a href="../index.php"><img src="../assets/imgs/logonav.png"></a>
            </div>
            <nav class="menu">
                <div class="head">
                    <div class="logo">
                        <a href="../index.php"><img src="../assets/imgs/logorespnin.png"></a>
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
                <button type="button" class="cart icon-btn"><a href="carrinho.php"><i class="fa-solid fa-shopping-cart" style="color:#8C52FF"></a></i></button>
                <button type="button" class="user icon-btn"><a href="acessar.php"><i class="fa-solid fa-user" style="color:#8C52FF"> </a></i></button>
                <button type="button" class="open-menu-btn">
                    <span class="line line-1"></span>
                    <span class="line line-2"></span>
                    <span class="line line-3"></span>
                </button>
            </div>
        </div>
    </header>

    <div class="container containerl containerlogin">
        <div class="login-box" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;">
            <h2>Seja bem-vindo </h2>
            <form action="../ADM/Controller/cliController.php" method="post">
                <input type="hidden" name="cliLogin" value="1">

                <div class="input-box">
                    <input type="text" name="email" autocomplete="on" placeholder="Digite seu Email"> <br><br>
                </div>
                <div class="input-box">
                    <input type="password" name="senha" autocomplete="off" placeholder="Digite sua senha"> <br><br>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="signup-link" style="font-size: 16px;">
                    <P> Não tem uma conta?</P>
                    <a href="cadastro.php">Cadastre-se</a>
                </div>
            </form>
        </div>
    </div>

    <?php
    if (isset($_REQUEST["msg"])) {
        require_once "../ADM/Ferramentas/msg.php";
        $cod = $_REQUEST["msg"];
        $msgExibir = $MSG[$cod];
        echo "<script>alert('" . $msgExibir . "')</script>";
    }
    ?>

    <br><br><br><br><br>


    <script src="https://kit.fontawesome.com/c1adecaaf6.js" crossorigin="anonymous"></script>
    <script src="../script.js"></script>
</body>

</html>