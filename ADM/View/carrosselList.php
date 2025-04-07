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
        function confirmDelete(id_carrossel) {
            var resp = confirm("Tem certeza que deseja apagar este registro?");
            if (resp == true) {
                location.href = "../Controller/admController.php?carrossel_delete=1&id_carrossel=" + id_carrossel;
            } else {
                return null;
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
            <img src="../../assets/imgs/LogoNav2.png" style="margin-top: -3%;" alt="">
        </div>
        <div class="right">
            <button class="Btn">

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
            <h2 style="font-size: 20px; margin-top: 5%;"> Nicolás </h2>
        </center>
        <!-- <a href="#"><ion-icon name="people-outline"></ion-icon><span></span></a> -->

        <?php


        if ($_SESSION["poderAdm"] >= 8) {
            ?>
            <a href="admChangePassw.php"><ion-icon name="lock-closed-outline"></ion-icon><span>Mudar Senha</span></a>

            <?php
        }

        if ($_SESSION["poderAdm"] >= 9) {
            ?>
            <a href="admList.php"><ion-icon name="people-outline"></ion-icon><span>Administradores</span></a>

            <?php
        }


        if ($_SESSION["poderAdm"] >= 8) {
            ?>
            <a href="cliList.php"><ion-icon name="people-circle-outline"></ion-icon><span>Clientes</span></a>

            <?php
        }


        if ($_SESSION["poderAdm"] >= 8) {
            ?>
            <a href="logoList.php"><ion-icon name='flash-sharp'></ion-icon><span>Logotipo</span></a>

            <?php
        }

        if ($_SESSION["poderAdm"] >= 7) {
            ?>
            <a href="carrosselList.php"><ion-icon name="images-outline"></ion-icon><span>Carrossel</span></a>

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
    $dados = listaCarrossel();
    ?>
    <div class="container">
        <div class="row">
            <div class="col-4 tituloPag">
                <h5>Área do Administrador</h5>
            </div>
            <div class="col-4"></div>
            <div class="col-4">
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
                            <th>IMG</th>
                            <th>LINK</th>
                            <th>STATUS</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php
                            for ($i = 1; $i <= $dados["num"]; $i++) {
                                echo "<tr  class='pular'>";
                                echo "<td data-label='ID'>" . $dados[$i]["id_carrossel"] . "</td>";
                                echo "<td data-label='IMG'>" . $dados[$i]["imagem"] . "</td>";
                                echo "<td data-label='LINK' style='color: #800080a1;'>" . $dados[$i]["link"] . "</td>";
                                echo "<td data-label='STATUS'>";
                                if ($dados[$i]["status"] == 1) {
                                    echo "Ativo";
                                } else {
                                    echo "Inativo";
                                }
                                echo "</td>";


                                echo "<td>";
                                ?>


                                <form name="formEdit" method="post">
                                    <input type="hidden" name="id_carrossel" value="<?= $dados[$i]['id_carrossel']; ?>">
                                    <button type="button" class="btnUp button2" data-toggle="modal"
                                        data-target="#modalEditar">Editar</button>
                                </form>

                                <?php

                                echo "</td>";
                                echo "<td>";

                                ?>
                                <button onclick="confirmDelete(<?= $dados[$i]['id_carrossel']; ?>)" class="btnDel button1">
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



        <!-- Modal -->
        <div class="modal fade" id="modalExemplo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <img src="../../assets/imgs/pasta.png" alt=""
                            style="width: 9%; border-radius: 50px; background-color: #c484c4; padding: 5px;">
                        <h5 style="margin-top: 2.5%; margin-left: 2%;">Novo Carrossel</h5>
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
                                <h5>Upload de Imagem</h5>
                                <p>Escolha uma imagem para o carrossel.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="custum-file-upload" for="file">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24">
                                            <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                                            <g stroke-linejoin="round" stroke-linecap="round"
                                                id="SVGRepo_tracerCarrier"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill=""
                                                    d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z"
                                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="text">
                                        <span>Espaço para adicionar a sua imagem, <span
                                                style="color: purple; font-size: 15px;">Clicando aqui.</span></span>
                                    </div>
                                    <input type="file" id="file">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Link da Imagem</label><br>
                                <input placeholder="Link" class="input-style" type="text">
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
                            style="background-color: purple; border: none;">Salvar Carrossel</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <img src="../../assets/imgs/pasta.png" alt=""
                            style="width: 9%; border-radius: 50px; background-color: #c484c4; padding: 5px;">
                        <h5 style="margin-top: 2.5%; margin-left: 2%;">Editar Carrossel</h5>
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
                                <h5>Upload de Imagem</h5>
                                <p>Escolha uma imagem para o carrossel.</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label class="custum-file-upload" for="file">
                                    <div class="icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="" viewBox="0 0 24 24">
                                            <g stroke-width="0" id="SVGRepo_bgCarrier"></g>
                                            <g stroke-linejoin="round" stroke-linecap="round"
                                                id="SVGRepo_tracerCarrier"></g>
                                            <g id="SVGRepo_iconCarrier">
                                                <path fill=""
                                                    d="M10 1C9.73478 1 9.48043 1.10536 9.29289 1.29289L3.29289 7.29289C3.10536 7.48043 3 7.73478 3 8V20C3 21.6569 4.34315 23 6 23H7C7.55228 23 8 22.5523 8 22C8 21.4477 7.55228 21 7 21H6C5.44772 21 5 20.5523 5 20V9H10C10.5523 9 11 8.55228 11 8V3H18C18.5523 3 19 3.44772 19 4V9C19 9.55228 19.4477 10 20 10C20.5523 10 21 9.55228 21 9V4C21 2.34315 19.6569 1 18 1H10ZM9 7H6.41421L9 4.41421V7ZM14 15.5C14 14.1193 15.1193 13 16.5 13C17.8807 13 19 14.1193 19 15.5V16V17H20C21.1046 17 22 17.8954 22 19C22 20.1046 21.1046 21 20 21H13C11.8954 21 11 20.1046 11 19C11 17.8954 11.8954 17 13 17H14V16V15.5ZM16.5 11C14.142 11 12.2076 12.8136 12.0156 15.122C10.2825 15.5606 9 17.1305 9 19C9 21.2091 10.7909 23 13 23H20C22.2091 23 24 21.2091 24 19C24 17.1305 22.7175 15.5606 20.9844 15.122C20.7924 12.8136 18.858 11 16.5 11Z"
                                                    clip-rule="evenodd" fill-rule="evenodd"></path>
                                            </g>
                                        </svg>
                                    </div>
                                    <div class="text">
                                        <span>Espaço para adicionar a sua imagem, <span
                                                style="color: purple; font-size: 15px;">Clicando aqui.</span></span>
                                    </div>
                                    <input type="file" id="file">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="">Link da Imagem</label><br>
                                <input placeholder="Link" class="input-style" type="text">
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
                            style="background-color: purple; border: none;">Salvar Carrossel</button>
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