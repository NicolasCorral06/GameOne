<!DOCTYPE html>
<html>

<head>
    <title>BMB - Carrinho de Compra</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">

    <link href="https://fonts.googleapis.com/css?family=Fredoka+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="../css/descricao.css" media="screen">

    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous"> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" sizes="32x32" href="../assets/favicon-16x16.png">
<link rel="icon" type="image/x-icon" sizes="16x16" href="../assets/favicon.icon">

    <style>
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


    <!-- -------------COMEÇO MENU-------------- -->
    <?php
    include_once "../ADM/Model/conexao.php";

    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }

    $sqlmenu = "SELECT id_menu, nome_menu FROM menu";
    $resultmenu = $conn->query($sqlmenu);

    $sqlLogo = "SELECT id, imgpq, imggd FROM logotipo";
    $resultLogo = $conn->query($sqlLogo);
    ?>


    <nav>
        <div class="navbar">
            <i class='bx bx-menu'></i>
            <!-- -------- Logotipo -------- -->
            <div class="logo"> <a href="../index.php">
                    <?php
                    if ($resultLogo && $resultLogo->num_rows > 0) {
                        $rowLogo = $resultLogo->fetch_assoc();
                        echo '<img src="../imagens/' . $rowLogo["imgpq"] . '">';
                    } else {
                        echo "Logotipo não encontrado.";
                    }
                    ?>
                </a></div>
            <div class="nav-links">


                <!-- ---------------------------Listagem de Menus e Submenus---------------------------------- -->
                <ul class="links">
                    <?php
                    if ($resultmenu && $resultmenu->num_rows > 0) {
                        while ($rowMenu = $resultmenu->fetch_assoc()) {
                    ?>
                            <li>
                                <a href="produtos.php?<?php echo $rowMenu["nome_menu"]; ?>=tudo"><?php echo $rowMenu["nome_menu"]; ?></a>
                                <i class="bx bxs-chevron-down js-arrow arrow"></i>
                                <ul class="js-sub-menu sub-menu">

                                    <?php
                                    $idMenu = $rowMenu['id_menu'];
                                    $sqlsubmenu = "SELECT id_submenu, nome_submenu FROM submenu WHERE id_menu = $idMenu";


                                    $resultSubmenu = $conn->query($sqlsubmenu);

                                    if ($resultSubmenu && $resultSubmenu->num_rows > 0) {
                                        while ($rowSubMenu = $resultSubmenu->fetch_assoc()) {
                                    ?>

                                            <li><a href="produtos.php?<?php echo $rowMenu["nome_menu"] ?>=<?php echo $rowSubMenu["nome_submenu"]; ?>"><?php echo $rowSubMenu["nome_submenu"]; ?></a></li>

                                    <?php
                                        }
                                    } else {
                                        echo '<li>Nenhum submenu encontrado.</li>';
                                    }
                                    ?>

                                </ul>
                            </li>

                    <?php
                        }
                    } else {
                        echo '<li>Nenhum menu encontrado.</li>';
                    }
                    ?>
                </ul>
                <!-- -----------------Fim listagem Menus  e Submenu-------------------------------- -->
            </div>
            <a href="#"><i class="fa-solid fa-heart icones"></i></a>
            <a href="../CLIENTE/carrinho.php"><i class="fa-solid fa-cart-shopping icones"></i></a>
            <a href="#"><i class="fa-solid fa-user aparecer icones"></i></a>
            <div class="search-box">
                <i class='bx bx-search'></i>
                <div class="input-box">
                    <input type="text" placeholder="Search...">
                </div>
            </div>
        </div>
    </nav>

    <!----------FIM MENU--------- -->


    <br><br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 forms">

                <form class="form" action="../ADM/Controller/cliController.php" method="post">
                    <input type="hidden" name="cliCadastro" value="1">
                    <p class="form-title">Faça o seu Cadastro</p>
                    <div class="input-container">

                        <label> Nome Completo</label> <br>
                        <input type="text" name="nome" autocomplete="on" placeholder="Digite seu Nome"> <br><br>

                    </div>
                    <div class="input-container">

                        <label> Email </label> <br>
                        <input type="text" name="email" autocomplete="on" placeholder="Digite seu Email"> <br><br>

                    </div>
                    <div class="input-container">
                        <label> Senha </label> <br>
                        <input type="password" name="senha1" autocomplete="off" placeholder="Digite sua senha"> <br><br>

                    </div>
                    <div class="input-container">
                        <label> Confirmar Senha </label> <br>
                        <input type="password" name="senha2" autocomplete="off" placeholder="Digite novamente sua senha"> <br><br>

                    </div>

                    <div class="input-container">
                        <label> CPF </label> <br>
                        <input type="password" name="cpf" autocomplete="off" maxlength="11" placeholder="Digite seu CPF"> <br><br>

                    </div>

                    <button type="submit" class="submit">
                        Entrar
                    </button>

                    <p class="signup-link">
                        Ja tem uma conta?
                        <a href="login.php">Faça o Login</a>
                    </p>
                </form>

            </div>
            <div class="col-sm-invisible col-md-invisible col-lg-6 col-xl-6"></div>
        </div>
    </div>



</body>

</html>