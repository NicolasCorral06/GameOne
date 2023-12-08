<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento - Usuário</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/pagamento.css">
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
    <link rel="icon" type="image/x-icon" sizes="32x32" href="../assets/favicon-16x16.png">
<link rel="icon" type="image/x-icon" sizes="16x16" href="../assets/favicon.icon">

</head>

<body>
    <header class="header">
        <div class="container">
            <div class="logo">
                <img src="../assets/logotipo/LogoNav2.png">
            </div>
            <nav class="menu">
                <div class="head">
                    <div class="logo">
                        <img src="../assets/logotipo/LogoNav2.png">
                        <button type="button" class="close-menu-btn"></button>
                    </div>
                </div>
                <ul>
                    <li class="dropdown">
                        <a href="CLIENTE/nintendo.php" class="nin">Nintendo</a>
                        <!-- <i class="fa-solid fa-chevron-down"></i> -->

                    <li class="dropdown">
                        <a href="pCLIENTE/playstation.php">PlayStation</a>
                        <!-- <i class="fa-solid fa-chevron-down"></i> -->


                    <li class="dropdown">
                        <a href="CLIENTE/xbox">Xbox</a>
                        <!-- <i class="fa-solid fa-chevron-down"></i> -->
                        <!-- <ul class="sub-menu">
                            <li><a href="#"><span>Cadeira</span></a></li>
                            <li><a href="#"><span>Mouse</span></a></li>
                            <li><a href="#"><span>Monitor</span></a></li>
                            <li><a href="#"><span>Desktops</span></a></li>
                            <li><a href="#"><span>Headsets</span></a></li>
                        </ul> 
                    </li> 
                </ul>-->
            </nav>
            <div class="header-right">
                <button type="button" class="search icon-btn"><i class="fa-solid fa-search"></i></button>
                <button type="button" class="cart icon-btn"><a href="carrinho.php"><i
                            class="fa-solid fa-shopping-cart"></i></a></button>
                <button type="button" class="user icon-btn"><i class="fa-solid fa-user"></i></button>
                <button type="button" class="open-menu-btn">
                    <span class="line line-1"></span>
                    <span class="line line-2"></span>
                    <span class="line line-3"></span>
                </button>
            </div>
        </div>
    </header>



    <div class="container">
        <div class="row rowGeral">
            <div class="col-8">
                <div class="row">
                    <div class="col-12 colDadosPessoais">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseDados" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                Link com href
                            </a>
                        <p>
                            (informações já imprimidas do usuário que já esta logado) <br>
                            amanda@gmail.com <br>
                            Nome: Amanda Pedreira <br>
                            Telefone: (11)949074140 <br>
                        </p>
                        </p>
                        <div class="collapse" id="collapseDados">
                            <div class="card card-body" style="border: none;">
                                <div class="row">
                                    <div class="col-6">
                                        Nome <br>
                                        <input type="text">
                                    </div>
                                    <div class="col-6">
                                        Sobrenome <br>
                                        <input type="text">
                                    </div>
                                    <div class="col-6">
                                        CPF <br>
                                        <input type="text">
                                    </div>
                                    <div class="col-6">
                                        Telefone <br>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 colDadosPessoais">
                        <p>
                            <a class="btn btn-primary" data-toggle="collapse" href="#collapseEndereco" role="button"
                                aria-expanded="false" aria-controls="collapseExample">
                                Entrega
                            </a>
                        </p>
                        <div class="collapse" id="collapseEndereco">
                            <div class="card card-body" style="border: none;">
                                <div class="row">
                                    <div class="col-12">
                                        Cep <br>
                                        <input type="text">
                                    </div>
                                    <div class="col-12">
                                        Endereço <br>
                                        <input type="text">
                                    </div>
                                    <div class="col-12">
                                        Número <br>
                                        <input type="text">
                                    </div>
                                    <div class="col-12">
                                        Complemento <br>
                                        <input type="text">
                                    </div>
                                    <div class="col-12">
                                        Destinatário <br>
                                        <input type="text">
                                    </div>
                                    <div class="col-12">
                                        Total da Entrega: 9,90 <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 colDadosPessoais" style="padding: 5%">
                    <div class="row">
                            <div class="col" style="border: 1px solid black;  margin-bottom: 5%;">
                            Número do Cartão
                                        <input type="text"> <br> <br>
                                        Nome no Cartão
                                        <input type="text"> <br> <br>
                                        Validade:
                                        <input type="text"> <br> <br>
                                        Código de Segurança:
                                        <input type="text"> <br> <br>
                                        CPF do Titular:
                                        <input type="text"> <br> <br>
                            </div>
                        </div>
                        <div class="row" style="border: 1px solid black;  margin-bottom: 5%;">
                            <div class="col">
                            Pix (só css mesmo)
                            </div>
                        </div>
                        <div class="row" style="border: 1px solid black;  margin-bottom: 5%;">
                            <div class="col">
                            Boleto (só css mesmo)
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-3">
                <div class="row rowResumoCompra">
                    Nome do produto<br>
                    R$112,00 <br> <br>

                    Nome do produto<br>
                    R$35,00 <br> <br>

                    Subtotal: R$147,00<br>
                    Frete: R$9,90<br><br><br><br><br><br>

                    Total: R$156,90
                    <a href="finalCompra.php">Finalizar Compra</a>
                </div>
            </div>
        </div>
    </div>



    <script src="../script.js"></script>
</body>

</html>