<?php

session_start();
include_once 'head.html';
if (isset($_SESSION["id-Cliente"]) || isset($_SESSION["id-Cliente"])) {
    $idCli = $_SESSION["id-Cliente"];
    $nomeCli = $_SESSION['nome-Cliente'];
}

include_once "../ADM/Model/conexao.php";

// Checkando a conexao
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Finalização da Compra</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/carrinho.css">
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

        .btn-primary {
            color: #fff;
            background-color: #8c52ff;
            border-color: #ceb9f9;
            margin-bottom: 5%;
        }

        .colorlib-form {
            background: #e3daf7;
            padding: 2em;
            margin-bottom: -30px;
        }

        .cart-detail {
            background: #e3daf7;
            padding: 2em 3em;
            float: left;
            width: 100%;
            margin-bottom: -30px;
        }

        .process {
            margin-top: 15%;
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

        .btncontinuar {
            margin-left: 10%;
            background-color: #8952f7;
        }
    </style>
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
                        <a href="../index.php" class="nin">Início</a>

                    <li class="dropdown">
                        <a href="nintendo.php" class="nin">Nintendo</a>
                        <!-- <i class="fa-solid fa-chevron-down"></i> -->

                    <li class="dropdown">
                        <a href="pplaystation.php">PlayStation</a>
                        <!-- <i class="fa-solid fa-chevron-down"></i> -->


                    <li class="dropdown">
                        <a href="xbox.php">Xbox</a>
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
                <form method="post" action="../ADM/Controller/carController.php" class="colorlib-form">
                    <input type="hidden" name="final" value="1">
                    <input type="hidden" name="idcli" value="<?= $idCli ?>">

                    <?php
                    include_once "../ADM/Model/manager.php";
                    $endereco = enderecoList_finalCompra($conn, $idCli);

                    if (isset($endereco[1]['id'])) {
                        $idEnde = $endereco[1]['id'];
                        ?>
                        <input type="hidden" name="id_ende" value="<?= $idEnde ?>">
                        <?php
                    }

                    ?>
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
                                            <input type="text" name="endereco"
                                                value="<?= isset($endereco[1]['endereco']) ? $endereco[1]['endereco'] : '' ?>"
                                                style="width: 100%">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="cep">CEP</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <input type="text" id="cep"
                                                value="<?= isset($endereco[1]['cep']) ? $endereco[1]['cep'] : '' ?>"
                                                name="cep" placeholder="Digite seu CEP" style="width: 100%" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="numero">Número</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <input type="text" id="numero"
                                                value="<?= isset($endereco[1]['numero']) ? $endereco[1]['numero'] : '' ?>"
                                                name="numero" placeholder="Digite o número" style="width: 100%"
                                                required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="destinatario">Destinatário</label>
                                        <div class="form-field">
                                            <i class="icon icon-arrow-down3"></i>
                                            <input type="text" id="destinatario" value="<?= $nomeCli ?>"
                                                name="destinatario" placeholder="Digite o nome do destinatário"
                                                style="width: 100%" required>
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
                                    <?php
                                    include_once '../ADM/Model/manager.php';
                                    $dados = carrListar_finalCompra($conn, $idCli);

                                    $totalGeral = 0;
                                    for ($i = 1; $i <= $dados["num"]; $i++) {
                                        $total = $dados[$i]["quantidade"] * $dados[$i]["preco"];

                                        echo '<li>';
                                        echo '<ul>';
                                        echo '<li><span>' . $dados[$i]["quantidade"] . ' x ' . $dados[$i]["nome"] . '</span> <span>R$ ' . $total . '</span></li>';
                                        echo '</ul>';
                                        echo '</li>';

                                        $totalGeral += $total;
                                    }
                                    ?>
                                    <li><span>Total</span> <span>R$
                                            <?php echo $totalGeral + 15; ?>
                                        </span></li>
                                </ul>

                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p><input type="submit" style="background-color: #9a72f4 !important"
                                            class="btn btn-primary btncontinuar" value="Continuar" name="enviar"></p>

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
                                            <select class="form-control" required id="metodoPagamento id_estado"
                                                name="metodoPagamento" onchange="exibirConteudo()">
                                                <option value=""> Selecione...</option>
                                                <option value="pix">PIX</option>
                                                <option value="boleto">Boleto</option>
                                                <option value="cartao">Cartão de crédito</option>
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
    </div>
    <center>
    <form action="../ADM/Controller/carController.php" method="post">
        <input type="hidden" name="idcliente" value="<?= $idCli ?>">
        <input type="hidden" name="delPedidoVolta" value="1">
        <input type="submit" style="background-color: #9852f7 !important" class="btn btn-primary btncontinuar"
            style="margin-left: 55%" value="Voltar ao Carrinho">
    </form>
    </center>

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