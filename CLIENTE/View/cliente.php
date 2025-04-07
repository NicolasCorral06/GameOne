<?php
    session_start();
if (!isset($_SESSION["id-Cliente"]) || ($_SESSION["id-Cliente"] == "")) {
    session_destroy();
    ?>
    <form method="post" name="myForm" id="myForm" action="../acessar.php">
        <input type="hidden" name="msg" value="OA03">
    </form>

    <script>
        document.getElementById('myForm').submit();
    </script>


    <?php
}

include_once "../../ADM/Model/conexao.php";
// Checkando a conexao
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$idCli = $_SESSION["id-Cliente"];
$nomeCli = $_SESSION["nome-Cliente"];

include_once "../../ADM/Model/manager.php";
include_once "../../ADM/Model/conexao.php";

?>


<!DOCTYPE html>
<html>

<head>
    <title>Página - Cliente</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    <link rel="icon" type="image/x-icon" sizes="32x32" href="../assets/favicon-16x16.png">
<link rel="icon" type="image/x-icon" sizes="16x16" href="../assets/favicon.icon">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/carrinho.css">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="stylePaginaCliente.css">

    <link rel="icon" href="user.ico" type="image/x-icon">

    <meta charset="UTF-8">

    <script src="script.js"></script>
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
<header class="header" style="position: absolute;">
        <div class="container">
            <div class="logo">
                <a href="../index.php"><img src="../../assets/imgs/logonav.png"></a>
            </div>
            <nav class="menu">
                <div class="head">
                    <div class="logo">
                        <a href="../../index.php"><img src="../assets/imgs/logorespnin.png"></a>
                        <button type="button" class="close-menu-btn"></button>
                    </div>
                </div>
                <ul>
                    <li class="dropdown">
                        <a href="../nintendo.php" class="nin">Nintendo</a>
                        <!-- <i class="fa-solid fa-chevron-down"></i> -->

                    <li class="dropdown">
                        <a href="../playstation.php">Playstation</a>
                        <!-- <i class="fa-solid fa-chevron-down"></i> -->


                    <li class="dropdown">
                        <a href="../xbox.php">Xbox</a>

                </ul>

            </nav>


            <div class="header-right">
                <button type="button" class="cart icon-btn" ><a href="../carrinho.php"><i class="fa-solid fa-shopping-cart" style="color: #7d4ddc; font-size: 20px;"></a></i></button>
                <button type="button" class="open-menu-btn">
                    <span class="line line-1"></span>
                    <span class="line line-2"></span>
                    <span class="line line-3"></span>
                </button>
            </div>
        </div>
    </header>

    <br><br><br><br><br><br><br>
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <!--MENU - PC-->
                <div class="d-none d-md-block col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                    <p>
                        Olá,
                        <br><b>
                            <?= $_SESSION['nome-Cliente']; ?>!
                        </b>
                    </p>
                    <br>
                    <br>
                    <div class="list-group">
                        <a href="#" id="menu_dadosPessoais" class="list-group-item bordaMenuSelecionado"
                            onclick="trocarFrame('dadosPessoais');adicionarSeletor('menu_dadosPessoais')"><b>DADOS
                                PESSOAIS</b></a>
                        <a href="#" id="menu_endereco" class="list-group-item"
                            onclick="trocarFrame('endereco');adicionarSeletor('menu_endereco')"><b>ENDEREÇOS</b></a>
                        <a href="#" id="menu_pedidos" class="list-group-item"
                            onclick="trocarFrame('pedidos');adicionarSeletor('menu_pedidos')"><b>PEDIDOS</b></a>
                        <a href="#" id="menu_autenticacao" class="list-group-item"
                            onclick="trocarFrame('autenticacao');adicionarSeletor('menu_autenticacao')"><b>AUTENTICAÇÃO</b></a>
                    </div>

                    <p class="sair fonte_cinza" onclick="logout()">SAIR</p>
                </div>

                <!--MENU - MOBILE-->
                <div id="menuMobile" class="d-md-none">
                    <div class="custom-center">
                        Olá,
                        <br><b>
                            <?= $_SESSION['nome-Cliente']; ?>!
                        </b>
                    </div>
                    <br>
                    <br>
                    <div class="list-group custom-center">
                        <a href="#" class="list-group-item"
                            onclick="trocarFrame('dadosPessoais');ocultarMenuMobile();adicionarSeletor('menu_dadosPessoais')"><b>DADOS
                                PESSOAIS</b></a>
                        <a href="#" class="list-group-item"
                            onclick="trocarFrame('endereco');ocultarMenuMobile();adicionarSeletor('menu_endereco')"><b>ENDEREÇOS</b></a>
                        <a href="#" class="list-group-item"
                            onclick="trocarFrame('pedidos');ocultarMenuMobile();adicionarSeletor('menu_pedidos')"><b>PEDIDOS</b></a>
                        <a href="#" class="list-group-item"
                            onclick="trocarFrame('autenticacao');ocultarMenuMobile();adicionarSeletor('menu_autenticacao')"><b>AUTENTICAÇÃO</b></a>
                    </div>

                    <p class="sair custom-center" onclick="logout()">SAIR</p>
                </div>

                <!--DADOS PESSOAIS (LISTAGEM)-->
                <div id="dadosPessoais" class="col-md-9 col-lg-9 col-xl-9 col-xxl-9 frame">
                    <div class="row d-md-none espacamentoMenor">
                        <p class="linkVoltarOuMenu" onclick="trocarFrame('menuMobile')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange"
                                class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                            </svg>
                            MENU
                        </p>
                    </div>

                    <div class="row espacamentoMenor">
                        <p><b class="titulo">DADOS PESSOAIS</b></p>
                    </div>

                    <div class="fundo_cinza">
                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 espacamento">
                                <label>Nome:</label>
                                <br><label><b>
                                        <?= $_SESSION['nome-Cliente']; ?>
                                    </b></label>
                            </div>

                            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 espacamento">
                                <label>Email:</label>
                                <br><label><b>
                                        <?= $_SESSION['email-Cliente']; ?>
                                    </b></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 espacamento">
                                <label>CPF:</label>
                                <br><label><b>
                                        <?= $_SESSION['cpf-Cliente']; ?>
                                    </b></label>
                            </div>

                            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 espacamento">
                                <label>Telefone:</label>
                                <br><label><b>
                                        <?= $_SESSION['telefone-Cliente']; ?>
                                    </b></label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                                <button type="submit" class="btn btn-dark btn_preto"
                                    onclick="trocarFrame('editarDadosPessoais')">EDITAR</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--DADOS PESSOAIS (EDIÇÃO)-->
                <div id="editarDadosPessoais" class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 frame">
                    <div class="row espacamentoMenor">
                        <p class="linkVoltarOuMenu"
                            onclick="trocarFrame('dadosPessoais');adicionarSeletor('menu_dadosPessoais')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange"
                                class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                            </svg>
                            Dados Pessoais
                        </p>
                    </div>

                    <div class="row espacamentoMenor">
                        <p><b class="titulo">EDITAR DADOS PESSOAIS</b></p>
                    </div>

                    <form action="../../ADM/Controller/cliController.php" method="post">
                        <input type="hidden" name="edit_cli" value="1">
                        <input type="hidden" name="idCli" value="<?= $idCli?>">

                        <div class="fundo_cinza">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 espacamento">
                                    <label for="nome" class="form-label">Nome:</label>
                                    <input type="text" class="form-control" name="nome" id="nome" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 espacamento">
                                    <label for="email" class="form-label">Email:</b></label>
                                    <input type="text" class="form-control" name="email" id="email" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 espacamento">
                                    <label for="cpf" class="form-label">CPF:</label>
                                    <input type="password" class="form-control" name="cpf" id="cpf" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 espacamento">
                                    <label for="telefone" class="form-label">Telefone:</label>
                                    <input type="text" class="form-control" name="telefone" id="telefone" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <button type="submit" class="btn btn-dark btn_preto">SALVAR ALTERAÇÕES</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!--ENDEREÇOS (LISTAGEM)-->
              
                <div id="endereco" class="col-md-9 col-lg-9 col-xl-9 col-xxl-9 frame">
                    <div class="row d-none d-md-block espacamentoMenor">
                        <p class="linkVoltarOuMenu"
                            onclick="trocarFrame('dadosPessoais');adicionarSeletor('menu_dadosPessoais')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange"
                                class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                            </svg>
                            Voltar
                        </p>
                    </div>

                    <div class="row d-md-none espacamentoMenor">
                        <p class="linkVoltarOuMenu" onclick="trocarFrame('menuMobile')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange"
                                class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                            </svg>
                            MENU
                        </p>
                    </div>

                    <div class="row espacamentoMenor">
                        <p><b class="titulo">ENDEREÇOS</b></p>
                    </div>

                    <div class="row espacamentoMenor">
                        <div>
                           
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 espacamento fundo_cinza card_endereco">
                            <?php
                           
                            $dados = listEndereco($idCli, $conn);
                            if (isset($dados["num"])) {
                                for ($i = 1; $i <= $dados["num"]; $i++) {
                                    echo "<label> Estado: " . $dados[$i]["estado"] . "</label><br>";
                                    echo "<label> Endereço: " . $dados[$i]["endereco"] . "</label><br>";
                                    echo "<label> Numero: " . $dados[$i]["numero"] . "</label><br>";
                                    echo "<label> CEP: " . $dados[$i]["cep"] . "</label><br>";
                                    echo "<div class='div_card_endereco'>";
                                    echo "<br><button type='button' class='btn btn-dark btn_preto' onclick=\"trocarFrame('editarEndereco')\">EDITAR</button>";
                                    echo "</div>";
                                }
                            } else {
                                ?>
                                <button type="button" class="btn btn-dark btn_preto" onclick="trocarFrame('adicionarEndereco')">ADICIONAR ENDEREÇO</button>
                                <?php
                                echo "<br><br> Nenhum endereço cadastrado <br>";
                            }
                            ?>

                        </div>


                    </div>
                </div>

                <!--ENDEREÇO (ADIÇÃO)-->
                <div id="adicionarEndereco" class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 frame">
                    <div class="row espacamentoMenor">
                        <p class="linkVoltarOuMenu" onclick="trocarFrame('endereco');adicionarSeletor('menu_endereco')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange"
                                class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                            </svg>
                            Endereços
                        </p>
                    </div>

                    <div class="row espacamentoMenor">
                        <p><b class="titulo">ADICIONAR ENDEREÇO</b></p>
                    </div>

                    <form action="../../ADM/Controller/cliController.php" method="post" name="enderecoNew">
                        <input type="hidden" name="endereco_new" value="1">
                        <input type="hidden" name="idCli" value="<?= $idCli ?>">
                        <div class="fundo_cinza">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 espacamento">
                                    <label for="cep" class="form-label">CEP:</label>
                                    <input type="text" id='cep' name='cep' class="form-control" id="cep">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 espacamento">
                                    <label for="endereco_cliente" class="form-label">Endereço:</label>
                                    <input type="text" id='numero' name='endereco' class="form-control" id="numero">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 espacamento">
                                    <label for="numero" class="form-label">Número:</b></label>
                                    <input type="text" id='numero' name='numero' class="form-control" id="numero">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 espacamento">
                                    <label for="estado" class="form-label">Estado:</label>
                                    <select name="estado" id='pais' name='estado' class="form-control">
                                        <option value="">Selecione um estado</option>
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


                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <input type="hidden" name="id_cliente" value="<?= $idCli ?>">
                                    <input type="submit" value="Enviar" name="sbmt" class="btn btn-dark btn_preto ">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!--ENDEREÇO (EDIÇÃO)-->
                <div id="editarEndereco" class="col-md-6 col-lg-6 col-xl-6 col-xxl-6 frame">
                    <div class="row espacamentoMenor">
                        <p class="linkVoltarOuMenu" onclick="trocarFrame('endereco');adicionarSeletor('menu_endereco')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange"
                                class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                            </svg>
                            Endereços
                        </p>
                    </div>

                    <div class="row espacamentoMenor">
                        <p><b class="titulo">EDITAR ENDEREÇO</b></p>
                    </div>

                    <form action="../../ADM/Controller/cliController.php" method="post">
                        <input type="hidden" name="endereco_upd" value="1">
                        <input type="hidden" name="id_cliente" value="<?= $idCli ?>">
                        <div class="fundo_cinza">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 espacamento">
                                    <label for="cep2" class="form-label">CEP:</label>
                                    <input type="text" class="form-control" name="cep" id="cep2">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 espacamento">
                                    <label for="endereco_cliente2" class="form-label">Endereço:</label>
                                    <input type="text" class="form-control" name="endereco" id="endereco_cliente2">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 espacamento">
                                    <label for="numero2" class="form-label">Número:</b></label>
                                    <input type="text" class="form-control" name="numero" id="numero2">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 espacamento">
                                    <label for="estado2" class="form-label">Estado:</label>
                                    <select name="estado" class="form-control" id="estado2">
                                        <option value="">Selecione um estado</option>
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

                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <button type="submit" class="btn btn-dark btn_preto"
                                        onclick="trocarFrame('endereco')">SALVAR ALTERAÇÕES</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                <!--PEDIDOS-->
                <div id="pedidos" class="col-md-9 col-lg-9 col-xl-9 col-xxl-9 frame">
                    <div class="row d-none d-md-block espacamentoMenor">
                        <p class="linkVoltarOuMenu"
                            onclick="trocarFrame('dadosPessoais');adicionarSeletor('menu_dadosPessoais')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange"
                                class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                            </svg>
                            Voltar
                        </p>
                    </div>

                    <div class="row d-md-none espacamentoMenor">
                        <p class="linkVoltarOuMenu" onclick="trocarFrame('menuMobile')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange"
                                class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                            </svg>
                            MENU
                        </p>
                    </div>

                    <div class="row espacamentoMenor">
                        <p><b class="titulo">PEDIDOS</b></p>
                    </div>

                    <div class="fundo_cinza bloco_pedidos">
                        <?php
                        include_once "../../ADM/Model/manager.php";

                        $dados = pedidosListar($idCli, $conn);
                        $dados2 = carListar_Pedido($idCli, $conn);
                        $dados3 = endeListar_Pedido($idCli, $conn);
                        ?>
                        <?php
                        if (
                            isset($dados["num"]) && $dados["num"] > 0 &&
                            isset($dados2["num"]) && $dados2["num"] > 0 &&
                            isset($dados3["num"]) && $dados3["num"] > 0
                        ) {
                            for ($i = 1; $i <= $dados["num"]; $i++) {
                                $total = $dados2[$i]["preco"] * $dados2[$i]["quantidade"];

                                echo "<div class='row'>";
                                echo "<div class='col-md-6 col-lg-6 col-xl-6 col-xxl-6 espacamento'>";
                                echo "<label><b>" . $dados[$i]["status"] . "</b></label>";
                                echo "</div>";

                                echo "<div class='col-md-6 col-lg-6 col-xl-6 col-xxl-6 espacamento'>";
                                echo "<label><b>" . $dados[$i]["pagamento"] . "</b></label>";
                                echo "</div>";
                                echo "</div>";

                                

                                echo "<div class='row'>";
                                echo "<div class='ccol-md-6 col-lg-6 col-xl-6 col-xxl-6 espacamento'>";
                                echo "<label><b>Pedido:</b></label><label>&nbsp;" . $dados[$i]["id-pedido"] . "</label>";
                                echo "</div>";

                                echo "<div class='col-md-6 col-lg-6 col-xl-6 col-xxl-6 espacamento'>";
                                echo "<label><b>Endereço:</b></label>";
                                echo "<br><label>" . $dados3[1]["endereco"] . "</label>, Número <label>" . $dados3[1]["numero"] . "</label>";
                                echo "<br><label>CEP: " . $dados3[1]["cep"] . "</label>";
                                echo "</div>";
                                echo "</div>";

                                echo "<div class='row'>";
                                echo "<div class='col-md-2 col-lg-2 col-xl-2 col-xxl-2 espacamento img-fluid'>";
                                echo "<img src='https://cdn-icons-png.flaticon.com/512/13/13973.png' alt='Produto XPTO' style='width: 60px;'>";
                                echo "</div>";

                                echo "<div class='col-md-10 col-lg-10 col-xl-10 col-xxl-10 espacamento'>";
                                echo "<label><b>" . $dados2[$i]["nome"] . "</b></label>";
                                echo "<br><br><label><b>Quantidade:</b> " . $dados2[$i]["quantidade"] . "&nbsp;|&nbsp; <b>Total:</b> R$ " . $total . "</label>";
                                echo "</div>";
                                echo "</div>";

                                echo "<div class='row'>";
                                echo "<hr class='espacamento'></hr>";
                                echo "</div>";

                                

                            }
                        } else {
                            echo "<br><br> Nenhum pedido localizado";
                        }
                        ?>

                    </div>
                </div>

                <!--AUTENTICAÇÃO - SENHA-->
                <div id="autenticacao" class="col-md-9 col-lg-9 col-xl-9 col-xxl-9 frame">
                    <div class="row d-none d-md-block espacamentoMenor">
                        <p class="linkVoltarOuMenu"
                            onclick="trocarFrame('dadosPessoais');adicionarSeletor('menu_dadosPessoais')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange"
                                class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                            </svg>
                            Voltar
                        </p>
                    </div>

                    <div class="row d-md-none espacamentoMenor">
                        <p class="linkVoltarOuMenu" onclick="trocarFrame('menuMobile')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange"
                                class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                            </svg>
                            MENU
                        </p>
                    </div>

                    <div class="row espacamentoMenor">
                        <p><b class="titulo">AUTENTICAÇÃO</b></p>
                    </div>

                    <div class="fundo_cinza">
                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 espacamento">
                                <label><b>Senha</b></label>
                                <br><label class="fonte_cinza">********************</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                <button type="button" class="btn btn-dark btn_preto"
                                    onclick="trocarFrame('editarSenha')">ALTERAR SENHA</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!--AUTENTICAÇÃO - REDEFINIR SENHA-->
                <div id="editarSenha" class="col-md-9 col-lg-9 col-xl-9 col-xxl-9 frame">
                    <div class="row espacamentoMenor">
                        <p class="linkVoltarOuMenu"
                            onclick="trocarFrame('autenticacao');adicionarSeletor('menu_autenticacao')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="orange"
                                class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                            </svg>
                            Autenticação
                        </p>
                    </div>

                    <div class="row espacamento espacamentoMenor">
                        <p><b class="titulo">AUTENTICAÇÃO</b></p>
                    </div>

                    <form action="../../ADM/Controller/cliController.php" method="post">
                        <input type="hidden" name="novaSenha" value="1">
                        <input type="hidden" name="idCli" value="<?= $idCli ?>">
                        <div class="fundo_cinza">
                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 espacamento">
                                    <label for="senha" class="form-label">Senha atual</label>
                                    <input type="password" name="senhaA" class="form-control" id="senha">
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 espacamento">
                                    <label for="nova_senha" class="form-label">Nova senha</label>
                                    <input type="password" name="senhaN1" class="form-control" id="nova_senha">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 espacamento">
                                    <label for="nova_senha" class="form-label">Nova senha</label>
                                    <input type="password" name="senhaN2" class="form-control" id="nova_senha">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12 espacamento">
                                    <label>Sua senha deve ter pelo menos:</label>
                                    <br>
                                    <br>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="red"
                                        class="bi bi-x-circle" viewBox="0 0 16 16">
                                        <path
                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green"
                                        class="bi bi-check-circle" viewBox="0 0 16 16">
                                        <path
                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                    </svg>
                                    &nbsp;
                                    <label>8 caracteres</label>
                                    <br>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="red"
                                        class="bi bi-x-circle" viewBox="0 0 16 16">
                                        <path
                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green"
                                        class="bi bi-check-circle" viewBox="0 0 16 16">
                                        <path
                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                    </svg>
                                    &nbsp;
                                    <label>1 letra minúscula</label>
                                    <br>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="red"
                                        class="bi bi-x-circle" viewBox="0 0 16 16">
                                        <path
                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green"
                                        class="bi bi-check-circle" viewBox="0 0 16 16">
                                        <path
                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                    </svg>
                                    &nbsp;
                                    <label>1 número</label>
                                    <br>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="red"
                                        class="bi bi-x-circle" viewBox="0 0 16 16">
                                        <path
                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="green"
                                        class="bi bi-check-circle" viewBox="0 0 16 16">
                                        <path
                                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                        <path
                                            d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z" />
                                    </svg>
                                    &nbsp;
                                    <label>1 letra maiúscula</label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12 col-lg-12 col-xl-12 col-xxl-12">
                                    <button type="submit" class="btn btn-dark btn_preto">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>

<?php

if (isset($_REQUEST["msg"])) {
    require_once "../../ADM/Ferramentas/msg.php";
    $cod = $_REQUEST["msg"];
    $msgExibir = $MSG[$cod];
    echo "<script>alert('" . $msgExibir . "')</script>";
}

?>