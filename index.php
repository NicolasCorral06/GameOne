<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GameOne</title>
    <link rel="stylesheet" href="styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <script src="https://unpkg.com/scrollreveal"></script>
<link rel="icon" type="image/x-icon" sizes="32x32" href="assets/favicon-16x16.png">
<link rel="icon" type="image/x-icon" sizes="16x16" href="assets/favicon.icon">
</head>

<style>
    
  @import url('https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,400;0,500;0,600;0,700;1,500;1,600&display=swap');

  body{
    font-family: 'Raleway', sans-serif;
  }

  h1,h2,h3,h4{
    font-family: 'Raleway', sans-serif;
  }

  p{
    font-family: 'Raleway', sans-serif;
  }

</style>

<body>
    <header class="header">
        <div class="container">
            <div class="logo">
                <img src="assets/imgs/LogoNav2.png">
            </div>
            <nav class="menu">
                <div class="head">
                    <div class="logo">
                        <img src="assets/imgs/LogoNav2.png">
                        <button type="button" class="close-menu-btn"></button>
                    </div>
                </div>
                <ul>
                    <li class="dropdown">
                        <a href="CLIENTE/nintendo.php" class="nin">Nintendo</a>
                        <!-- <i class="fa-solid fa-chevron-down"></i> -->

                    <li class="dropdown">
                        <a href="CLIENTE/playstation.php">Playstation</a>
                        <!-- <i class="fa-solid fa-chevron-down"></i> -->


                    <li class="dropdown">
                        <a href="CLIENTE/xbox.php">Xbox</a>
                        
                </ul>
            
            </nav>

         
            <div class="header-right">
                <button type="button" class="search icon-btn"><a href=""><i class="fa-solid fa-search"></i></a></button>
                <button type="button" class="cart icon-btn" style="color: #8c52ff;"><a href="CLIENTE/carrinho.php"><i class="fa-solid fa-shopping-cart"></i></a></button>
                <button type="button" class="user icon-btn" style="color: #8c52ff;"><a href="CLIENTE/acessar.php"><i class="fa-solid fa-user"></i></a></button>
                <button type="button" class="open-menu-btn">
                    <span class="line line-1"></span>
                    <span class="line line-2"></span>
                    <span class="line line-3"></span>
                </button>
            </div>
        </div>
    </header>

    <!-- <section class="banner-section">a</section> -->

    <section class="home">
        <div class="home-text">
            <h4 class="text-h4"> Bem-vindo a GameOne. </h4>
            <h1 class="text-h1">Explore, jogue e conquiste com Gameone!</h1>
            <p></p>
            <a href="#sobre" class="home-btn">Saiba Mais</a>
        </div>

        <div class="home-img">
            <img src="assets/imgs/imgindex2.png" alt="" style="width: 100vh;">
        </div>
    </section>


    <div class="englobac" id="sobre">
        <div class="containerindex">
            <img src="assets/imgs/teste index.png" alt="" srcset="" class="imageindex">
            <div class="content">
                <h1>Sobre a <span class="color1">Game</span><span class="color2">One</span></h1>
                <p>A GameOne inicialmente foi criada por um grupo de amigos apaixonados por criar experiências incríveis e envolventes para jogadores de todas as idades. Fundada por seis mentes criativas e entusiastas, nossa jornada começou com a visão compartilhada de trazer alegria, empolgação e inovação para o mundo dos jogos</p> <br><br>
                    
                    <center>
                    <a href="CLIENTE/sobre.php" class="home-btn2">Veja Mais</a>
                </center>
            </div>
        </div>
    </div>

   

    <div class="englobacard">
        <div class="container-card">
            <h2>Confira nossas coberturas</h2>

            <div class="card nintendo">
                <img src="assets/imgs/nintendo-switch.png" style="margin-top: 0.5cm;">
                <h1>Nintendo</h1>
                <div class="conteudocard">
                    <p>
                        A Nintendo é uma desenvolvedora e publicadora japonesa de jogos eletrônicos e consoles sediada em Quioto. Fundada em setembro de 1889 por Fusajiro Yamauchi. Originalmente era uma fabricante de cartas de baralho.
                    </p>
                    <a href="CLIENTE/nintendo.php" class="nintendo">Veja Mais</a>
                </div>
            </div>

            <div class="card playstation">
                <img src="assets/imgs/playstation-logotype.png" style="margin-top: 0.5cm;">
                <h1>Playstation</h1>
                <div class="conteudocard">
                    <p>
                        Foi lançado em 3 de dezembro de 1994, no Japão, e em 29 de setembro de 1995, nos Estados Unidos. Desde o seu lançamento até 2006 (quando sua produção foi extinta), a PlayStation vendeu mais de 103 milhões de unidades.
                    </p>
                    <a href="CLIENTE/playstation.php" class="playstation">Veja Mais</a>
                </div>
            </div>

            <div class="card xbox">
                <img src="assets/imgs/xbox-logo.png" style="margin-top: 0.5cm;">
                <h1>Xbox</h1>
                <div class="conteudocard">
                    <p>
                        Xbox network, anteriormente Xbox Live é um serviço de entrega de mídia digital e jogos multijogador online criado e operado pela Microsoft Services, Pass and Chat Entertainment, uma divisão da Microsoft.
                    </p>
                    <a href="CLIENTE/xbox.php" class="xbox">Veja Mais</a>
                </div>
            </div>
        </div>
    </div>

    

    <div class="englobaf">
        <footer>
            <div class="container">
                <div class="wrapper">
                    <div class="footer-widget">
                        <a href="#">
                            <img src="assets/imgs/Logonav.png" class="logo">
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
                            <li><a href="CLIENTE/sobre.php">Sobre a GameOne</a></li>
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
                        <a href="CLIENTE/sobre.php">Responsáveis</a>
                    </p>
                </div>
            
        </footer>

    </div>
    <script src="script.js"></script>
</body>

</html>