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
    <title>Cadastro</title>
    <link rel="stylesheet" href="../styles/stylelogin.css">
    <link rel="stylesheet" href="../css/cssnincorrig.css">
    <link rel="stylesheet" href="../css/descricao.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" sizes="32x32" href="../assets/favicon-16x16.png">
<link rel="icon" type="image/x-icon" sizes="16x16" href="../assets/favicon.icon">
    
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
                <button type="button" class="cart icon-btn" ><a href="carrinho.php"><i class="fa-solid fa-shopping-cart" style="color: #7d4ddc;"></a></i></button>
                <button type="button" class="user icon-btn" ><a href="acessar.php"><i class="fa-solid fa-user" style="color: #7d4ddc;"></a></i></button>
                <button type="button" class="open-menu-btn">
                    <span class="line line-1"></span>
                    <span class="line line-2"></span>
                    <span class="line line-3"></span>
                </button>
            </div>
        </div>
    </header>

    <div class="container containerl containerlogin" style="margin-top: -5%;">
        <div class="login-box" style="box-shadow: rgba(50, 50, 93, 0.25) 0px 50px 100px -20px, rgba(0, 0, 0, 0.3) 0px 30px 60px -30px;">
            <h2 style="color: #7d4ddc;">Faça seu Cadastro</h2>
            <form   action="../ADM/Controller/cliController.php" method="post">
                <input type="hidden" name="cliCadastro" value="1">
                <div class="input-box">
                    <input type="text" name="nome" autocomplete="on" placeholder="Digite seu Nome">
                </div>
                <div class="input-box">
                    <input type="text" name="email" autocomplete="on" placeholder="Digite seu Email">
                </div>
                <div class="input-box">
                    <input type="text" name="telefone" autocomplete="on" placeholder="Digite seu Telefone" maxlength="13">
                </div>
                <div class="input-box">
                    <input type="password" name="senha1" autocomplete="off" placeholder="Digite sua senha">
                </div>
                <div class="input-box">
                    <input type="password" name="senha2" autocomplete="off" placeholder="Digite novamente sua senha">
                </div>

                <div class="input-box">
                    <input type="text" name="cpf" autocomplete="off" placeholder="Digite seu CPF">
                </div>

                <button type="submit" class="btn" style="border-radius: 20px;">Cadastrar</button>
                <div class="signup-link">
                    <a href="login.php" style="font-size: 16px;">Possui uma Conta? Faça Login</a>
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


</body>
</html>