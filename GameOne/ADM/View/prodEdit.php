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

?>
<!DOCTYPE html>
<html lang="en">
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
    <link rel="stylesheet" href="css/estilo.css">
    <script>
        function voltar() {
            location.href = "admList.php";
        }
    </script>
</head>
<body>

        <?php 
        if (!isset($_REQUEST['id'])) {

        ?>
            <form action="prodList.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value="FR08">
            </form>
            <script>
                document.getElementById("myForm").submit();
            </script>
        <?php
        }

        require_once "../model/Manager.php";

        $dados = pegaProd($_REQUEST["id"]);

        if ($dados["result"] == 0) { ?>
            <form action="prodList.php" name="form" id="myForm" method="post">
                <input type="hidden" name="msg" value="BD06">
            </form>
            <script>
                document.getElementById("myForm").submit();
            </script>
        <?php
            exit();
        }

        ?>
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

<br><br><br><br><br><br>

<div class="container">
    <div class="row">
        <div class="col">
            <h5>Área de Administrador - Produtos</h5>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="divisoria"></div>
        </div>
    </div>


<div class="row">
    <div class="col-12" style="left: 0%;">
    <button type="button" class="btn btn-primary" style="background-color: #8f529f; border: none;" data-toggle="modal" data-target="#modalExemplo">
Editar Administrador
</button>
    </div>
</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
      <img src="../../assets/imgs/pasta.png" alt=""
                            style="width: 9%; border-radius: 50px; background-color: #c484c4; padding: 5px;">
        <h5 class="modal-title" id="exampleModalLabel" style="margin-top: 1.5%; margin-left: 5%;">Produtos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id="admForm">
    <form action="../Controller/admController.php" method="post" name="ProdNew">
    <input type="hidden" name="idProd" value="<?=$dados["id_produtos"];?>">
    <input type="hidden" name="editaImg" value="1">
    <label for="img"> Arquivo de Imagem Pequena (80x80) </label><br> 
    <input type="file" id="imgpq" name="imgpq" value="<?=$dados["imgpq"];?>" accept="image/png, image/jpeg, image/jpg, image/jfif"><br><br>

    <label for="img"> Arquivo de Imagem Grande (460x460) </label><br>
    <input type="file" id="imggd" name="imggd" value="<?=$dados["imggd"];?>" accept="image/png, image/jpeg, image/jpg, image/jfif"><br><br>

    <label for="nomeProd">Nome do Produto</label>
	  <input type='text' id='nome' name='nome' value="<?=$dados["nome"];?>" required><br><br>

    <label for="precoProd">Preço do Produto</label>
	  <input type='text' id='preco' name='preco' value="<?=$dados["preco"];?>" required><br><br>

    <label for="titDesc">Título da Descrição</label>
	  <input type='text' id='titulo_desc' name='titulo_desc' value="<?=$dados["titulo_desc"];?>" required><br><br>

    <label for="textoDesc">Texto de Descrição</label>
	  <input type='text' id='descri' name='descri' value="<?=$dados["descri"];?>" required><br><br>

    <label for="macro">Tipo Produto Macro</label>
    <select id="tipo_produto_macro" name="tipo_produto_macro">
      <option value="Nintendo">Nintendo</option>
      <option value="Playstation">Playstation</option>
      <option value="Xbox">Xbox</option>
    </select><br><br>

    
    <label for="Senha"> Status </label><br>
            <select name="status" id="status" class="formBasico">
                <option value="1" <?php echo $dados["status"] == 1 ? "selected":""?>> Ativo </option>
                <option value="0"<?php echo $dados["status"] == 0 ? "selected":""?>> Inativo </option>
            </select><br><br>

    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <input type="submit" value="Enviar" name="sbmt" class="btn btn-primary" style="background-color: #8f529f; border: none;">
</form>
      </div>
    </div>
  </div>
</div>

    


    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>