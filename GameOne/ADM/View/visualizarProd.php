<?php
session_start();
if (!isset($_SESSION["idAdm"]) || ($_SESSION["idAdm"] == "")) {
    session_destroy();
    ?>
    <form method="post" name="myForm" id="myForm" action="../index.php">
        <input type="hidden" name="msg" value="OA03">
    </form>

    <script>
        document.getElementById('myForm').submit();
    </script>

    <?php

}

$idProd = $_GET["id"];
include_once "../Model/manager.php";
include_once "../Model/conexao.php";

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do ADM</title>
    <link rel="stylesheet" href="../../css/styleadm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
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
    <script>
        function confirmDelete(id_produtos) {
            var resp = confirm("Tem certeza que deseja apagar este registro?");
            if (resp == true) {
                location.href = "../Controller/admController.php?prod_delete=1&id_produtos=" + id_produtos;
            } else {
                return null;
            }
        }

        function logout(){
            var resp = confirm("Deseja realmente fazer logout?");
            if (resp == true){
                window.location.assign("logout.php");
            }
        }
    </script>
    <style>
        /* --------------------------- CSS DESCRIÇÃO PRODUTOS --------------------------- */

        .card-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 15px;
            margin: 20px;
            display: flex;
            flex-direction: column;
            width: 100%;
        }

        .card-header {
            display: flex;
            align-items: center;
            margin-top: 2%;
            border-bottom: 1px solid #ccc;
        }

        .nomeProd {
            margin-top: 2%;
            font-size: 1.6rem;
        }

        .nomeLoja {
            margin-top: 2.5%;
            font-size: 0.9rem;
        }

        .precoProd {
            margin-top: 2%;
            font-size: 1.6rem;
        }


        .actions {
            padding: 5% 5% 5% 5%;
            margin-bottom: 2%;
        }

        .actions a {
            text-decoration: none;
        }


        .comprarButton {
            margin-top: 3%;
            background-color: #fdd900;
            color: black;
            display: inline-block;
            border-radius: 0.5rem;
            width: 100%;
            padding: 0.75rem 1.25rem;
            text-align: center;
            font-size: 0.875rem;
            line-height: 1.25rem;
            font-weight: 600;
        }

        .carrinhoButton {
            margin-top: 4%;
            background-color: #fdd900;
            color: black;
            transition: all .15s ease;
            display: inline-block;
            border-radius: 0.5rem;
            width: 100%;
            padding: 0.75rem 1.25rem;
            text-align: center;
            font-size: 0.875rem;
            line-height: 1.25rem;
            font-weight: 600;
        }

        .tituloCep {
            margin-top: 3%;
            font-size: 1.2rem;
        }

        .textoCep {
            margin: 2% 6% 2% 6%;
            text-align: center;
            font-size: 1.1rem;
        }

        .input-style {
            margin: 3% 0% 0% 0%;
            width: 25%;
            padding: 10px;
            border: 2px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            color: #555;
            outline: none;
        }

        .input-style:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .marcaCep {
            font-size: 0.8rem;
            margin: 0% 0% 0% 0.5%;
        }

        .quantity {
            display: flex;
            align-items: center;
        }

        .quantity .qty-input {
            width: 30px;
            text-align: center;
            background-color: #f0f0f0;
            border: none;
            color: #333;
            font-size: 16px;
            padding: 8px 12px;
            transition: background-color 0.3s;
            display: inline-block;
            text-align: center;
            border-radius: 3px;
            margin: 0;
            line-height: 1;
            box-shadow: none;
        }

        .quantity .qty-input:focus {
            outline: none;
            background-color: #ddd;
        }

        .quantity button {
            background-color: #f0f0f0;
            border: none;
            color: #333;
            cursor: pointer;
            font-size: 16px;
            padding: 8px 12px;
            transition: background-color 0.3s;
            display: inline-block;
            text-align: center;
            border-radius: 3px;
            margin: 0;
            line-height: 1;
            box-shadow: none;
        }

        .quantity button:hover {
            background-color: #ddd;
        }

        .quantity .minus-btn {
            border-radius: 3px 0 0 3px;
        }

        .quantity .plus-btn {
            border-radius: 0 3px 3px 0;
        }


        .favorite-icon {
            color: #e74c3c;
            font-size: 28px;
        }

        img {
            width: 100%;
        }

        .imgDesc {
            padding: 5% 5% 5% 5%;
        }

        .cardDesc {
            padding: 5% 5% 5% 5%;
        }
    </style>
</head>

<body>
<input type="checkbox" id="check">
    <header>
        <label for="check">
            <ion-icon name="menu-outline" id="sidebar_btn"></ion-icon>
        </label>
        <div class="left">
        </div>
        <br>
        <div class="right">
        <button class="Btn" onclick="logout()">

<div class="sign"><svg viewBox="0 0 512 512">
        <path
            d="M217.9 105.9L340.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L217.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1L32 320c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM352 416l64 0c17.7 0 32-14.3 32-32l0-256c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32l64 0c53 0 96 43 96 96l0 256c0 53-43 96-96 96l-64 0c-17.7 0-32-14.3-32-32s14.3-32 32-32z">
        </path>
    </svg></div>

<div class="text">Logout</div>
</button>



        </div>
    </header>

    <div class="sidebar">
    <center>
            <img src="../../assets/imgs/fundodoadm.jpg" class="image">
            <h2 style="font-size: 20px; margin-top: 5%;">
                <?= $_SESSION['nomeAdm']; ?>
            </h2>
            <h5 style="font-size: 13px; margin-top: -5%; color: white;"> Poder:
                <?= $_SESSION['poderAdm']; ?>
            </h5>

        </center>
        <!-- <a href="#"><ion-icon name="people-outline"></ion-icon><span></span></a> -->

        <?php


        if ($_SESSION["poderAdm"] == 1 || $_SESSION["poderAdm"] == 2 || $_SESSION["poderAdm"] == 3) {
            ?>
            <a href="admChangePassw.php" data-toggle="modal" data-target="#modalSenha"><ion-icon
                    name="lock-closed-outline"></ion-icon><span>Mudar Senha</span></a>

            <?php
        }

        if ($_SESSION["poderAdm"] == 1) {
            ?>
            <a href="admList.php"><ion-icon name="people-outline"></ion-icon><span>Administradores</span></a>

            <?php
        }


        if ($_SESSION["poderAdm"] == 1) {
            ?>
            <a href="cliList.php"><ion-icon name="people-circle-outline"></ion-icon><span>Clientes</span></a>

            <?php
        }


     



        if ($_SESSION["poderAdm"] == 1 || $_SESSION["poderAdm"] == 2) {
            ?>
            <a href="prodList.php"><ion-icon name="bag-handle-outline"></ion-icon><span>Produtos</span></a>

            <?php
        }


        if ($_SESSION["poderAdm"] == 1) {
            ?>
            <a href="pedidosList.php"><ion-icon name="card-outline"></ion-icon><span>Pedidos</span></a>


            <?php
        }

        ?>
    </div>
    <br><br><br><br><br>
    <?php
    require_once "../Model/manager.php";
    //$dados = listaProd($conn);
    ?>
    <div class="container">
        <div class="row">
            <div class="col-4 tituloPag">
                <h4>Visualização do Cliente</h4>
            </div>
            <div class="col-4"></div>
            <div class="col-4">
                <a href="prodList.php">
                <button class="voltar">
                    <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" version="1.1"
                        viewBox="0 0 1024 1024">
                        <path
                            d="M874.690416 495.52477c0 11.2973-9.168824 20.466124-20.466124 20.466124l-604.773963 0 188.083679 188.083679c7.992021 7.992021 7.992021 20.947078 0 28.939099-4.001127 3.990894-9.240455 5.996574-14.46955 5.996574-5.239328 0-10.478655-1.995447-14.479783-5.996574l-223.00912-223.00912c-3.837398-3.837398-5.996574-9.046027-5.996574-14.46955 0-5.433756 2.159176-10.632151 5.996574-14.46955l223.019353-223.029586c7.992021-7.992021 20.957311-7.992021 28.949332 0 7.992021 8.002254 7.992021 20.957311 0 28.949332l-188.073446 188.073446 604.753497 0C865.521592 475.058646 874.690416 484.217237 874.690416 495.52477z">
                        </path>
                    </svg>
                    <span>Voltar</span>
                </button></a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="divisoria"></div>
            </div>
        </div>


        <div class="row">
            <?php
           
            $dados = listProdVi($idProd, $conn);
            
            echo '<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 imgDesc">';
            echo '<img src="../../assets/'. $dados["imggd"] .  '" alt="">';
            echo '</div>';
            ?>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 cardDesc">
                <div class="card-container">
                    <div class="row">
                        <?php


                        echo '<div class="col-7"><h3 class="nomeProd">' . $dados["nome"] .'</h3></div>';
                        ?>
                        <div class="col-5"></div>
                    </div>
                    <h7 class="nomeLoja"><?= $dados["titulo_desc"] ?></h7>
                    <div class="card-header" style="background-color: white; margin-bottom: 2.5%;"></div>
                    <div class="row">
                        <?php
                        echo '<div class="col-4"><h3 class="precoProd">' . $dados["preco"] . '</h3></div>';
                        ?>
                        <div class="col-8"></div>
                    </div>
                    <div class="actions">
                        <button class="carrinhoButton" style="border: none;">
                            Adicionar ao Carrinho
                        </button>
                        <button class="comprarButton" style="border: none;">
                            Comprar
                        </button>
                    </div>

                </div>
            </div>
            <!-- fim do row -->
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 cardDesc">
                <h4>Descrição do Produto</h4>
                <?php
                echo '<h5>'. $dados["titulo_desc"] .'</h5>';
                echo '<p>' . $dados["descri"] .  '</p>';
                ?>
            </div>
        </div>





    </div>

    <?php
    if (isset($_REQUEST['msg'])) {
        require_once '../Ferramentas/msg.php';
        $cod = $_REQUEST['msg'];
        echo "<script>alert('" . $MSG[$cod] . "')</script>";
    }
    ?>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>