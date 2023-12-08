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
    <title>NavBar</title>
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../css/stylelogin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://unpkg.com/scrollreveal"></script>
    <style>
        .containercadastro {
            display: none;
        }

        .containercadastro.active {
            display: block;
        }
    </style>
</head>

<body>
    <header class="header" >
        <div class="container" style="height: 10vh;">
            <div class="logo">
                <img src="../assets/imgs/LogoNav2.png">
            </div>
            <nav class="menu">
                <div class="head">
                    <div class="logo">
                        <img src="assets/imgs/LogoNav2.png">
                        <button type="button" class="close-menu-btn"></button>
                    </div>
                </div>            
            </nav>         
            <div class="header-right">
            </div>
        </div>
    </header>

<div class="container containerlogin">
        <div class="login-box">
            <h2>Login</h2>
    <form action="Controller/admController.php" method="post">
        <input type="hidden" name="admLogin" value="1">
            
                <div class="input-box">
        <input type="text" name="email" autocomplete="on" placeholder="Digite seu Email"> <br><br>
                    
                    <label>Email:</label>
                </div>

                <div class="input-box">
                    <input type="password" name="senha" autocomplete="off" placeholder="Digite sua senha"> <br><br>
                        
                        <label>Senha:</label>
                </div>
                
                <button type="submit" class="btn">Login</button>
                <!--
                <div class="forgot-password">
                    <a href="#">Esqueceu a senha? </a>
                </div>
                
                <div class="signup-link">
                    <a href="#" onclick="toggleForm()">Cadastre-se</a>
                </div>
                -->
            </form>
        </div>
    </div>


<?php
    if (isset($_REQUEST["msg"])) {
        require_once "Ferramentas/msg.php";
        $cod = $_REQUEST["msg"];
        $msgExibir = $MSG[$cod];
        echo "<script>alert('" . $msgExibir . "')</script>";
    }
?>
 <script>
        let login = document.querySelector(".containerlogin");
        let cadastro = document.querySelector(".containercadastro");
        cadastro.style.display = "none"; // Oculta o formulário de cadastro inicialmente

        function toggleForm() {
            login.style.display = (login.style.display === "none") ? "block" : "none";
            cadastro.style.display = (cadastro.style.display === "none") ? "block" : "none";
        }
    </script>
</body>
</html>


