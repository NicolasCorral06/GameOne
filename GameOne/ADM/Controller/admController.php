<?php 
session_start();

//------------------------------Login ADM----------------------------\\
if (isset($_POST['admLogin'])){

    if (!isset($_SESSION['idAdm'])){ //confere se uma sessão ja foi iniciada

        if ($_POST['email'] == "" || $_POST['senha'] == "") {
            ?>
                <form method="post" action="../index.php" id="form">
                    <input type="hidden" value="FR01" name="msg">
                </form>

                <script>        
                    document.getElementById("form").submit();
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

                    <form method="post" name="myForm" id="myForm" action="../index.php">
                        <input type="hidden" name="msg" value="FR24">
                    </form>

                    <script>
                        document.getElementById('myForm').submit();
                    </script>

                 <?php
            } else {
                $senhaCriptografada = hash256($senha);
                require_once '../Model/manager.php';
                $dados = validarAdm($email, $senhaCriptografada);

                if($dados["result"] == 1){
                    $_SESSION["idAdm"] = $dados["id"];
                    $_SESSION["nomeAdm"] = $dados["nome"];
                    $_SESSION["emailAdm"] = $dados["email"];
                    $_SESSION["poderAdm"] = $dados["poder"];
                    $_SESSION["statusAdm"] = $dados["status"];

                    ?>
                        <form method="post" name="myForm" id="myForm" action="../View/adm.php">
                            <input type="hidden" name="msg" value="0">
                        </form>
        
                        <script>
                            document.getElementById('myForm').submit();
                        </script>
                    <?php
                } else {
                    session_destroy();
                    ?>
                        <form method="post" name="myForm" id="myForm" action="../index.php">
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
            <form method="post" action="../index.php" id="form">
                <input type="hidden" value="OA04" name="msg">
            </form>

            <script>    
                document.getElementById("form").submit();
            </script>
        <?php
    }
} 



// ---------------------- ADM Mudar Senha --------------------------
if (!isset($_SESSION['idAdm'])){
    session_destroy();
    ?>
    <form method="post" name="myForm" id="myForm" action="../View/adm.php">
        <input type="hidden" name="msg" value="OA04">
    </form>
    <script>
        document.getElementById('myForm').submit();
    </script>
    <?php
    
}else{
    if(isset($_POST["adm_mudarSenha"])){
        $senha1 = $_POST["senha1"];
        $senha2 = $_POST["senha2"];

        if($senha1 != $senha2){
        ?>
            <form method="post" name="myForm" id="myForm" action="../view/adm.php">
                <input type="hidden" name="msg" value="FR04">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php
        }
        require_once "../Model/ferramentas.php";
        $senhaCriptografada = hash256($senha1);

        require_once "../Model/manager.php";
        $result = admMudarSenha($_SESSION["idAdm"],$senhaCriptografada);
        if($result == true){
        ?>
            <form method="post" name="myForm" id="myForm" action="../view/adm.php">
                <input type="hidden" name="msg" value="BD50">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php

        }else{
        ?>
            <form method="post" name="myForm" id="myForm" action="../view/adm.php">
                <input type="hidden" name="msg" value="BD03">
            </form>
            <script>
                document.getElementById('myForm').submit();
            </script>
            <?php
        }
    }
 }

//------------------------------ADM Edit----------------------------\\
if(isset($_REQUEST["adm_edit"])){
    $dados["id"] = $_REQUEST["id"];
    $dados["nome"] = $_REQUEST["nome"];
    $dados["email"] = $_REQUEST["email"];
    $dados["senha"] = "";

    if(isset($_REQUEST["senha"]) ||  $_REQUEST["senha"] != ""){
        require_once "../Model/ferramentas.php";
        $dados["senha"] = hash256($_REQUEST["senha"]);
    }

    $dados["poder"] = $_REQUEST["poder"];
    $dados["status"] = $_REQUEST["status"];
    require_once "../Model/manager.php";
    $resp = admEdit($dados);

    if($resp == 1){// tudo certo

        ?>
            <form method="post" name="myForm" id="myForm" action="../View/admList.php">
                <input type="hidden" name="msg" value="BD50">
            </form>

            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php

    }else{// erro de insert
        ?>
            <form method="post" name="myForm" id="myForm" action="../View/admList.php">
                <input type="hidden" name="msg" value="BD02">
            </form>

            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php

    }
}

//------------------------------ADM Exc----------------------------\\
if(isset($_REQUEST["adm_delete"])){
    $id = $_REQUEST["id"];
    require_once "../model/Manager.php";
    $result = admExc($id);
    if($result == 1){ // tudo certo
        ?>
            <form method="post" name="myForm" id="myForm"
            
            action="../view/admList.php">
            
            <input type="hidden" name="msg" value="BD54">
            </form>
            <script>
            document.getElementById('myForm').submit();
            </script>
        <?php

     }else{ //falha da deleção
        ?>
        <form method="post" name="myForm" id="myForm"
        
        action="../view/admList.php">
        
        <input type="hidden" name="msg" value="BD04">
        </form>
        <script>
        document.getElementById('myForm').submit();
        </script>
    <?php
     }
    
}

//------------------------------ADM New----------------------------\\
if(isset($_REQUEST["adm_new"])){
    $dados["nome"] = $_REQUEST["nome"];
    $dados["email"] = $_REQUEST["email"];

    require_once "../Model/ferramentas.php";
    $dados["senha"] = hash256($_REQUEST["senha"]);
    $dados["poder"] = $_REQUEST["poder"];
    $dados["status"] = $_REQUEST["status"];
    require_once "../Model/manager.php";

    $resp = admNew($dados);
    if($resp == 1){// tudo certo

        ?>
            <form method="post" name="myForm" id="myForm" action="../View/admList.php">
                <input type="hidden" name="msg" value="BD50">
            </form>

            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php

    }else{// erro de insert

        ?>
            <form method="post" name="myForm" id="myForm" action="../View/admList.php">
                <input type="hidden" name="msg" value="BD02">
            </form>

            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php

    }
}



//---------------------------------------------ADICIONAR IMAGENS CARDS----------------------------------------------//
    
if(isset($_REQUEST["enviarImg"])){
    if(!isset($_FILES["imgpq"]) || !isset($_FILES["imggd"]) || !isset($_POST["nome"]) || !isset($_POST["preco"]) || !isset($_POST["titulo_desc"]) || !isset($_POST["descri"]) || !isset($_POST["tipo_produto_macro"]) || !isset($_POST["status"])){ 
    // Dados não preenchidos
        ?>
            <form method="post" action="../view/prodList.php" id="form">
                <input type="hidden" value="FR01" name="msg">
            </form>
            <script>
                document.getElementById("form").submit();
            </script>
        <?php

    } else { 
    // os dados foram preenchidos

        $imgpq = $_FILES["imgpq"];
        $imggd = $_FILES["imggd"];
        

        if($imgpq["error"] != 0 || $imggd["error"] != 0){ 
            //  teve erro  
            ?>
                <form method="post" action="../view/prodList.php" id="form">
                    <input type="hidden" value="FR27" name="msg">
                </form>
                <script>
                    document.getElementById("form").submit();
                </script>
                <?php

        } else { 
        // sem erro
            include "../Model/ferramentas.php";

            $pqExt = pegaExtensao($imgpq["name"]);
            $gdExt = pegaExtensao($imggd["name"]);
            $allowed = array("jpeg", "jpg", "png", "jfif");

            if(!in_array($pqExt, $allowed) || !in_array($gdExt, $allowed)){ 
                ?>
                    <form method="post" action="../view/prodList.php" id="form">
                        <input type="hidden" value="FR19" name="msg">
                    </form>
                    <script>
                        document.getElementById("form").submit();
                    </script>
                <?php
            } else { 
                include_once "../Model/manager.php";
                $imgMicrotimePq = "pq_" . geradorMicroTime() . "." . $pqExt;
                $imgMicrotimeGd = "gd_" . geradorMicroTime() . "." . $gdExt;
                $nome = $_POST["nome"];
                $preco = $_POST["preco"];
                $titulo_desc = $_POST["titulo_desc"];
                $descri = $_POST["descri"];
                $tipo_produto_macro = $_POST["tipo_produto_macro"];
                $status = $_POST["status"];
                $result = salvarImg($imgMicrotimePq, $imgMicrotimeGd, $nome, $preco, $titulo_desc, $descri, $tipo_produto_macro, $status);
               
                if($result == 0){
                    ?>
                        <form method="post" action="../view/prodList.php" id="form">
                            <input type="hidden" value="BD02" name="msg">
                        </form>
                        <script>
                            document.getElementById("form").submit();
                        </script>
                    <?php

                } else {
                    move_uploaded_file($imgpq["tmp_name"], "../../assets/$imgMicrotimePq");
                    move_uploaded_file($imggd["tmp_name"], "../../assets/$imgMicrotimeGd");

                     /*
                    id, id_produto, quantidade_produto
                    */
                    $dados = estoqueProd($nome);
                    if ($dados["result"] = 1){
                        ?>
                            <form method="post" action="../View/prodList.php" id="form">
                                <input type="hidden" value="FR51" name="msg">
                            </form>
                            <script>
                                document.getElementById("form").submit();
                            </script>
                        <?php
                     } else {
                        ?>
                        <form method="post" action="../View/prodList.php" id="form">
                            <input type="hidden" value="FR30" name="msg">
                        </form>
                        <script>
                            document.getElementById("form").submit();
                        </script>
                    <?php
                     }
                }
            }
        }
    }
}

//---------------------------------------------ALTERA IMAGENS CARDS----------------------------------------------//

if(isset($_REQUEST["editaImg"])){
    $imgpq = $_FILES["imgpq"];
    $imggd = $_FILES["imggd"];

    $dados["idProd"] = $_REQUEST["idProd"];

    $dados["imgpq"] = $imgpq;
    $dados["imggd"] = $imggd;
    $dados["nome"] = $_REQUEST["nome"];
    $dados["preco"] = $_REQUEST["preco"];
    $dados["titulo_desc"] = $_REQUEST["titulo_desc"];
    $dados["descri"] = $_REQUEST["descri"];
    $dados["tipo_produto_macro"] = $_REQUEST["tipo_produto_macro"];
    $dados["status"] = $_REQUEST["status"];
    require_once "../Model/manager.php";
    $resp = prodEdit($dados);

    if($resp == 1){// tudo certo

        ?>
            <form method="post" name="myForm" id="myForm" action="../View/prodList.php">
                <input type="hidden" name="msg" value="BD50">
            </form>

            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php

    }else{// erro de insert
        ?>
            <form method="post" name="myForm" id="myForm" action="../View/prodList.php">
                <input type="hidden" name="msg" value="BD02">
            </form>

            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php

    }
}



//------------------------------PRODUTOS Exc----------------------------\\
if(isset($_REQUEST["prod_delete"])){
    $id_produtos = $_REQUEST["id_produtos"];
    require_once "../model/Manager.php";
    $result = prodExc($id_produtos);
    if($result == 1){ // tudo certo
        ?>
            <form method="post" name="myForm" id="myForm"
            
            action="../view/prodList.php">
            
            <input type="hidden" name="msg" value="BD54">
            </form>
            <script>
            document.getElementById('myForm').submit();
            </script>
        <?php

     }else{ //falha da deleção
        ?>
        <form method="post" name="myForm" id="myForm"
        
        action="../view/prodList.php">
        
        <input type="hidden" name="msg" value="BD04">
        </form>
        <script>
        document.getElementById('myForm').submit();
        </script>
    <?php
     }
    
}



//---------------------------------------------ADICIONAR IMAGEM LOGOTIPO----------------------------------------------//
    
if(isset($_REQUEST["enviarImgLogo"])){
    if(!isset($_FILES["imgpq"]) || !isset($_FILES["imggd"]) || !isset($_FILES["menu_logo"])  || !isset($_POST["status"])){ 
    // Dados não preenchidos
        ?>
            <form method="post" action="../view/logoList.php" id="form">
                <input type="hidden" value="FR01" name="msg">
            </form>
            <script>
                document.getElementById("form").submit();
            </script>
        <?php

    } else { 
    // os dados foram preenchidos

        $imgpq = $_FILES["imgpq"];
        $imggd = $_FILES["imggd"];
        

        if($imgpq["error"] != 0 || $imggd["error"] != 0){ 
            //  teve erro  
            ?>
                <form method="post" action="../view/logoList.php" id="form">
                    <input type="hidden" value="FR27" name="msg">
                </form>
                <script>
                    document.getElementById("form").submit();
                </script>
                <?php

        } else { 
        // sem erro
            include "../Model/ferramentas.php";

            $pqExt = pegaExtensao($imgpq["name"]);
            $gdExt = pegaExtensao($imggd["name"]);
            $allowed = array("jpeg", "jpg", "png", "jfif");

            if(!in_array($pqExt, $allowed) || !in_array($gdExt, $allowed)){ 
                ?>
                    <form method="post" action="../view/logoList.php" id="form">
                        <input type="hidden" value="FR19" name="msg">
                    </form>
                    <script>
                        document.getElementById("form").submit();
                    </script>
                <?php
            } else { 
                include "../Model/manager.php";
                $imgMicrotimePq = "pq_" . geradorMicroTime() . "." . $pqExt;
                $imgMicrotimeGd = "gd_" . geradorMicroTime() . "." . $gdExt;
                $status = $_POST["status"];
                $menu_logo = $_POST["menu_logo"];
                $result = salvarImgLogo2($imgMicrotimePq, $imgMicrotimeGd,  $menu_logo, $status);

                if($result == 0){
                    ?>
                        <form method="post" action="../view/logoList.php" id="form">
                            <input type="hidden" value="BD02" name="msg">
                        </form>
                        <script>
                            document.getElementById("form").submit();
                        </script>
                    <?php

                } else {
                    move_uploaded_file($imgpq["tmp_name"], "../../assets/logotipo/$imgMicrotimePq");
                    move_uploaded_file($imggd["tmp_name"], "../../assets/logotipo/$imgMicrotimeGd");
                    ?>
                        <form method="post" action="../View/logoList.php" id="form">
                            <input type="hidden" value="FR51" name="msg">
                        </form>
                        <script>
                            document.getElementById("form").submit();
                        </script>
                    <?php
                }
            }
        }
    }
}

// --------------------- ADICIONA LOGO --------------------------------------

if(isset($_REQUEST["enviarImgLogo"])){
    if(!isset($_FILES["imgpq"]) || !isset($_FILES["imggd"]) || !isset($_POST["status"]) || !isset($_POST["menu_logo"])){ 
    // Dados não preenchidos
        ?>
            <form method="post" action="../view/logoList.php" id="form">
                <input type="hidden" value="FR01" name="msg">
            </form>
            <script>
                document.getElementById("form").submit();
            </script>
        <?php

    } else { 
    // os dados foram preenchidos

        $imgpq = $_FILES["imgpq"];
        $imggd = $_FILES["imggd"];
        

        if($imgpq["error"] != 0 || $imggd["error"] != 0){ 
            //  teve erro  
            ?>
                <form method="post" action="../view/logoList.php" id="form">
                    <input type="hidden" value="FR27" name="msg">
                </form>
                <script>
                    document.getElementById("form").submit();
                </script>
                <?php

        } else { 
        // sem erro
            include "../Model/ferramentas.php";

            $pqExt = pegaExtensao($imgpq["name"]);
            $gdExt = pegaExtensao($imggd["name"]);
            $allowed = array("jpeg", "jpg", "png", "jfif");

            if(!in_array($pqExt, $allowed) || !in_array($gdExt, $allowed)){ 
                ?>
                    <form method="post" action="../view/logoList.php" id="form">
                        <input type="hidden" value="FR19" name="msg">
                    </form>
                    <script>
                        document.getElementById("form").submit();
                    </script>
                <?php
            } else { 
                include "../Model/manager.php";
                $imgMicrotimePqLogo = "pq_" . geradorMicroTime() . "." . $pqExt;
                $imgMicrotimeGdLogo = "gd_" . geradorMicroTime() . "." . $gdExt;
                $status = $_POST["status"];
                $menu_logo = $_POST["menu_logo"];
                $result = salvarImgLogo2($imgMicrotimePq, $imgMicrotimeGd, $menu_logo, $status);

                if($result == 0){
                    ?>
                        <form method="post" action="../view/logoList.php" id="form">
                            <input type="hidden" value="BD02" name="msg">
                        </form>
                        <script>
                            document.getElementById("form").submit();
                        </script>
                    <?php

                } else {
                    move_uploaded_file($imgpq["tmp_name"], "../../assets/$imgMicrotimePq");
                    move_uploaded_file($imggd["tmp_name"], "../../assets/$imgMicrotimeGd");
                    ?>
                        <form method="post" action="../View/prodList.php" id="form">
                            <input type="hidden" value="FR51" name="msg">
                        </form>
                        <script>
                            document.getElementById("form").submit();
                        </script>
                    <?php
                }
            }
        }
    }
}



if(isset($_REQUEST["editaImgLogo"])){
    $dados["id"] = $_REQUEST["id"];
    $dados["imgpq"] = $_FILES["imgpq"];
    $dados["imggd"] = $_FILES["imggd"];
    $dados["status"] = $_REQUEST["status"];
    $dados["menu_logo"] = $_REQUEST["menu_logo"];
    require_once "../Model/manager.php";
    $resp = logoEdit($dados);

    if($resp == 1){// tudo certo

        ?>
            <form method="post" name="myForm" id="myForm" action="../View/logoList.php">
                <input type="hidden" name="msg" value="BD50">
            </form>

            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php

    }else{// erro de insert
        ?>
            <form method="post" name="myForm" id="myForm" action="../View/logoList.php">
                <input type="hidden" name="msg" value="BD02">
            </form>

            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php
    }
}

// ---------- logo exc --------------
if(isset($_REQUEST["logo_delete"])){
    $id = $_REQUEST["id"];
    require_once "../Model/manager.php";
    $result = logoExc($id);
    if($result == 1){ // tudo certo
        ?>
            <form method="post" name="myForm" id="myForm"
            
            action="../view/logoList.php">
            
            <input type="hidden" name="msg" value="BD54">
            </form>
            <script>
            document.getElementById('myForm').submit();
            </script>
        <?php

     }else{ //falha da deleção
        ?>
        <form method="post" name="myForm" id="myForm"
        
        action="../view/logoList.php">
        
        <input type="hidden" name="msg" value="BD04">
        </form>
        <script>
        document.getElementById('myForm').submit();
        </script>
    <?php
     }
    
}





if(isset($_REQUEST["menu_new"])){
    $dados["nome_menu"] = $_REQUEST["nome_menu"];
    $dados["status"] = $_REQUEST["status"];
    require_once "../Model/manager.php";

    $resp = menuNew($dados);
    if($resp == 1){// tudo certo

        ?>
            <form method="post" name="myForm" id="myForm" action="../View/menuList.php">
                <input type="hidden" name="msg" value="BD50">
            </form>

            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php

    }else{// erro de insert

        ?>
            <form method="post" name="myForm" id="myForm" action="../View/menuList.php">
                <input type="hidden" name="msg" value="BD02">
            </form>

            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php

    }
}



//------------------------------ADM Exc----------------------------\\
if(isset($_REQUEST["menu_delete"])){
    $id_menu = $_REQUEST["id_menu"];
    require_once "../model/Manager.php";
    $result = menuExc($id_menu);
    if($result == 1){ // tudo certo
        ?>
            <form method="post" name="myForm" id="myForm"
            
            action="../view/menuList.php">
            
            <input type="hidden" name="msg" value="BD54">
            </form>
            <script>
            document.getElementById('myForm').submit();
            </script>
        <?php

     }else{ //falha da deleção
        ?>
        <form method="post" name="myForm" id="myForm"
        
        action="../view/menuList.php">
        
        <input type="hidden" name="msg" value="BD04">
        </form>
        <script>
        document.getElementById('myForm').submit();
        </script>
    <?php
     }
    
}





//------------------------------ADM Edit----------------------------\\
if(isset($_REQUEST["menu_edit"])){
    $dados["id_menu"] = $_REQUEST["id_menu"];
    $dados["nome_menu"] = $_REQUEST["nome_menu"];
    $dados["status"] = $_REQUEST["status"];
    require_once "../Model/manager.php";
    $resp = menuEdit($dados);

    if($resp == 1){// tudo certo

        ?>
            <form method="post" name="myForm" id="myForm" action="../View/menuList.php">
                <input type="hidden" name="msg" value="BD50">
            </form>

            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php

    }else{// erro de insert
        ?>
            <form method="post" name="myForm" id="myForm" action="../View/menuList.php">
                <input type="hidden" name="msg" value="BD02">
            </form>

            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php

    }
}











if(isset($_REQUEST["submenu_new"])){
    $dados["nome_submenu"] = $_REQUEST["nome_submenu"];
    $dados["status"] = $_REQUEST["status"];
    $dados["id_menu"] = $_REQUEST["id_menu"];
    require_once "../Model/manager.php";

    $resp = submenuNew($dados);
    if($resp == 1){// tudo certo

        ?>
            <form method="post" name="myForm" id="myForm" action="../View/submenuList.php">
                <input type="hidden" name="msg" value="BD50">
            </form>

            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php

    }else{// erro de insert

        ?>
            <form method="post" name="myForm" id="myForm" action="../View/submenuList.php">
                <input type="hidden" name="msg" value="BD02">
            </form>

            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php

    }
}


if(isset($_REQUEST["submenu_edit"])){
    $dados["id_submenu"] = $_REQUEST["id_submenu"];
    $dados["nome_submenu"] = $_REQUEST["nome_submenu"];
    $dados["status"] = $_REQUEST["status"];
    $dados["id_menu"] = $_REQUEST["id_menu"];
    require_once "../Model/manager.php";
    $resp = submenuEdit($dados);

    if($resp == 1){// tudo certo

        ?>
            <form method="post" name="myForm" id="myForm" action="../View/submenuList.php">
                <input type="hidden" name="msg" value="BD50">
            </form>

            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php

    }else{// erro de insert
        ?>
            <form method="post" name="myForm" id="myForm" action="../View/submenuList.php">
                <input type="hidden" name="msg" value="BD02">
            </form>

            <script>
                document.getElementById('myForm').submit();
            </script>
        <?php

    }
}


if(isset($_REQUEST["submenu_delete"])){
    $id_submenu = $_REQUEST["id_submenu"];
    require_once "../model/Manager.php";
    $result = submenuExc($id_submenu);
    if($result == 1){ // tudo certo
        ?>
            <form method="post" name="myForm" id="myForm"
            
            action="../view/submenuList.php">
            
            <input type="hidden" name="msg" value="BD54">
            </form>
            <script>
            document.getElementById('myForm').submit();
            </script>
        <?php

     }else{ //falha da deleção
        ?>
        <form method="post" name="myForm" id="myForm"
        
        action="../view/submenuList.php">
        
        <input type="hidden" name="msg" value="BD04">
        </form>
        <script>
        document.getElementById('myForm').submit();
        </script>
    <?php
     }
    
}








// ----------------------------- CARROSSEL ----------------------------------

if(isset($_REQUEST["enviarImgLogo"])){
    if(!isset($_FILES["imgpq"]) || !isset($_FILES["imggd"])  || !isset($_POST["status"])){ 
    // Dados não preenchidos
        ?>
            <form method="post" action="../view/logoList.php" id="form">
                <input type="hidden" value="FR01" name="msg">
            </form>
            <script>
                document.getElementById("form").submit();
            </script>
        <?php

    } else { 
    // os dados foram preenchidos

        $imgpq = $_FILES["imgpq"];
        $imggd = $_FILES["imggd"];
        

        if($imgpq["error"] != 0 || $imggd["error"] != 0){ 
            //  teve erro  
            ?>
                <form method="post" action="../view/logoList.php" id="form">
                    <input type="hidden" value="FR27" name="msg">
                </form>
                <script>
                    document.getElementById("form").submit();
                </script>
                <?php

        } else { 
        // sem erro
            include "../Model/ferramentas.php";

            $pqExt = pegaExtensao($imgpq["name"]);
            $gdExt = pegaExtensao($imggd["name"]);
            $allowed = array("jpeg", "jpg", "png", "jfif");

            if(!in_array($pqExt, $allowed) || !in_array($gdExt, $allowed)){ 
                ?>
                    <form method="post" action="../view/logoList.php" id="form">
                        <input type="hidden" value="FR19" name="msg">
                    </form>
                    <script>
                        document.getElementById("form").submit();
                    </script>
                <?php
            } else { 
                include "../Model/manager.php";
                $imgMicrotimePq = "pq_" . geradorMicroTime() . "." . $pqExt;
                $imgMicrotimeGd = "gd_" . geradorMicroTime() . "." . $gdExt;
                $status = $_POST["status"];
                $result = salvarImgLogo($imgMicrotimePq, $imgMicrotimeGd, $status);

                if($result == 0){
                    ?>
                        <form method="post" action="../view/logoList.php" id="form">
                            <input type="hidden" value="BD02" name="msg">
                        </form>
                        <script>
                            document.getElementById("form").submit();
                        </script>
                    <?php

                } else {
                    move_uploaded_file($imgpq["tmp_name"], "../../assets/$imgMicrotimePq");
                    move_uploaded_file($imggd["tmp_name"], "../../assets/$imgMicrotimeGd");
                    ?>
                        <form method="post" action="../View/logoList.php" id="form">
                            <input type="hidden" value="FR51" name="msg">
                        </form>
                        <script>
                            document.getElementById("form").submit();
                        </script>
                    <?php
                }
            }
        }
    }
}



// ---------- carrossel exc --------------
if(isset($_REQUEST["carrossel_delete"])){
    $id_carrossel = $_REQUEST["id_carrossel"];
    require_once "../Model/manager.php";
    $result = carrosselExc($id_carrossel);
    if($result == 1){ // tudo certo
        ?>
            <form method="post" name="myForm" id="myForm"
            
            action="../view/carrosselList.php">
            
            <input type="hidden" name="msg" value="BD54">
            </form>
            <script>
            document.getElementById('myForm').submit();
            </script>
        <?php

     }else{ //falha da deleção
        ?>
        <form method="post" name="myForm" id="myForm"
        
        action="../view/carrosselList.php">
        
        <input type="hidden" name="msg" value="BD04">
        </form>
        <script>
        document.getElementById('myForm').submit();
        </script>
    <?php
     }
    
}


// --------------------- ADICIONA LOGO --------------------------------------

if(isset($_REQUEST["enviarImgCarrossel"])){
    if(!isset($_FILES["imagem"]) || !isset($_POST["link"]) || !isset($_POST["status"])){ 
    // Dados não preenchidos
        ?>
            <form method="post" action="../view/carrosselList.php" id="form">
                <input type="hidden" value="FR01" name="msg">
            </form>
            <script>
                document.getElementById("form").submit();
            </script>
        <?php

    } else { 
    // os dados foram preenchidos

        $imagem = $_FILES["imagem"];
        

        if($imagem["error"] != 0){ 
            //  teve erro  
            ?>
                <form method="post" action="../view/carrosselList.php" id="form">
                    <input type="hidden" value="FR27" name="msg">
                </form>
                <script>
                    document.getElementById("form").submit();
                </script>
                <?php

        } else { 
        // sem erro
            include "../Model/ferramentas.php";

            $imagemExt = pegaExtensao($imagem["name"]);
            $allowed = array("jpeg", "jpg", "png", "jfif");

            if(!in_array($imagemExt, $allowed)){ 
                ?>
                    <form method="post" action="../view/carrosselList.php" id="form">
                        <input type="hidden" value="FR19" name="msg">
                    </form>
                    <script>
                        document.getElementById("form").submit();
                    </script>
                <?php
            } else { 
                include "../Model/manager.php";
                $imgMicrotimeCarrossel = "imagem_" . geradorMicroTime() . "." . $imagemExt;
                $link = $_POST["link"];
                $status = $_POST["status"];
                $result = salvarImgCarrossel($imgMicrotimeCarrossel, $link, $status);

                if($result == 0){
                    ?>
                        <form method="post" action="../view/carrosselList.php" id="form">
                            <input type="hidden" value="BD02" name="msg">
                        </form>
                        <script>
                            document.getElementById("form").submit();
                        </script>
                    <?php

                } else {
                    move_uploaded_file($imgpq["tmp_name"], "../../imagens/$imgMicrotimeCarrossel");
                    ?>
                        <form method="post" action="../View/carrosselList.php" id="form">
                            <input type="hidden" value="FR51" name="msg">
                        </form>
                        <script>
                            document.getElementById("form").submit();
                        </script>
                    <?php
                }
            }
        }
    }
}

//para criar o estoque




?>