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
    <title>NavBar</title>
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

        body {
            font-family: 'Raleway', sans-serif;
            overflow: initial;
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

        .product-name .one-forth span,
        .product-name .one-eight span {
            color: #000;
            font-weight: bold;
            text-transform: uppercase;
        }

        .product-name {
            padding: .8em 0;
            background: #f0f0f0;
            border: none;
            height: 7vh;
            align-items: center;
            display: flex;
            border-style: solid;
            border-width: 0px 0px 2px 0px;
            border-color: #7d4be4;
            justify-content: center;
            border-radius: 0px;
            background: #ffffff;
            /* box-shadow: 22px 22px 56px #c4c4c459, -22px -22px 56px #ffffff; */
        }

        .btn-primary {
            color: #fff;
            background-color: #8c52ff;
            border-color: #ceb9f9;
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

        .finalizarCompra .btn{
            background-color: #854ef2;
            right: 3%;
        }

        .btn-primary:hover{
            background-color: #854ef2;
        }

        .finalizarCompra{
            margin-top: 5%;
            right: 3%;
        }

        .finalizarCompra p{
            font-size: 15px;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="container">
            <div class="logo"> <a href="../index.php">
                    <img src="../assets/logotipo/Logonav.png" alt="">
                </a></div>
            <nav class="menu">
                <div class="head">
                    <div class="logo"> <a href="../index.php">
                            <?php
                            if ($resultLogo && $resultLogo->num_rows > 0) {
                                $rowLogo = $resultLogo->fetch_assoc();
                                echo '<img src="../assets/logotipo/' . $rowLogo["imgpq"] . '">';
                            } else {
                                echo "Logotipo não encontrado.";
                            }
                            ?>
                        </a></div>
                </div>
                <ul>
                    <li class="dropdown">
                        <a href="nintendo.php" class="nin">Nintendo</a>
                        <!-- <i class="fa-solid fa-chevron-down"></i> -->

                    <li class="dropdown">
                        <a href="playstation.php">PlayStation</a>
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
                <button type="button" class="cart icon-btn"><i class="fa-solid fa-shopping-cart"></i></button>
                <button type="button" class="user icon-btn"><i class="fa-solid fa-user"></i></button>
                <button type="button" class="open-menu-btn">
                    <span class="line line-1"></span>
                    <span class="line line-2"></span>
                    <span class="line line-3"></span>
                </button>
            </div>
        </div>
    </header>
    <br><br><br><br><br><br><br><br><br>
    <!-- Conteúdo do Carrinho -->
    <div class="colorlib-shop">
        <div class="container">
            <!-- Seu código existente para process-wrap e product-name -->
            <div class="row row-pb-md">
                <div class="col-md-10 col-md-offset-1">
                    <div class="process-wrap">
                        <div class="process text-center active">
                            <p><span>01</span></p>
                            <h3>Carrinho de compras</h3>
                        </div>
                        <div class="process text-center">
                            <p><span>02</span></p>
                            <h3> Pagamento </h3>
                        </div>
                        <div class="process text-center">
                            <p><span>03</span></p>
                            <h3>Finalizado</h3>
                        </div>
                    </div>
                </div>
            </div>




            <!--

    todo o body do bagulho

    <div class="container">
       
        <form action="pagamento.php" method="post">

        
        <div class="row rowGeral">
            <div class="col-9">
                <div class="row">
                    <div class="col-2 tabCarGeral tabCar1">
                        <img src="../assets/imagensjogos/nintendo/Jogo-Nintendo-Persona-5-Royal-Standard-Edition-Switch_gd.jpg" alt="">
                    </div>
                    <div class="col-3 tabCarGeral tabCar2">Jogo Nintendo Persona 5 Roy</div>
                    <div class="col-3 tabCarGeral tabCar3">
                        <input type="number">
                    </div>
                    <div class="col-2 tabCarGeral tabCar4">R$ 110,00</div>
                    <div class="col-1 tabCarGeral tabCar5">0</div>
                </div>
            </div>
            <div class="col-3">
                <div class="row rowFrete">
                    <div class="col-12">Calcular Frete</div>
                    <input type="text">
                    <p>Quando enviar o cep, coloca que deu 9,9 reais, padrão mesmo <br> Total: 9,90 (ou seja, isso aqui fica escondido até enviar o cep)</p>
                </div>
                <div class="row rowFinalCompra">
                    Subtotal: R$147,00<br>
                    Frete: R$9,90<br><br><br>

                    Total: R$156,90 <br><br><br>
                    <a href="pagamento.php">Finalizar Compra</a>
                </div>
            </div>
        </div>

        </form>
    </div>
    -->
            <?php


            if (isset($idCli)) {

                include_once '../ADM/Model/manager.php';
                $dados = carrListar($idCli, $conn);

                if (isset($dados["num"])) {


                    ?>

                    <br><br><br><br><br><br>
                    <form action="../ADM/Controller/carController.php" method="post">



                        <div class="row row-pb-md">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="product-name">
                                    <div class="one-forth text-center">
                                        <span>Detalhes dos produtos</span>
                                    </div>
                                    <div class="one-eight text-center">
                                        <span>Preço</span>
                                    </div>
                                    <div class="one-eight text-center">
                                        <span>Quantidade</span>
                                    </div>
                                    <div class="one-eight text-center">
                                        <span>Total</span>
                                    </div>
                                    <div class="one-eight text-center">
                                        <span>Remover</span>
                                    </div>
                                </div>
                                <?php
                                /*
                                
                                $dados [$i]["id-carrinho"]
                                $dados [$i]["id-carrinho"]
                                $dados [$i]["id-produto"]
                                $dados [$i]["preco"]
                                $dados [$i]["quantidade"]
                                $dados [$i]["total"]
                                $dados [$i]["datahora"]
                                $dados [$i]["status"]
                                
                                */
                                for ($i = 1; $i <= $dados["num"]; $i++) {
                                    $idProd = $dados[$i]["id-produto"];

                                    $img = imgList($conn, $idProd);

                                    $totalGeral = 0;
                                    for ($i = 1; $i <= $dados["num"]; $i++) {
                                        $idProd = $dados[$i]["id-produto"];
                                        $img = imgList($conn, $idProd);
                                        
                                        $total =  $dados[$i]["quantidade"] * $dados[$i]["preco"];

                                        echo '<div class="product-cart">';
                                        echo '  <div class="one-forth">';
                                        echo '    <div class="product-img" style="background-image: url(\'../assets/' . $img["imgpq"] . '\');"></div>';
                                        echo '    <div class="display-tc">';
                                        echo '      <h3 id="nome">' . $dados[$i]["nome"] . '</h3>';
                                        echo '    </div>';
                                        echo '  </div>';
                                        echo '  <div class="one-eight text-center">';
                                        echo '    <div class="display-tc">';
                                        echo '      <span class="price" for="id_valor" id="id_valor">R$ ' . $dados[$i]["preco"] . '</span>';
                                        echo '    </div>';
                                        echo '  </div>';
                                        echo '  <div class="one-eight text-center">';
                                        echo '    <div class="display-tc">';

                                        ?>
                                        <form method="post" action="../ADM/Controller/carController.php">
                                        <input type="hidden" name="atualizarQuantidade" value="1">
                                        <input type="hidden" name="idCar" value="<?=  $dados[$i]["id-carrinho"]?>">
                                        <input type="hidden" name="idCli" value="<?= $idCli?>">

                                        <input type="number" for="id_quantidade" name="id_quantidade" id="id_quantidade" class="form-control  input-number text-center" value="<?=$dados[$i]["quantidade"]?>" min="1" max="100">

                                        <input type="submit" style="margin-top: 5%; padding: 5%; background-color: #fff; color: #854efa; border-radius: 5px; border: 2px solid #854efa;" value="Alterar">
                                        </form>

                                        <?php
                                        echo '    </div>';
                                        echo '  </div>';
                                        echo '  <div class="one-eight text-center">';
                                        echo '    <div class="display-tc">';
                                        echo '      <span for="id_total" class="price" id="id_total" name="id_total">R$ ' . $total . '</span>';
                                        echo '    </div>';
                                        echo '  </div>';
                                        echo '  <div class="one-eight text-center">';
                                        echo '    <div class="display-tc">';
                                        ?>
                                        <form action="../ADM/Controller/carController.php" method="post"> 
                                        <input type="hidden" name="delItem" value ="1">
                                        <input type="hidden" name="idC" value ="<?= $idCli?>">
                                        <input type="hidden" name="idP" value ="<?= $idProd?>">
                                        <input type="submit" style="padding: 5%; background-color: #fff; color: #854efa; border-radius: 5px; border: 2px solid #854efa;" value="X">
                                        </form>
                                        <?php
                                        echo '    </div>';
                                        echo '  </div>';
                                        echo '</div>';

                                        $totalGeral += $total;
                                    }


                                }

                                ?>
                                </table>



                                <div class="row">
                                    <div class="col-10"></div>
                                    <div class="col-2 finalizarCompra">
                                    <div class="total">
                                        <div class="grand-total">
                                            <?php
                                            
                                            
                                            ?>
                                            <p><span><strong>Total:</strong></span> <span>R$ <?= $totalGeral?> </span></p><br>
                                            <!-- Substitua pelo seu valor total -->
                                        </div>
                                    </div>
                                    <input type="hidden" name="id-cliente" value="<?= $idCli; ?>">
                                    <input type="submit" name="finalizar" value="Finalizar a compra" class="btn btn-primary">
                                </div>
                                </div>
                    </form>


                    <?php
                } else {
                    ?>
                    <br><br><br><br>
                    <div class="row row-pb-md">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="product-name">
                                <div class="one-forth text-center">
                                    <span>Detalhes dos produtos</span>
                                </div>
                                <div class="one-eight text-center">
                                    <span>Preço</span>
                                </div>
                                <div class="one-eight text-center">
                                    <span>Quantidade</span>
                                </div>
                                <div class="one-eight text-center">
                                    <span>Total</span>
                                </div>
                                <div class="one-eight text-center">
                                    <span>Remover</span>
                                </div>
                            </div>

                            Para adicionar itens ao carrinho, clique <a href="../index.php"> AQUI </a>
                            <?php

                }
            } else {
                ?>
                        <br><br><br><br>
                        <div class="row row-pb-md">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="product-name">
                                    <div class="one-forth text-center">
                                        <span>Detalhes dos produtos</span>
                                    </div>
                                    <div class="one-eight text-center">
                                        <span>Preço</span>
                                    </div>
                                    <div class="one-eight text-center">
                                        <span>Quantidade</span>
                                    </div>
                                    <div class="one-eight text-center">
                                        <span>Total</span>
                                    </div>
                                    <div class="one-eight text-center">
                                        <span>Remover</span>
                                    </div>
                                </div>

                                Para adicionar itens ao carrinho, clique <a href="acessar.php"> AQUI </a>
                                <?php
            }
            ?>
                            <br><br><br>


                            <script src="../script.js"></script>

</body>

</html>

<?php
$conn->close();
if (isset($_REQUEST["msg"])) {
    require_once "../ADM/Ferramentas/msg.php";
    $cod = $_REQUEST["msg"];
    $msgExibir = $MSG[$cod];
    echo "<script>alert('" . $msgExibir . "')</script>";
}
?>