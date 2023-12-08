<?php

session_start();
if (isset($_SESSION["id-Cliente"]) || isset($_SESSION["id-Cliente"])){
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
                <button type="button" class="cart icon-btn"><a href="carrinho.php"><i class="fa-solid fa-shopping-cart"></i></a></button>
                <button type="button" class="user icon-btn"><i class="fa-solid fa-user"></i></button>
                <button type="button" class="open-menu-btn">
                    <span class="line line-1"></span>
                    <span class="line line-2"></span>
                    <span class="line line-3"></span>
                </button>
            </div>
        </div>
    </header>

    
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
        if (isset($nomeCli)){
            echo " Carrinho do $nomeCli <br><br>" ;
        } else {
            echo " Carrinho <br><br>";
        }


        if (isset($idCli)){

        include_once '../ADM/Model/manager.php';
        $dados = carrListar($idCli);

        if (isset($dados["num"])){

        
    ?>

    <br><br><br><br><br><br>
    <form action="../ADM/Controller/carController.php" method="post">

   
        <table class="" border="1">
            <tr>
                <th class=""> id-produto </th>
                <th class=""> Imagem  </th>
                <th class=""> Nome </th>
                <th class=""> Quantidade </th>
                <th class=""> Preço </th>
                <th class=""> total </th>
                <th class=""> botão foda-se </th>
                
            </tr>
            <?php
            $jonas = "jonas";
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
            for($i = 1;$i <= $dados["num"]; $i++){
                $idProd = $dados[$i]["id-produto"];

                $img = imgList($conn, $idProd); 
            
                echo "<tr>";
                echo "<td class=''>". $idProd . "</td>";
                //isso aqui embaixo vazio so serve para separar as coisas, depois lembrar de tirar
                echo "<td class=''> </td>";
                echo '<img src="../assets/' . $img["imgpq"] . '" alt="' . $dados[$i]["nome"] . '">';
               
                echo "<td class=''>". $dados[$i]["nome"] . "</td>";
                echo "<td class=''>". $dados[$i]["quantidade"] . "</td>";
                /*
                 ?>
                    <input type="number" name="quantidade[<?=$i?>]" value="<?= $dados[$i]["quantidade"] ?>">
                    <input type="hidden" name="idProd[<?=$i?>]" value="<?= $idProd ?>">
                    
                <?php

                echo <input type='number' name='quantidade' value='<?=$dados[$i]["quantidade"]?>'> 
                */

                echo "<td class=''>". $dados[$i]["preco"] . "</td>";
                echo "<td class=''>". $dados[$i]["total"] . "</td>";
                echo "<td>";
                    ?>
                        <button onclick="confirmDelete(<?=$dados[$i]['id-carrinho'];?>)" class="btnDel"> Deletar //n fiz, mas isso é simples </button>
                    <?php
                echo"</td>";
                
                echo "</tr>";
            }
            
            ?>
        </table> 
        <input type="hidden" name="atualizar" value="1">
        <input type="hidden" name="idProd" value="<?= $dados[$i]["id-produto"] ?>">

        <input type="hidden" name="id-cliente" value="<?= $idCli ;?>">
        <input type="submit" name="finalizar" value="Finalizar a compra" class="btnUp">
        </form>
        
        <?php
        } else {
           ?>
           <br><br><br><br>
            <table class="" border="1">
                <tr>
                    <th class=""> id-produto </th>
                    <th class=""> Imagem  </th>
                    <th class=""> Nome </th>
                    <th class=""> Quantidade </th>
                    <th class=""> Preço </th>
                    <th class=""> total </th>
                    <th class=""> botão foda-se </th>
                    
                </tr>
            </table><br><br>

            Para adicionar itens ao carrinho, clique <a href="acessar.php"> AQUI </a>
           <?php

            }
        } else {
            ?>
            <br><br><br><br>
            <table class="" border="1">
                <tr>
                    <th class=""> id-produto </th>
                    <th class=""> Imagem  </th>
                    <th class=""> Nome </th>
                    <th class=""> Quantidade </th>
                    <th class=""> Preço </th>
                    <th class=""> total </th>
                    <th class=""> botão foda-se </th>
                    
                </tr>
            </table><br><br>

            Para adicionar itens ao carrinho, clique <a href="acessar.php"> AQUI </a>
            <?php
        }
        ?>
        <br><br><br>


    <script src="../script.js"></script>

    as imagens n tão ficando no lugar, presumo que seja css isso
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
