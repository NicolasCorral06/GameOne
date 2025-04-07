<?php 
session_start();

//------------------------------Login----------------------------\\
if (isset($_POST['cliLogin'])){

    if (!isset($_SESSION['id-Cliente'])){ //confere se uma sessão ja foi iniciada

        if ($_POST['email'] == "" || $_POST['senha'] == "") {
            ?>
                <form method="post" name="myForm" id="myForm" action="../../CLIENTE/login.php">
                    <input type="hidden" value="FR01" name="msg">
                </form>

                <script>        
                    document.getElementById("myForm").submit();
                </script>
            <?php

        } else { // dados foram preenchidos
            include '../Model/conexao.php';
            include '../Model/ferramentas.php';
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $antiEmail = antiInjection($email);
            $antiSenha = antiInjection($senha);

            if ($antiEmail == 0 || $antiSenha == 0){ // <- Ocorreu uma tentativa de injection
                session_destroy();
                ?>
                    <form method="post" name="myForm" id="myForm" action="../../CLIENTE/login.php">
                        <input type="hidden" name="msg" value="FR24">
                    </form>

                    <script>
                        document.getElementById('myForm').submit();
                    </script>
                 <?php
            } else {
                $senhaCriptografada = hash256($senha);
                require_once '../Model/manager.php';
                $dados = validarCliente($email, $senhaCriptografada);

                if($dados["result"] == 1){
                    $_SESSION["id-Cliente"] = $dados["id_cliente"];
                    $_SESSION["nome-Cliente"] = $dados["nome"];
                    $_SESSION["email-Cliente"] = $dados["email"];
                    $_SESSION["cpf-Cliente"] = $dados["cpf"];
                    $_SESSION["telefone-Cliente"] = $dados["telefone"];
                    ?>
                        <form method="post" name="myForm" id="myForm" action="../../CLIENTE/acessar.php">
                            <input type="hidden" name="msg" value="0">
                        </form>
        
                        <script>
                            document.getElementById('myForm').submit();
                        </script>
                    <?php
                } else {
                    session_destroy();
                    ?>
                        <form method="post" name="myForm" id="myForm" action="../../CLIENTE/login.php">
                            <input type="hidden" name="msg" value="FR07">
                        </form>
        
                        <script>
                            document.getElementById('myForm').submit();
                        </script>
                    <?php
                }
            }
        }
    } else {
        session_destroy();
        ?>
            <form method="post" name="myForm" id="myForm" action="../../CLIENTE/login.php">
                <input type="hidden" value="OA04" name="msg">
            </form>

            <script>    
                document.getElementById("myForm").submit();
            </script>
        <?php
    }
} 

//------------------------------Cadastro----------------------------\\
if(isset($_POST["cliCadastro"])){
    $dados["nome"] = $_POST["nome"];
    $dados["email"] = $_POST["email"];
    $dados["telefone"] = $_POST["telefone"];
    $senha1 = $_POST["senha1"];
    $senha2 = $_POST["senha2"];
    $dados["cpf"] = $_POST["cpf"];

    if ($senha1 != $senha2){
        ?>
            <form method="post" name="myForm" id="myForm" action="../../CLIENTE/cadastro.php">
                <input type="hidden" value="FR12" name="msg">
            </form>

            <script>        
                document.getElementById("myForm").submit();
            </script>
        <?php
    } else {
        require_once "../Model/manager.php";
        require_once "../Model/ferramentas.php";

        /*
        $cpf = $dados["cpf"];
        $email = $dados["email"];

        $result = validarClienteM($cpf, $email);

        if($result == true){
            ?>
                <form method="post" name="myForm" id="myForm" action="../../CLIENTE/cadastro.php">
                    <input type="hidden" value="FR31" name="msg">
                </form>

                <script>        
                    document.getElementById("myForm").submit();
                </script>
            <?php
        }

        */
    
        
        $dados["senha"] = hash256($senha1);

        $resp = cliNew($dados);
        
        if($resp == 1){// tudo certo

            ?>
                <form method="post" name="myForm" id="myForm" action="../../CLIENTE/acessar.php">
                    <input type="hidden" name="msg" value="BD50">
                </form>

                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php

        }else{// erro de insert

            ?>
                <form method="post" name="myForm" id="myForm" action="../../CLIENTE/cadastro.php">
                    <input type="hidden" name="msg" value="BD02">
                </form>

                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php

        }
        
    }
    
}
//------------------------------Editar status CLIENTE----------------------------\\

if(isset($_POST["cliEdit"])){
    $id_cliente  = $_POST["id_cliente"];
    $status = $_POST["status"];
    require_once "../Model/manager.php";
    $result = cliEdit($id_cliente, $status);
    
    if($result == 1){ 
        ?>
        <form method="post" action="../view/cliList.php" id="form">
            <input type="hidden" value="BD53" name="msg">
        </form>
        <script>
            document.getElementById("form").submit();
        </script>
        <?php
    } else { 
        ?>
         <form method="post" action="../view/cliList.php" id="form">
            <input type="hidden" value="BD03" name="msg">
        </form>
        <script>
            document.getElementById("form").submit();
        </script>
        <?php
    }
}





if(isset($_REQUEST["endereco_new"])){
    $dados["id_cliente"] = $_REQUEST["id_cliente"];
    $dados["estado"] = $_REQUEST["estado"];
    $dados["cep"] = $_REQUEST["cep"];
    $dados["endereco"] = $_REQUEST["endereco"];
    $dados["numero"] = $_REQUEST["numero"];
    $dados["status"] = "Ativo";
    
    require_once "../Model/manager.php";

    $resp = enderecoNew($dados);
    if($resp == 1){// tudo certo

        ?>
            <form method="post" name="myForm" id="myForm" action="../../CLIENTE/View/cliente.php">
                <input type="hidden" name="msg" value="BD50">
            </form>

            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php

    }else{// erro de insert

        ?>
            <form method="post" name="myForm" id="myForm" action="../../CLIENTE/View/cliente.php">
                <input type="hidden" name="msg" value="BD02">
            </form>

            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php

    }
}


    if(isset($_REQUEST["endereco_upd"])){
        $dados["id_cliente"] = $_REQUEST["id_cliente"];

        $dados["estado"] = $_REQUEST["estado"];
        $dados["cep"] = $_REQUEST["cep"];
        $dados["endereco"] = $_REQUEST["endereco"];
        $dados["numero"] = $_REQUEST["numero"];

        require_once "../Model/manager.php";

        $resp = enderecoUpd($dados);
        if($resp == 1){// tudo certo

            ?>
                <form method="post" name="myForm" id="myForm" action="../../CLIENTE/View/cliente.php">
                    <input type="hidden" name="msg" value="BD50">
                </form>

                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php

        }else{// erro de insert

            ?>
                <form method="post" name="myForm" id="myForm" action="../../CLIENTE/View/cliente.php">
                    <input type="hidden" name="msg" value="BD02">
                </form>

                <script>
                    document.getElementById('myForm').submit();
                </script>
            <?php

        }
    }

if(isset($_POST["novaSenha"])){
    $idCli = $_POST["idCli"];
    $senhaA = $_POST["senhaA"];
    $senhaN1 = $_POST["senhaN1"];
    $senhaN2 = $_POST["senhaN2"];

    if($senhaN1 != $senhaN2){
        ?>
        <form method="post" name="myForm" id="myForm" action="../../CLIENTE/View/clienteUm.php">
            <input type="hidden" name="msg" value="BD02">
        </form>

        <script>
            document.getElementById('myForm').submit();
        </script>
    <?php
    
    }
    require_once "../Model/manager.php";
    require_once "../Model/ferramentas.php";
    $senhaACripto = hash256($senhaA);

    $dados = validarSenha($senhaACripto, $idCli);

    if($dados == true){
        $senhaNCripto = hash256($senhaN1);

        $atualizar = atualizandoSenhaCli($senhaNCripto, $idCli);

        if($atualizar == true){
            ?>
            <form method="post" name="myForm" id="myForm" action="../../CLIENTE/View/cliente.php">
                <input type="hidden" name="msg" value="OP50">
            </form>
    
            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php
        }
    } else {
        ?>
        <form method="post" name="myForm" id="myForm" action="../../CLIENTE/View/cliente.php">
            <input type="hidden" name="msg" value="BD03">
        </form>

        <script>
            document.getElementById('myForm').submit();
        </script>
    <?php
    }
}


if(isset($_POST["edit_cli"])){
    $dados["idCli"] = $_POST["idCli"];

    $dados["nome"] = $_POST["nome"];
    $dados["email"] = $_POST["email"];
    $dados["cpf"] = $_POST["cpf"];
    $dados["telefone"] = $_POST["telefone"];

    include_once "../Model/manager.php";
    $resp = cliAtulizar($dados);
    
    if($resp == 1){
        $_SESSION["id-Cliente"] = $dados["idCli"];
        $_SESSION["nome-Cliente"] = $dados["nome"];
        $_SESSION["email-Cliente"] = $dados["email"];
        $_SESSION["cpf-Cliente"] = $dados["cpf"];
        $_SESSION["telefone-Cliente"] = $dados["telefone"];
        ?>
        <form method="post" name="myForm" id="myForm" action="../../CLIENTE/acessar.php">
            <input type="hidden" name="msg" value="OP50">
        </form>

        <script>
            document.getElementById('myForm').submit();
        </script>
    <?php
    } else {
    ?>
        <form method="post" name="myForm" id="myForm" action="../../CLIENTE/acessar.php">
            <input type="hidden" name="msg" value="BD03">
        </form>

        <script>
            document.getElementById('myForm').submit();
        </script>
    <?php
    }
        
}
?>
