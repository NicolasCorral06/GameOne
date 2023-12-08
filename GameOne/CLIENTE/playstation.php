<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlayStation - Usuário</title>
    <link rel="stylesheet" href="../css/cssplaycorrig.css">
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

    <script>
        function mostrbar() {
            var elemento = document.getElementById("barraap");
            if (elemento.style.display === "none") {
                elemento.style.display = "block"; // Se estiver escondido, torna visível
            }
        }
    </script>


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



        /* .breadcrumb {
    padding: 8px 15px;
    margin-bottom: 20px;
    list-style: none;
    background-color: #dc354524;
    border-radius: 4px;
}

.panel-default>.panel-heading {
    color: #333;
    background-color: #f9e3e5;
    border-color: #ddd;
} */

        .card {
            height: 50vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            /* Adicionado para alinhar itens no espaço disponível */
            padding: 5%;
            border: none;
            box-shadow: 20px 20px 60px #bebebe, -20px -20px 60px #ffffff;
            background-color: #fff;
            border-radius: 20px;
        }

        .card p {
            font-family: Raleway, sans-serif;
            font-size: 15px;
            color: #000000;
            text-align: left;
            margin-bottom: 5%;
        }

        .card img {
            width: 100%;
            height: auto;
        }

        .card button {
            width: 100%;
            height: 40px;
            background-color: #1e568a;
            color: #fff;
            border: none;
            border-radius: 5px;
        }


        .breadcrumb {
            padding: 8px 15px;
            margin-bottom: 20px;
            list-style: none;
            background-color: #fff;
        }

        .form-group {
            font-size: 25px;
        }

        .panel {
            margin-bottom: 20px;
            background-color: #fff;
            border-radius: 4px;
            -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
            box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
            border-radius: 18px;
            box-shadow: 20px 20px 60px #e9e7e7, -20px -20px 60px #ffffff;
        }

        .panel-default>.panel-heading {
            color: #333;
            background-color: white;
            margin-top: 5%;
            border-color: white;
            border-radius: 15px;
        }

        .panel-default {
            border-color: white;
        }

        .panel-heading {
            font-size: 17px;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openModalLink = document.getElementById('open-modal');
            const modal = document.getElementById('responsaveis-modal');
            const closeModal = document.getElementById('close-modal');

            openModalLink.addEventListener('click', function(event) {
                event.preventDefault();
                modal.style.display = 'block';
            });

            closeModal.addEventListener('click', function() {
                modal.style.display = 'none';
            });

            window.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            });
        });
    </script>


</head>

<body>
    <?php
    require_once("../ADM/Model/conexao.php");
    $sqlprod = "SELECT id_produtos, imgpq, nome, preco FROM produtos WHERE tipo_produto_macro = 'Playstation'";
    $resultprod = $conn->query($sqlprod);
    $sqlLogo = "SELECT id, imgpq, imggd FROM logotipo";
    $resultLogo = $conn->query($sqlLogo);
    ?>
    <header class="header">
        <div class="container">
            <div class="logo">
                <a href="../index.php"><img src="../assets/imgs/logoplay.png"></a>
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
                <button type="button" class="search icon-btn" onclick="mostrbar()">
                    <i class="fa-solid fa-search">
                        <form action="pesquisa.php" method="get" style="display:none;" id="barraap">
                            <input type="text" name="pesquisa" id="">
                        </form>
                    </i>
                </button>
                <button type="button" class="cart icon-btn"><a href="carrinho.php"><i class="fa-solid fa-shopping-cart"></i></a></button>
                <button type="button" class="user icon-btn"><a href="acessar.php"><i class="fa-solid fa-user"> </a></i></button>
                <button type="button" class="open-menu-btn">
                    <span class="line line-1"></span>
                    <span class="line line-2"></span>
                    <span class="line line-3"></span>
                </button>
            </div>
        </div>
    </header>

    <div class="container-fluid" style="padding-left: 0; padding-right: 0;">
        <div class="playinto row">
            <div class="img"><img src="../assets/imgs/backplay.jpg"></div>
            <div class="left col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <h1 style="color: #fff; font-size: 5em; margin-top:25%;">PlayStation</h1><br>
                <p style="font-size: 1.5em; ">Após inúmeros pedidos, a Sony chegou na GameOne. <br> Agora você pode aproveitar toda a praticidade e <br> confiança da GameOne e garantir alguns dos melhores produtos para seu PlayStation.</p><br><br>
                <a href="#banner" class="btnplay" style="color: #0f61bf;">Veja Mais</a>
            </div>
            <div class="right col-sm-12 col-md-12 col-lg-6 col-xl-6 astroplay"><img src="../assets/imgs/astroplay.png"></div>
        </div>

        <div class="banner" id="banner">
            <img src="../assets/imgs/backplay4.jpg" alt="backx" class="img2">
            <div class="centerx row" id="mario">
                <div class="col-12">
                    <h1>O Melhor da Playstation Para Você</h1>
                </div>
                <div class="col-12">
                    <p>Aqui você encontra a diversidade que procurava!</p>
                </div>
                <div class="imagens col-sm-12 col-md-6 col-lg-4 col-xl-4"><img src="../assets/imgs/jogoplay1.png" style="height: 300px;">
                </div>
                <div class="imagens col-sm-12 col-md-6 col-lg-4 col-xl-4"><img src="../assets/imgs/jogoplay2.png" style="height: 300px;">
                </div>
                <div class="imagens col-sm-12 col-md-6 col-lg-4 col-xl-4"><img src="../assets/imgs/jogoplay3.jpeg" style="height: 300px;">
                </div>
                <div class="imagens col-sm-12 col-md-6 col-lg-4 col-xl-4"><img src="../assets/imgs/jogoplay4.png" style="height: 300px;">
                </div>
                <div class="imagens col-sm-12 col-md-6 col-lg-4 col-xl-4"><img src="../assets/imgs/jogoplay5.png" style="height: 300px;">
                </div>
                <div class="imagens col-sm-12 col-md-6 col-lg-4 col-xl-4"><img src="../assets/imgs/jogoplay6.png" style="height: 300px;">
                </div>
                <div class="col-12">
                    <center>
                        <br><br><br>
                        <a class="btnplay" href="#cardTotal" style="color: #4172ab"> Saiba Mais</a>
                        <br><br><br>
                    </center>
                </div>
            </div>
        </div>
    </div>


    <div class="cardTotal" id="cardTotal">
        <br><br><br><br>
        <article>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-1"></div>
                    <div class="col-10">


                        <div class="row">
                            <h4 class="form-group col-xs-3">Jogos Playstation</h4>

                            <ol class="breadcrumb visible-sm visible-md visible-lg form-group col-xs-6" style="background-color: #fff;">

                            </ol>


                            <div class="form-group col-xs-3">
                                <select class="form-control">
                                    <option>Recentes</option>
                                    <option>Menor Preço</option>
                                    <option>Maior Preço</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">

                            <div class="visible-md visible-lg col-md-3 col-lg-3">
                                <br>
                                <div class="panel panel-default">
                                    <div class="panel-heading">Outras Opções</div>
                                    <div class="panel-body">
                                        <div class="list-group">
                                            <a href="../index.php" class="list-group-item">Início</a>
                                            <a href="nintendo.php" class="list-group-item">Jogos Nintendo</a>
                                            <a href="xbox.php" class="list-group-item">Jogos Xbox</a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-9 col-lg-9">

                                <div class="row">
                                    <?php
                                    // Exibe os jogos como cards
                                    if ($resultprod->num_rows > 0) {
                                        while ($row = $resultprod->fetch_assoc()) {
                                            echo '<div class="col-sm-6 col-md-6 col-lg-3 col-xl-3 colCard">';
                                            echo '<br><div class="card text-center">';
                                            $imagemPath = "../assets/" . $row["imgpq"];
                                            echo '<div class="image-container">';
                                            echo '<img src="' . $imagemPath . '" alt="' . $row["nome"] . '">';
                                            echo '</div>';
                                            echo '<p class="tituloCard">' . $row["nome"] . '</p>';
                                            echo '<p class="precoCard">R$ ' . $row["preco"] . '</p>';
                                            echo '<a href="descricao.php?id_produtos=' . $row["id_produtos"] . '"><button>Comprar</button></a>';
                                            echo '</div>';
                                            echo '</div>';
                                        }
                                    }

                                    // Fecha a conexão
                                    $conn->close();
                                    ?>

                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-1"></div>
                </div>
            </div>
        </article>
    </div>

    <div class="englobaf">
        <footer>
            <div class="container">
                <div class="wrapper">
                    <div class="footer-widget">
                        <a href="#">
                            <img src="../assets/imgs/logorespplay.png" class="logo">
                        </a>
                        <p class="desc">
                            Sempre Trazendo o melhor e mais recente do mundo gamer para você.
                        </p>

                        <ul class="socials">
                            <li>
                                <a href="https://www.facebook.com/gameoneofc" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/gameonetca" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                            </li>

                            <li>
                                <a href="https://www.instagram.com/gameonetca/" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                            </li>

                            <li>
                                <a href="https://www.linkedin.com/in/game-one/" target="_blank"><i class="fa-brands fa-linkedin-in"></i></a>
                            </li>
                        </ul>
                    </div>
                    <div class="footer-widget">
                        <h6> Institucional </h6>
                        <ul class="links">
                            <li><a href="index.php">Início</a></li>
                            <li><a href="sobre.php">Sobre a GameOne</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Termos &amp; Condições</a></li>
                        </ul>
                    </div>

                    <div class="footer-widget">
                        <h6> Serviços</h6>
                        <ul class="links">
                            <li><a href="#">Jogos</a></li>
                            <li><a href="#">Gift Cards</a></li>
                            <li><a href="#">Acessórios</a></li>
                            <li><a href="#">Consoles</a></li>
                        </ul>
                    </div>

                    <div class="footer-widget">
                        <h6> Ajuda &amp; Suporte </h6>
                        <ul class="links">
                            <li><a href="#">Área de Suporte</a></li>
                            <li><a href="#">Chat</a></li>
                            <li><a href="mailto:GameOnesuporte@gmail.com"> GameOnesuporte@gmail.com
                                </a></li>
                        </ul>
                    </div>
                </div>


                <div class="copyright-wrapper">
                    <p>Criado e Projetado por Alunos do 2°Infonet <br>
                        <a href="sobre.php">Responsáveis</a>
                    </p>
                </div>

        </footer>

    </div>

    </div>

    </div>
    <script src="../script.js"></script>
</body>

</html>