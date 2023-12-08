    <?php
session_start();
include_once 'head.html';
?>
<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Pagamento</title>
    <link rel="stylesheet" href="styles.css">
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

    <div class="colorlib-loader"></div>

    <div id="page">
        <nav class="colorlib-nav" role="navigation">
            <div class="top-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-2">
                            <div id="colorlib-logo"><a href="shop.php"><img src="logo.png" alt="Logo"></a></div>
                        </div>
                        <div class="col-xs-10 text-right menu-1">
                            <ul>
                                <li><a href="shop.php">Home</a></li>
                                <li><a href="shop.php">Produtos</a></li>
                                <li class="active"><a href="cart.php"><i class="icon-shopping-cart"></i> Carrinho </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <aside id="colorlib-hero" class="breadcrumbs">
            <div class="flexslider">
                <ul class="slides">
                    <li style="background-image: url(images/3.jpg);">
                        <div class="overlay"></div>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                                    <div class="slider-text-inner text-center">
                                        <h1>Pagamento</h1>
                                        <h2 class="bread"><span><a href="index.php">Home</a></span> <span><a
                                                    href="cart.php">Carrinho de compras</a></span>
                                            <span>Pagamento</span>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </aside>

        <div class="colorlib-shop">
            <div class="container">
                <div class="row row-pb-md">
                    <div class="col-md-10 col-md-offset-1">
                        <div class="process-wrap">
                            <div class="process text-center active">
                                <p><span>01</span></p>
                                <h3>Carrinho de Compras</h3>
                            </div>
                            <div class="process text-center active">
                                <p><span>02</span></p>
                                <h3>Pagamento</h3>
                            </div>
                            <div class="process text-center">
                                <p><span>03</span></p>
                                <h3>Finalizado</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <form method="post" action="../App/Controller/insertFinalizado.php" class="colorlib-form">
                    <div class="row">
                        <div class="col-md-7">
                            <h2>Endereço para entrega</h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="country">Estado</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <select class="form-control" name="id_estado" id="id_estado" required>
                                                <option value="">Selecione...</option>
                                                <option value="AC">Acre</option>
                                                <option value="AL">Alagoas</option>
                                                <option value="AP">Amapá</option>
                                                <option value="AM">Amazonas</option>
                                                <option value="BA">Bahia</option>
                                                <option value="CE">Ceará</option>
                                                <option value="DF">Distrito Federal</option>
                                                <option value="ES">Espírito Santo</option>
                                                <option value="GO">Goiás</option>
                                                <option value="MA">Maranhão</option>
                                                <option value="MT">Mato Grosso</option>
                                                <option value="MS">Mato Grosso do Sul</option>
                                                <option value="MG">Minas Gerais</option>
                                                <option value="PA">Pará</option>
                                                <option value="PB">Paraíba</option>
                                                <option value="PR">Paraná</option>
                                                <option value="PE">Pernambuco</option>
                                                <option value="PI">Piauí</option>
                                                <option value="RJ">Rio de Janeiro</option>
                                                <option value="RN">Rio Grande do Norte</option>
                                                <option value="RS">Rio Grande do Sul</option>
                                                <option value="RO">Rondônia</option>
                                                <option value="RR">Roraima</option>
                                                <option value="SC">Santa Catarina</option>
                                                <option value="SP">São Paulo</option>
                                                <option value="SE">Sergipe</option>
                                                <option value="TO">Tocantins</option>
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="id_cidade">Endereço</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <input type="text" style="width: 100%">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cep">CEP</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <input type="text" id="cep" name="cep" placeholder="Digite seu CEP"
                                                style="width: 100%" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="numero">Número</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <input type="text" id="numero" name="numero" placeholder="Digite o número"
                                                style="width: 100%" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="destinatario">Destinatário</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <input type="text" id="destinatario" name="destinatario"
                                                placeholder="Digite o nome do destinatário" style="width: 100%"
                                                required>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="cart-detail">
                                <h2>Total</h2>
                                Frete fixo: R$ 15.00 para todo Brasil
                                <br><br>
                                <ul>
                                    <!-- Exemplos fictícios -->
                                    <li>
                                        <ul>
                                            <li><span>2 x Exemplo1</span> <span>R$ 99,98</span></li>
                                        </ul>
                                    </li>
                                    <li>
                                        <ul>
                                            <li><span>1 x Exemplo2</span> <span>R$ 49,99</span></li>
                                        </ul>
                                    </li>
                                    <li><span>Total</span> <span>R$ 165,97</span></li>
                                </ul>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <p><input type="submit" style="background-color: green !important"
                                            class="btn btn-primary" value="Continuar" name="enviar"></p>
                                    <p><a href="cart.php" class="btn btn-primary">Voltar para o carrinho </a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    -------------------------------------------------------
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-7">
                            <h2>Forma de Pagamento</h2>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="country">Forma de Pagamento</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <select class="form-control" name="id_estado" id="id_estado" required>
                                                <option value=""> Selecione...</option>
                                                <option value="">PIX</option>
                                                <option value="">Boleto</option>
                                                <option value="">Cartão de crédito</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <?php
        include_once 'footer.html';
        ?>
    </div>

    <div class="gototop js-top">
        <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
    </div>

</body>

</html>