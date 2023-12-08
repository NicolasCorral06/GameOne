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
            function logout(){
            var resp = confirm("Deseja realmente fazer logout?");
            if (resp == true){
                window.location.assign("logout.php");
            }
        }
        </script>
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
        $dados = listaCli();
    ?>
    <div class="container">
        <div class="row">
            <div class="col-4 tituloPag">
                <h5>Clientes</h5>
            </div>
            <div class="col-4"></div>
            <div class="col-4">
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="divisoria"></div>
            </div>
        </div>
        <div class="row rowFiltro">
            <div class="col-4">
                <form class="form">
                    <button>
                        <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img"
                            aria-labelledby="search">
                            <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9"
                                stroke="currentColor" stroke-width="1.333" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                        </svg>
                    </button>
                    <input class="input" placeholder="Pesquisar" required="" type="text">
                    <button class="reset" type="reset">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </form>
            </div>
            <div class="col-4"></div>
            <div class="col-4">
                <select class="select">
                    <option value="">Mais Recente</option>
                    <option value="">Mais Antigo</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col-12 tabelaCol">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOME</th>
                            <th>EMAIL</th>
                            <th>CPF</th>
                            <th><span style="margin-left: 30%;">STATUS</span></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <?php
            
            for($i = 1;$i <= $dados["num"]; $i++){
                echo "<tr>";
                echo "<td data-label='ID'>". $dados[$i]["id_cliente"] . "</td>";
                echo "<td  data-label='NOME'>". $dados[$i]["nome"] . "</td>";
                echo "<td  data-label='EMAIL'>". $dados[$i]["email"] . "</td>";
                echo "<td  data-label='CPF'>". $dados[$i]["cpf"] . "</td>";
                echo "<td  data-label='STATUS'>";

                echo "<form method='post' action='../controller/cliController.php'>";
                echo "<input type='hidden' name='id_cliente' value='" . $dados[$i]['id_cliente'] . "'>";
                echo "<input type='hidden' name='cliEdit' value='1'>";
                echo "<select name='status' style='width: 25%; height: 5vh; border-radius: 5px;'>";
                echo "<option value='0' " . ($dados[$i]["status"] == 0 ? "selected" : "") . "> 0 </option>";
                echo "<option value='1' " . ($dados[$i]["status"] == 1 ? "selected" : "") . "> 1 </option>";
                echo "</select>";
                /*
                ?>
                    <form name="formEdit" action="../Controller/cliController.php" method="post">
                        <input type="hidden" name="id" value="<?=$dados[$i]['id'];?>">
                        <input type="hidden" name="cliEdit" value="1">
                        <input type="submit" name="sbmt" value="Editar" class="btnUp">
                    </form>
                <?php
                */
                echo " <input type='submit' name='sbmt' value='Editar' class='btn btnPrimary' style='background-color: purple; color: white; width: 50%; height: 5vh;'>";
                echo "</td>";
                echo "</form>";


                echo "</tr>";
            }
            
            ?>
                            


                    </tbody>
                </table>
            </div>
        </div>



        <!-- Modal Add -->
        <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <img src="../../assets/imgs/pasta.png" alt=""
                            style="width: 9%; border-radius: 50px; background-color: #c484c4; padding: 5px;">
                        <h5 style="margin-top: 2.5%; margin-left: 2%;">Administradores</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- <div id="admForm">
                            <form action="../Controller/admController.php" method="post" name="carrosselNew"
                                enctype="multipart/form-data">
                                <input type="hidden" name="enviarImgCarrossel" value="1">
                                <label for="img"> Imagem </label><br>
                                <input type="file" id="imagem" name="imagem"
                                    accept="image/png, image/jpeg, image/jpg, image/jfif"><br><br>

                                <label for="link">Link</label>
                                <input type='text' id='link' name='link' required><br><br>


                                <label for="status">Status</label>
                                <select name="status"><br>
                                    <option value="1"> Ativo </option>
                                    <option value="0"> Inativo </option>
                                </select><br><br>

                                <input type="submit" value="Enviar" name="sbmt" class="formBasico sbmt">
                            </form><br><br>
                            <button class="btnVoltar" onclick="voltar();" id="btnvoltar"> &larr; </button>
                        </div> -->
                        <div class="row">
                            <div class="col-12">
                                <h5>Adicionar Administradores</h5>
                                <p>Registre informações de um novo funcionário.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                            <label for="">Nome</label><br>
                                <input placeholder="Nome" class="input-style" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12"><br>
                                <label for="">Email</label><br>
                                <input placeholder="Email" class="input-style" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">CPF</label><br>
                                <input placeholder="xxx.xxx.xxx-xx" class="input-style" type="text">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                Status
                                <select class="select" style="margin: 5% 0% 0% 0%; width: 15%; height: 4vh;">
                                    <option value="male">1</option>
                                    <option value="female">2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"
                            style="background-color: white; color: black; border: gray">Cancelar</button>
                        <button type="button" class="btn btn-primary"
                            style="background-color: purple; border: none;">Salvar Registro</button>
                    </div>
                </div>
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