<?php

session_start();
if (isset($_SESSION["id-Cliente"]) || isset($_SESSION["id-Cliente"])) {
  $idCli = $_SESSION["id-Cliente"];
} else {
  $idCli = "falha";
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <title> Compra </title>
  <link rel="stylesheet" href="../css/cssplaycorrig.css">
  <link rel="stylesheet" href="../styles/style.css">
  <link rel="stylesheet" href="../css/descricaoreal.css">
  <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
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
      background-color: #8c52ff;
      color: white;
      display: inline-block;
      border-radius: 0.5rem;
      width: 100%;
      padding: 0.75rem 1.25rem;
      text-align: center;
      font-size: 15px;
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
  <script>
    function calcular() {
      var div = document.getElementById('frete');
      div.style.display = 'block';
    }
  </script>
</head>

<body>
  <header class="header">
    <div class="container">
      <div class="logo">
        <a href="../index.php"><img src="../assets/imgs/Logonav.png"></a>
      </div>
      <nav class="menu">
        <div class="head">
          <div class="logo">
            <a href="../index.php"><img src="../assets/imgs/logorespnav.png"></a>
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
          <button type="button" class="cart icon-btn"><a href="carrinho.php"><i class="fa-solid fa-shopping-cart" style="color: #8c52ff;"></a></i></button>
          <button type="button" class="user icon-btn"><a href="acessar.php"><i class="fa-solid fa-user" style="color: #8c52ff;"></a></i></button>
          <button type="button" class="open-menu-btn">
            <span class="line line-1"></span>
            <span class="line line-2"></span>
            <span class="line line-3"></span>
          </button>
      </div>
    </div>
  </header>


  <?php
  // Conexão com o banco de dados
  require_once "../ADM/Model/conexao.php";

  if (isset($_GET['id_produtos'])) {

    $id_produtos = $_GET['id_produtos'];
    $sql = "SELECT imggd, nome, preco, titulo_desc, descri FROM produtos WHERE id_produtos = '$id_produtos'";
  } else {
    echo "<br><br><br><br><br><br><br>Selecione um produto";
  }



  // Consulta para buscar os jogos

  $result = $conn->query($sql);
  ?>





  <!-- -------------------- IMAGEM DO PRODUTO --------------------------- -->
  <div class="row">
    <?php
    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      echo '<div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 imgDesc">';
      echo '<img src="../assets/' . $row["imggd"] . '" alt="' . $row["nome"] . '">';
      echo '</div>';


    ?>

      <!-- -------------------- CARD DO PRODUTO --------------------------- -->

      <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 cardDesc">
        <div class="card-container">
          <div class="row">
            <?php


            echo '<div class="col-5"><h3 class="nomeProd">' . $row["nome"] . '</h3></div>';
            ?>
            <div class="col-5"></div>
          </div>
          <h7 class="nomeLoja">GameOne</h7>
          <div class="card-header"></div>
          <div class="row">
            <?php
            echo '<div class="col-4"><h3 class="precoProd"> R$ ' . $row["preco"] . '</h3></div>';

            ?>

            <div class="col-6"></div>
            <div class="col-2">
              <!-- ... (conteúdo do card) -->
              <center>

                <form action="../ADM/Controller/carController.php" method="post">
                  <div class="quantity" style="justify-content: center; display: flex; align-items: center;">
                    <input type="number" style="width: 50%; margin-top: 5%;" name="quantidade-produto" value="1">
                  </div>
              </center>
            </div>
          </div>
          <div class="actions">

            <input type="hidden" name="id-cliente" value="<?= $idCli; ?>">
            <input type="hidden" name="id-produto" value="<?= $id_produtos; ?>">
            <input type="hidden" name="preco-produto" value="<?= $row["preco"] ?>">
            <input type="hidden" name="status-produto" value="No carrinho">

            <!-- Adicione os seguintes campos para enviar nome e preço -->
            <input type="hidden" name="nome-produto" value="<?= $row["nome"]; ?>">

            <input type="submit" class="comprarButton" style="border: none;" name="produtos-carrinho" value="Adicionar ao Carrinho">
            </form>

          </div>
          <div class="card-header"></div>
          <h3 class="tituloCep">Onde você está?</h3>
          <p class="textoCep" style="text-align: left; margin-left: 0%;">Informe sua localização para indicarmos a data
            prevista de entrega ou retirada.</p>
          <div class="container">
            <input placeholder="Digite o seu CEP" style="width: 35%;" class="input-style" type="text">
            <button onclick="calcular()" style="margin-left: 5%; height: 6vh; width: 25%; border-radius: 10px; background-color: #fff; color: #8c52ff; border: 2px solid #8c52ff">Calcular</button>
          </div>
          <p class="textoCep" id="frete" style="display: none; text-align: left; margin-left: 0%; font-size: 15px;">Frete
            Padrão: R$15,00 <br> Chegada prevista: entre 01/01 e 05/01.</p>
          <h7 class="marcaCep">Vendido e entregue por: GAMEONE - BR</h7>
        </div>
      </div>
      <!-- fim do row -->
  </div>

  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 cardDesc">
      <h1>Descrição do Produto</h1>
    <?php
      echo '<h4>' . $row["titulo_desc"] . '</h4>';
      echo '<p>' . $row["descri"] . '</p>';
    }
    ?>
    </div>
  </div>



  <br><br><br><br>
  <div class="row imgProd2">
    <img src="../imagens/fimpag.png" alt="">
  </div>
  <script src="https://kit.fontawesome.com/c1adecaaf6.js" crossorigin="anonymous"></script>
  <script src="script.js"></script>
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