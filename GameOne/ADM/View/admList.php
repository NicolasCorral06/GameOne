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
        function confirmDelete(id) {
            var resp = confirm("Tem certeza que deseja apagar este registro?");
            if (resp == true) {
                location.href = "../Controller/admController.php?adm_delete=1&id=" + id;
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
    $dados = listaAdm();
    ?>
    <div class="container">
        <div class="row">
            <div class="col">
                <h5>Administradores</h5>
            </div>
            <div class="col">
                <a href="carrosselNew.php" class="addItem" data-toggle="modal" data-target="#modalExemplo">
                    <span class="addItem_text" data-toggle="modal" data-target="#modalExemplo">
                        Adicionar
                    </span>
                    <span class="addItem_icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor"
                            height="24" fill="none" class="svg">
                            <line y2="19" y1="5" x2="12" x1="12"></line>
                            <line y2="12" y1="12" x2="19" x1="5"></line>
                        </svg></span>
                </a>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="divisoria"></div>
            </div>
        </div>
        <div class="row rowFiltro">
            <div class="col">
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
            <div class="col">
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
                            <th>PODER</th>
                            <th>STATUS</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php

                            for ($i = 1; $i <= $dados["num"]; $i++) {
                                echo "<tr>";
                                echo "<td data-label='ID'>" . $dados[$i]["id"] . "</td>";
                                echo "<td data-label='NOME'>" . $dados[$i]["nome"] . "</td>";
                                echo "<td data-label='EMAIL'>" . $dados[$i]["email"] . "</td>";
                                echo "<td data-label='PODER'>" . $dados[$i]["poder"] . "</td>";
                                echo "<td class='STATUS'>";
                                if ($dados[$i]["status"] == 1) {
                                    echo "Ativo";
                                } else {
                                    echo "Inativo";
                                }
                                echo "</td>";


                                echo "<td>";
                                ?>

<form name="formEdit" action="admEdit.php" method="post">
                        <input type="hidden" name="id" value="<?=$dados[$i]['id'];?>">
                        <input type="submit" name="sbmt" value="Editar" class="btnDel button1" class="btnUp">
                    </form>

                                <?php

                                echo "</td>";
                                echo "<td>";

                                ?>
                                <button onclick="confirmDelete(<?= $dados[$i]['id']; ?>)" class="btnDel button1">
                                    Deletar </button>
                                <?php
                                echo "</td>";
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
                    <form action="../Controller/admController.php" method="post"  style="padding: 5%;" name="AdmNew">
                        <input type="hidden" name="adm_new" value="1">
                        <label for="Nome"> Nome </label><br>
                        <input type="text" name="nome" value="" class="formBasico"><br>

                        <label for="Email"> Email </label><br>
                        <input type="email" name="email" value="" class="formBasico"><br>

                        <label for="Senha"> Senha </label><br>
                        <input type="password" name="senha" value="" class="formBasico"><br>

                        <label for="Senha"> Status </label><br>
                        <select name="status" id="status" class="formBasico">
                            <option value="1" selected> Ativo </option>
                            <option value="0"> Inativo </option>
                        </select><br><br>

                        <label for="poder"> Poder </label><br>
                        <select name="poder" id="poder" class="formBasico">
                            <option value="1" selected> 1 </option>
                            <option value="2"> 2 </option>
                        </select><br><br>

                        <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        style="background-color: white; color: black; border: gray">Cancelar</button>
                    <input type="submit" name="sbmt" value="Enviar" class="btn btn-primary"
                        style="background-color: purple; border: none;" class="formBasico sbmt"><br><br>
                </div>
                    </form>
                </div>
            </div>
        </div>

        <?php

        if (!isset($_SESSION["idAdm"]) || ($_SESSION["idAdm"] == "")) {
            session_destroy();
            ?>
            <script>
                window.location.href = "../index.php?msg=OA03";
            </script>
            <?php
            exit();
        }
        ?>

        <!-- Modal Edita -->
        <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">

                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Senha -->
    <div class="modal fade" id="modalSenha" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="../../assets/imgs/pasta.png" alt=""
                        style="width: 9%; border-radius: 50px; background-color: #c484c4; padding: 5px;">
                    <h5 style="margin-top: 2.5%; margin-left: 2%;">Senha - Administrador</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="../Controller/admController.php" method="POST" name="AdmNew">
                        <input type="hidden" name="adm_mudarSenha" value="1">
                        <input type="hidden" name="id" value="<?= $_SESSION["idAdm"]; ?>">
                        <label for="senha1">Senha</label><br>
                        <input type="password" name="senha1" value="" class="formBasico" required><br>
                        <label for="senha2">Senha - digite novamente</label><br>
                        <input type="password" name="senha2" value="" class="formBasico" required><br>
                        <br><br>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"
                        style="background-color: white; color: black; border: gray">Cancelar</button>
                    <input type="submit" name="sbmt" value="Enviar" class="btn btn-primary"
                        style="background-color: purple; border: none;" class="formBasico sbmt"><br><br>
                </div>
                </form>

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