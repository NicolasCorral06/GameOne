<?php
function validarAdm($email,$senhaCriptografada){
    include 'conexao.php';
    $dados = array();
    $dados["result"] = 0;
    $sql = "SELECT * FROM administrador WHERE email = '{$email}' AND senha = '{$senhaCriptografada}' AND status = 1";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $dados["result"] = 1;
            while($row = $result->fetch_assoc()){
            $dados["id"] = $row["id"];
            $dados["nome"] = $row["nome"];
            $dados["email"] = $row["email"];
            $dados["poder"] = $row["poder"];
            }
        $conn->close();
    }
    return $dados;
}
function validarSenha($senhaACripto, $idCli){
    include 'conexao.php';
    $sql = "SELECT senha FROM cliente where senha = '$senhaACripto' AND id_cliente = $idCli";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $conn->close();
        return true; // Senha válida
    } else {
        $conn->close();
        return false; // Senha inválida
    }
}


function admMudarSenha($id,$senha){
    require_once "Conexao.php";
    $sql = "UPDATE administrador set senha = '{$senha}' WHERE id = '{$id}'";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}


function listaAdm(){
    require_once "conexao.php";
    $sql = "SELECT * FROM administrador";
    $result = $conn->query($sql);









    if($result->num_rows > 0){
        $num = $result->num_rows;






        $dados = array();
        $dados["result"] = 1;
        $dados["num"] = $num;
        $i = 1;


        while($row = $result->fetch_assoc()){
            $dados [$i]["id"] = $row["id"];
            $dados [$i]["nome"] = $row["nome"];
            $dados [$i]["email"] = $row["email"];
            $dados [$i]["datahora"] = $row["datahora"];
            $dados [$i]["poder"] = $row["poder"];
            $dados [$i]["senha"] = $row["senha"];
            $dados [$i]["status"] = $row["status"];
            $i++;
        }
        $conn->close();
        return $dados;
    }else{
        $dados["result"] = 0;
        $conn->close();
        return $dados;
    }
   
}


function pegaAdm($id){
    require_once "conexao.php";
    $sql = "SELECT * FROM administrador WHERE id = {$id}";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $dados = array();
        $dados["result"] = 1;
        while($row = $result->fetch_assoc()){
            $dados["id"] = $row["id"];
            $dados["nome"] = $row["nome"];
            $dados["email"] = $row["email"];
            $dados["poder"] = $row["poder"];
            $dados["status"] = $row["status"];
        }
        $conn->close();
        return $dados;
    }else{
        $dados["result"] = 0;
        $conn->close();
        return $dados;
    }
}
















function admEdit($dados){
    require_once "conexao.php";
    $sql = "";

    if(!isset($dados["senha"]) || $dados["senha"] == ""){
        $sql = "UPDATE administrador set nome = '{$dados["nome"]}',email = '{$dados["email"]}',poder = {$dados["poder"]},status = {$dados["status"]} WHERE id = {$dados["id"]}";
    }else{
        $sql = "UPDATE administrador set nome = '{$dados["nome"]}',email = '{$dados["email"]}',senha = '{$dados["senha"]}',poder = {$dados["poder"]},status = {$dados["status"]} WHERE id = {$dados["id"]}";
    }

    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

function admNew($dados){
    require_once "conexao.php";
    $sql = "INSERT INTO administrador (nome,email,senha,datahora,poder,status) VALUES ('{$dados["nome"]}','{$dados["email"]}','{$dados["senha"]}',now(),'{$dados["poder"]}','{$dados["status"]}')";
    $result =  $conn->query($sql);
    if($result == true){
        $conn->close();
        return 1;
    }else{
        $conn->close();
        return 0;
    }
}

function admExc($id){
    require_once "conexao.php";
    $sql = "DELETE FROM administrador WHERE id = {$id}";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}




///     require_once "conexao.php";
//     $sql = "SELECT * FROM produto";
//     $result = $conn->query($sql);
//     if($result->num_rows > 0){
//         $num = $result->num_rows;
//         $dados = array();
//         $dados["result"] = 1;
//         $dados["num"] = $num;
//         $i = 1;
//         while($row = $result->fetch_assoc()){
//             $dados [$i]["id"] = $row["id"];
//             $dados [$i]["imgGd"] = $row["imgGd"];
//             $dados [$i]["imgMd"] = $row["imgMd"];
//             $dados [$i]["imgMd"] = $row["imgMd"];
//             $dados [$i]["tipo"] = $row["tipo"];
//             $dados [$i]["marca"] = $row["marca"];
//             $dados [$i]["datahora"] = $row["datahora"];
//             $dados [$i]["status"] = $row["status"];
//             $i++;
//         }
//         $conn->close();
//         return $dados;
//     }else{
//         $dados["result"] = 0;
//         $conn->close();
//         return $dados;
//     }
   
// }










    


    

function listaProd($conn){
    //puxa as imagens
     $sql = "SELECT * FROM produtos WHERE status = 1";
     $result = $conn->query($sql);
     if($result->num_rows > 0){
        $num = $result->num_rows;
        $dados = array();
        $dados["result"] = 1;
        $dados["num"] = $num;
        $i = 1;
         while($row = $result->fetch_assoc()){
                $dados [$i]["id_produtos"] = $row["id_produtos"];
                $dados [$i]["imgpq"] = $row["imgpq"];
                $dados [$i]["imggd"] = $row["imggd"];
                $dados [$i]["nome"] = $row["nome"];
                $dados [$i]["preco"] = $row["preco"];
                $dados [$i]["titulo_desc"] = $row["titulo_desc"];
                $dados [$i]["descri"] = $row["descri"];
                $dados [$i]["tipo_produto_macro"] = $row["tipo_produto_macro"];
                $dados [$i]["datahora"] = $row["datahora"];
                $dados [$i]["status"] = $row["status"];
                $i++;
            }
            return $dados;
    }else{
        $dados["result"] = 0;
        return $dados;
    }
   
}



function salvarImg($imgMicrotimePq, $imgMicrotimeGd, $nome, $preco, $titulo_desc, $descri, $tipo_produto_macro, $status){
    // faz o upload das imagens no banco
    require_once "conexao.php";
    //$imgpq  = mysqli_real_escape_string($conn, $imgpq);
    //$imggd  = mysqli_real_escape_string($conn, $imggd);
    $nome   = mysqli_real_escape_string($conn, $nome);
    $preco  = mysqli_real_escape_string($conn, $preco);
    $titulo_desc   = mysqli_real_escape_string($conn, $titulo_desc);
    $descri   = mysqli_real_escape_string($conn, $descri);
    $tipo_produto_macro   = mysqli_real_escape_string($conn, $tipo_produto_macro);
    $status = mysqli_real_escape_string($conn, $status);

    $sql = "insert into produtos (imgpq, imggd, nome, preco, titulo_desc, descri, tipo_produto_macro, datahora, status) values ('$imgMicrotimePq', '$imgMicrotimeGd', '$nome', '$preco', '$titulo_desc', '$descri', '$tipo_produto_macro', now(), '$status')";
    $result = $conn->query($sql);
    if($result == true){
        return 1;
    } else {
        return 0;
    }
}

function pegaProd($id_produtos){
    require_once "conexao.php";
    $sql = "SELECT * FROM produtos WHERE id_produtos = {$id_produtos}";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $dados = array();
        $dados["result"] = 1;
        while($row = $result->fetch_assoc()){
            $dados["id_produtos"] = $row["id_produtos"];
            $dados["imgpq"] = $row["imgpq"];
            $dados["imggd"] = $row["imggd"];
            $dados["nome"] = $row["nome"];
            $dados["preco"] = $row["preco"];
            $dados["titulo_desc"] = $row["titulo_desc"];
            $dados["descri"] = $row["descri"];
            $dados["tipo_produto_macro"] = $row["tipo_produto_macro"];
            $dados["status"] = $row["status"];
        }
        $conn->close();
        return $dados;
    }else{
        $dados["result"] = 0;
        $conn->close();
        return $dados;
    }
}

function listProdVi($idProd, $conn){
    require_once "conexao.php";
    $sql = "SELECT * FROM produtos WHERE id_produtos = $idProd";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $dados = array();
        $dados["result"] = 1;
        while($row = $result->fetch_assoc()){
            $dados["id_produtos"] = $row["id_produtos"];
            $dados["imgpq"] = $row["imgpq"];
            $dados["imggd"] = $row["imggd"];
            $dados["nome"] = $row["nome"];
            $dados["preco"] = $row["preco"];
            $dados["titulo_desc"] = $row["titulo_desc"];
            $dados["descri"] = $row["descri"];
            $dados["tipo_produto_macro"] = $row["tipo_produto_macro"];
            $dados["status"] = $row["status"];
        }
        $conn->close();
        return $dados;
    }else{
        $dados["result"] = 0;
        $conn->close();
        return $dados;
    }
}

function prodEdit($dados){
    require_once "conexao.php";

    $sql = "UPDATE produtos set nome = '{$dados["nome"]}',preco = '{$dados["preco"]}',titulo_desc = '{$dados["titulo_desc"]}',descri = '{$dados["descri"]}',tipo_produto_macro = '{$dados["tipo_produto_macro"]}',status = {$dados["status"]} WHERE id_produtos = {$dados["idProd"]}";

    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

function prodExc($id_produtos){
    require_once "conexao.php";
    $sql = "DELETE FROM produtos WHERE id_produtos = {$id_produtos}";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}









//----------------------------CLIENTE---------------------------\\

function validarCliente($email,$senhaCriptografada){
    require 'conexao.php';
    $dados = array();
    $dados["result"] = 0;
    $sql = "SELECT * FROM cliente WHERE email = '{$email}' AND senha = '{$senhaCriptografada}' ";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $dados["result"] = 1;
            while($row = $result->fetch_assoc()){
            $dados["id_cliente"] = $row["id_cliente"];
            $dados["nome"] = $row["nome"];
            $dados["email"] = $row["email"];
            $dados["telefone"] = $row["telefone"];
            $dados["cpf"] = $row["cpf"];
            $dados["status"] = $row["status"];
            }
        $conn->close();
    }
    return $dados;
}

/*
function validaClienteSeJaExiste($nome ,$email, $senhaCriptografada, $cpf){
    require 'conexao.php';
    $confir = array();
    $confir["result"] = 0;
    $sql = "SELECT * FROM cliente WHERE nome = '{$nome}' AND email = '{$email}' AND senha = '{$senhaCriptografada}' AND cpf = '{$cpf}'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $confir["result"] = 1;
        $conn->close();
    } else {
        $confir["result"] = 0;
        $conn->close();
    }
    return $confir;
}
*/


function cliNew($dados){
    include 'conexao.php';
    $sql = "INSERT INTO cliente (nome,email,telefone,senha,cpf ,datahora, status) VALUES ('{$dados["nome"]}','{$dados["email"]}','{$dados["telefone"]}','{$dados["senha"]}','{$dados["cpf"]}', now(), 1)";
    $result =  $conn->query($sql);
    if($result == true){
        $conn->close();
        return 1;
    }else{
        $conn->close();
        return 0;
    }
}

function cliAtulizar($dados){
    include 'conexao.php';
    $sql = "UPDATE cliente SET nome = '{$dados['nome']}', email = '{$dados['email']}', cpf = '{$dados['cpf']}', telefone = '{$dados['telefone']}' WHERE id_cliente = '{$dados['idCli']}'";

    $result =  $conn->query($sql);
    if ($result->num_rows > 0) {
        $conn->close();
        return 1;
    } else {
        $conn->close();
        return 0;
    }
}

function validarClienteM($cpf, $email){   
   include 'conexao.php';
    $sql = "SELECT cpf, email FROM cliente where cpf = '$cpf' OR email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        return true; // erro
    } else {
        return false; // tudo bem
    }
}

/*
function atualizarSenhaCliEValidarCliente($senhaNCripto, $idCli, $cpf, $email) {
    include 'conexao.php';

    // Chamar a função validarClienteM para verificar se o cliente já existe
    $clienteExiste = validarClienteM($cpf, $email);

    // Se o cliente já existe, retornar um erro
    if ($clienteExiste) {
        $conn->close();
        return false; // Erro: Cliente já existe
    }

    // Atualizar a senha se o cliente não existir
    $updateSql = "UPDATE cliente SET senha = '$senhaNCripto' WHERE id_cliente = $idCli";
    $updateResult = $conn->query($updateSql);

    // Fechar a conexão
    $conn->close();

    // Verificar se a atualização foi bem-sucedida
    if ($updateResult === true) {
        return true; // Senha atualizada com sucesso
    } else {
        return false; // Falha na atualização da senha
    }
}


*/ 


function atualizandoSenhaCli($senhaNCripto, $idCli){
    include 'conexao.php';
    $sql = "UPDATE cliente SET senha = '$senhaNCripto' WHERE id_cliente = $idCli";
    $result = $conn->query($sql);

    if ($result == true) {
      
        return true; // Senha válida
    } else {

        return false; // Senha inválida
    }
}


function listaCli(){
    require_once "conexao.php";
    $sql = "SELECT * FROM cliente";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $num = $result->num_rows;
        $dados = array();
        $dados["result"] = 1;
        $dados["num"] = $num;
        $i = 1;
        while($row = $result->fetch_assoc()){
            $dados [$i]["id_cliente"] = $row["id_cliente"];
            $dados [$i]["nome"] = $row["nome"];
            $dados [$i]["email"] = $row["email"];
            $dados [$i]["telefone"] = $row["telefone"];
            $dados [$i]["cpf"] = $row["cpf"];
            $dados [$i]["datahora"] = $row["datahora"];
            $dados [$i]["status"] = $row["status"];
            $i++;
        }
        $conn->close();
        return $dados;
    }else{
        $dados["result"] = 0;
        $conn->close();
        return $dados;
    }
}

function pegaCli($id_cliente){
    require_once "conexao.php";
    $sql = "SELECT * FROM cliente WHERE id_cliente = {$id_cliente}";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $dados = array();
        $dados["result"] = 1;
        while($row = $result->fetch_assoc()){
            $dados["id_cliente"] = $row["id_cliente"];
            $dados["status"] = $row["status"];
        }
        $conn->close();
        return $dados;
    }else{
        $dados["result"] = 0;
        $conn->close();
        return $dados;
    }
}

function cliEdit($id_cliente, $status){
    require_once "conexao.php";
    $sql = "UPDATE cliente set status = $status WHERE id_cliente = $id_cliente";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

/*
$result = $conn->query($sql);
if($result == true){
    return 1;
} else {
    return 0;
}
*/







// ----------------------------------  LOGOTIPO ---------------------------------------------


function listaLogo(){
    //puxa as imagens
    require_once "conexao.php";
     $sql = "SELECT * FROM logotipo";
     $result = $conn->query($sql);
     if($result->num_rows > 0){
        $num = $result->num_rows;
        $dados = array();
        $dados["result"] = 1;
        $dados["num"] = $num;
        $i = 1;
         while($row = $result->fetch_assoc()){
                $dados [$i]["id"] = $row["id"];
                $dados [$i]["imgpq"] = $row["imgpq"];
                $dados [$i]["imggd"] = $row["imggd"];
                $dados [$i]["menu_logo"] = $row["menu_logo"];
                $dados [$i]["datahora"] = $row["datahora"];
                $dados [$i]["status"] = $row["status"];
                $i++;
            }
            $conn->close();
            return $dados;
    }else{
        $dados["result"] = 0;
        $conn->close();
        return $dados;
    }
   
}



function pegaLogo($id){
    require_once "conexao.php";
    $sql = "SELECT * FROM logotipo WHERE id = {$id}";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $dados = array();
        $dados["result"] = 1;
        while($row = $result->fetch_assoc()){
            $dados["id"] = $row["id"];
            $dados["imgpq"] = $row["imgpq"];
            $dados["imggd"] = $row["imggd"];
            $dados["menu_logo"] = $row["menu_logo"];
            $dados["status"] = $row["status"];
        }
        $conn->close();
        return $dados;
    }else{
        $dados["result"] = 0;
        $conn->close();
        return $dados;
    }
}

function salvarImgLogo($imgMicrotimePq, $imgMicrotimeGd, $status){
    // faz o upload das imagens no banco
    require_once "Conexao.php";
    $imgpq  = mysqli_real_escape_string($conn, $imgpq);
    $imggd  = mysqli_real_escape_string($conn, $imggd);
    $status = mysqli_real_escape_string($conn, $status);

    $sql = "insert into logotipo (imgpq, imggd, datahora, status) values ('$imgMicrotimePq', '$imgMicrotimeGd', now(), '$status')";
    $result = $conn->query($sql);
    if($result == true){
        return 1;
    } else {
        return 0;
    }
}

function salvarImgLogo2($imgMicrotimePq, $imgMicrotimeGd, $menu_logo, $status){
    // faz o upload das imagens no banco
    require_once "Conexao.php";
    $imgpq  = mysqli_real_escape_string($conn, $imgpq);
    $imggd  = mysqli_real_escape_string($conn, $imggd);
    $status = mysqli_real_escape_string($conn, $status);
    $menu_logo = mysqli_real_escape_string($conn, $menu_logo);

    $sql = "insert into logotipo (imgpq, imggd, menu_logo, datahora, status) values ('$imgMicrotimePq', '$imgMicrotimeGd','$menu_logo' ,now(), '$status')";
    $result = $conn->query($sql);
    if($result == true){
        return 1;
    } else {
        return 0;
    }
}



function logoEdit($dados){
    require_once "conexao.php";

    $sql = "UPDATE logotipo SET imgpq = '{$dados["imgpq"]}', imggd = '{$dados["imggd"]}', menu_logo = '{$dados["menu_logo"]}', status = '{$dados["status"]}' WHERE id = {$dados["id"]}";
    $result = $conn->query($sql);

    if ($result === TRUE) {
        $conn->close();
        return 1;
    } else {
        $conn->close();
        return 0;
    }
}




function logoExc($id){
    require_once "conexao.php";
    $sql = "DELETE FROM logotipo WHERE id = {$id}";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}









// ------------------------------------ MENU ----------------------------------------------


    

function listaMenu(){
    //puxa as imagens
    require_once "conexao.php";
     $sql = "SELECT * FROM menu";
     $result = $conn->query($sql);
     if($result->num_rows > 0){
        $num = $result->num_rows;
        $dados = array();
        $dados["result"] = 1;
        $dados["num"] = $num;
        $i = 1;
         while($row = $result->fetch_assoc()){
                $dados [$i]["id_menu"] = $row["id_menu"];
                $dados [$i]["nome_menu"] = $row["nome_menu"];
                $dados [$i]["datahora"] = $row["datahora"];
                $dados [$i]["status"] = $row["status"];
                $i++;
            }
            $conn->close();
            return $dados;
    }else{
        $dados["result"] = 0;
        $conn->close();
        return $dados;
    }
   
}



function menuNew($dados){
    require_once "conexao.php";
    $sql = "INSERT INTO menu (nome_menu,datahora,status) VALUES ('{$dados["nome_menu"]}',now(),'{$dados["status"]}')";
    $result =  $conn->query($sql);
    if($result == true){
        $conn->close();
        return 1;
    }else{
        $conn->close();
        return 0;
    }
}


function menuExc($id_menu) {
    require_once "conexao.php";
    
    $sql = "DELETE FROM submenu WHERE id_menu = {$id_menu}";
    $result1 = $conn->query($sql);
    
    $sql = "DELETE FROM menu WHERE id_menu = {$id_menu}";
    $result2 = $conn->query($sql);
    
    $conn->close();
    
    
    if ($result1 && $result2) {
        return true; 
    } else {
        return false; 
    }
}

function pegaMenu($id_menu){
    require_once "conexao.php";
    $sql = "SELECT * FROM menu WHERE id_menu = {$id_menu}";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $dados = array();
        $dados["result"] = 1;
        while($row = $result->fetch_assoc()){
            $dados["id_menu"] = $row["id_menu"];
            $dados["nome_menu"] = $row["nome_menu"];
            $dados["status"] = $row["status"];
        }
        $conn->close();
        return $dados;
    }else{
        $dados["result"] = 0;
        $conn->close();
        return $dados;
    }
}



function menuEdit($dados){
    require_once "conexao.php";
	$sql = "UPDATE menu SET id_menu = '{$dados["id_menu"]}', nome_menu = '{$dados["nome_menu"]}', status = '{$dados["status"]}'  WHERE id_menu = {$dados["id_menu"]}";
	$result =  $conn->query($sql);
    if($result == true){
        $conn->close();
        return 1;
    }else{
        $conn->close();
        return 0;
    }
}










// ------------------------------------ SUBMENU --------------------------------

function listaSubmenu(){
    //puxa as imagens
    require_once "conexao.php";
     $sql = "SELECT * FROM submenu";
     $result = $conn->query($sql);
     if($result->num_rows > 0){
        $num = $result->num_rows;
        $dados = array();
        $dados["result"] = 1;
        $dados["num"] = $num;
        $i = 1;
         while($row = $result->fetch_assoc()){
                $dados [$i]["id_submenu"] = $row["id_submenu"];
                $dados [$i]["nome_submenu"] = $row["nome_submenu"];
                $dados [$i]["datahora"] = $row["datahora"];
                $dados [$i]["status"] = $row["status"];
                $dados [$i]["id_menu"] = $row["id_menu"];
                $i++;
            }
            $conn->close();
            return $dados;
    }else{
        $dados["result"] = 0;
        $conn->close();
        return $dados;
    }
   
}

function consultarBanco($qry){
    $tabela = null;
    $conexao = mysqli_connect("localhost:3306","root","","tca2023");
    $resultado = mysqli_query($conexao,$qry);
    while($linha = mysqli_fetch_row($resultado)){
        $tabela[] = $linha;
    }
    return $tabela;
}

function consultarMenu(){
    $sql = "select * from menu";
    $tab = consultarBanco($sql);
    return $tab;
}

function consultarSubmenu(){
    $sql = "select * from submenu";
    $tab = consultarBanco($sql);
    return $tab;
}

function submenuNew($dados){
    require_once "conexao.php";
    $sql = "INSERT INTO submenu (nome_submenu,datahora,status,id_menu) VALUES ('{$dados["nome_submenu"]}',now(),'{$dados["status"]}','{$dados["id_menu"]}')";
    $result =  $conn->query($sql);
    if($result == true){
        $conn->close();
        return 1;
    }else{
        $conn->close();
        return 0;
    }
}

function pegaSubmenu($id_submenu){
    require_once "conexao.php";
    $sql = "SELECT * FROM submenu WHERE id_submenu = {$id_submenu}";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $dados = array();
        $dados["result"] = 1;
        while($row = $result->fetch_assoc()){
            $dados["id_submenu"] = $row["id_submenu"];
            $dados["nome_submenu"] = $row["nome_submenu"];
            $dados["status"] = $row["status"];
            $dados["id_menu"] = $row["id_menu"];
        }
        $conn->close();
        return $dados;
    }else{
        $dados["result"] = 0;
        $conn->close();
        return $dados;
    }
}


function submenuEdit($dados){
    
    require_once "conexao.php";
	$sql = "UPDATE submenu SET id_submenu = '{$dados["id_submenu"]}', nome_submenu = '{$dados["nome_submenu"]}', status = '{$dados["status"]}', id_menu = '{$dados["id_menu"]}'  WHERE id_submenu = {$dados["id_submenu"]}";
	$result =  $conn->query($sql);
    if($result == true){
        $conn->close();
        return 1;
    }else{
        $conn->close();
        return 0;
    }
	}


    function submenuExc($id_submenu){
        require_once "conexao.php";
        $sql = "DELETE FROM submenu WHERE id_submenu = {$id_submenu}";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }


    



    


    

    function listaCarrossel(){
        //puxa as imagens
        require_once "conexao.php";
         $sql = "SELECT * FROM carrossel";
         $result = $conn->query($sql);
         if($result->num_rows > 0){
            $num = $result->num_rows;
            $dados = array();
            $dados["result"] = 1;
            $dados["num"] = $num;
            $i = 1;
             while($row = $result->fetch_assoc()){
                    $dados [$i]["id_carrossel"] = $row["id_carrossel"];
                    $dados [$i]["imagem"] = $row["imagem"];
                    $dados [$i]["link"] = $row["link"];
                    $dados [$i]["datahora"] = $row["datahora"];
                    $dados [$i]["status"] = $row["status"];
                    $i++;
                }
                $conn->close();
                return $dados;
        }else{
            $dados["result"] = 0;
            $conn->close();
            return $dados;
        }
       
    }


    function pegaCarrossel($id_carrossel){
        require_once "conexao.php";
        $sql = "SELECT * FROM carrossel WHERE id_carrossel = {$id_carrossel}";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $dados = array();
            $dados["result"] = 1;
            while($row = $result->fetch_assoc()){
                $dados["imagem"] = $row["imagem"];
                $dados["link"] = $row["link"];
                $dados["status"] = $row["status"];
            }
            $conn->close();
            return $dados;
        }else{
            $dados["result"] = 0;
            $conn->close();
            return $dados;
        }
    }
    
    function salvarImgCarrossel($imgMicrotimeCarrossel, $link, $status){
        // faz o upload das imagens no banco
        require_once "Conexao.php";
        $imagem  = mysqli_real_escape_string($conn, $imagem);
        $link  = mysqli_real_escape_string($conn, $link);
        $status = mysqli_real_escape_string($conn, $status);
    
        $sql = "insert into carrossel (imagem, link, datahora, status) values ('$imgMicrotimeCarrossel', '$link', now(), '$status')";
        $result = $conn->query($sql);
        if($result == true){
            return 1;
        } else {
            return 0;
        }
    }



    function carrosselExc($id_carrossel){
        require_once "conexao.php";
        $sql = "DELETE FROM carrossel WHERE id_carrossel = {$id_carrossel}";
        $result = $conn->query($sql);
        $conn->close();
        return $result;
    }














 
    
    function consultarCliente(){
        $sql = "select * from cliente";
        $tab = consultarBanco($sql);
        return $tab;
    }
    
    function consultarEndereco(){
        $sql = "select * from endereco";
        $tab = consultarBanco($sql);
        return $tab;
    }

    function enderecoList($idCli){
        require_once "conexao.php";
        $sql = "SELECT * FROM endereco WHERE id_cliente = 2";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $num = $result->num_rows;
            $dados = array();
            $dados["result"] = 1;
            $dados["num"] = $num;
            $i = 1;
            while($row = $result->fetch_assoc()){
                $dados [$i]["id"] = $row["id"];
                $dados [$i]["id-cliente"] = $row["id_cliente"];
                $dados [$i]["pais"] = $row["pais"];
                $dados [$i]["cep"] = $row["cep"];
                $dados [$i]["endereco"] = $row["endereco"];
                $dados [$i]["numero"] = $row["numero"];
                $dados [$i]["datahora"] = $row["datahora"]; 
                $dados [$i]["status"] = $row["status"];
                $i++;
            }
            $conn->close();
            return $dados;
        }else{
            $dados["result"] = 0;
            $conn->close();
            return $dados;
        }
    }

    function listEndereco($idCli, $conn){
        include_once 'conexao.php';
        $sql = "SELECT * FROM endereco WHERE id_cliente = $idCli ";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $num = $result->num_rows;
            $dados = array();
            $dados["result"] = 1;
            $dados["num"] = $num;
            $i = 1;
            while($row = $result->fetch_assoc()){
                $dados [$i]["estado"] = $row["pais"];
                $dados [$i]["cep"] = $row["cep"];
                $dados [$i]["endereco"] = $row["endereco"];
                $dados [$i]["numero"] = $row["numero"];
                $i++;
            }
            return $dados;
        }else{
            $dados["result"] = 0;
            return $dados;
        }
    }

    function endeListar_Pedido($idCli, $conn){

        $sql = "SELECT * FROM endereco WHERE id_cliente = $idCli ";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $num = $result->num_rows;
            $dados = array();
            $dados["result"] = 1;
            $dados["num"] = $num;
            $i = 1;
            while($row = $result->fetch_assoc()){
                $dados [$i]["cep"] = $row["cep"];
                $dados [$i]["endereco"] = $row["endereco"];
                $dados [$i]["numero"] = $row["numero"];
               
                $i++;
            }
            return $dados;
        }else{
            $dados["result"] = 0;
            return $dados;
        }
    }
    function enderecoList_finalCompra($conn, $idCli){
        require_once "conexao.php";
        $sql = "SELECT * FROM endereco WHERE id_cliente = $idCli ";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            $num = $result->num_rows;
            $dados = array();
            $dados["result"] = 1;
            $dados["num"] = $num;
            $i = 1;
            while($row = $result->fetch_assoc()){
                $dados [$i]["id"] = $row["id"];
                $dados [$i]["id-cliente"] = $row["id_cliente"];
                $dados [$i]["pais"] = $row["pais"];
                $dados [$i]["cep"] = $row["cep"];
                $dados [$i]["endereco"] = $row["endereco"];
                $dados [$i]["numero"] = $row["numero"];
                $dados [$i]["datahora"] = $row["datahora"]; 
                $dados [$i]["status"] = $row["status"];
                $i++;
            }
            return $dados;
        }else{
            $dados["result"] = 0;
            return $dados;
        }
    }

    function enderecoNew($dados){
        require_once "conexao.php";
        $sql = "INSERT INTO endereco (id_cliente, pais, cep, endereco, numero, datahora, status) VALUES ('{$dados["id_cliente"]}', '{$dados["estado"]}', '{$dados["cep"]}', '{$dados["endereco"]}', '{$dados["numero"]}', now(), '{$dados["status"]}')";

        $result =  $conn->query($sql);
        if($result == true){
            $conn->close();    
            return 1;
        }else{
            $conn->close();    
            return 0;
        }
    }

    
    function enderecoUpd($dados){
        require_once "conexao.php";
        $sql = "UPDATE endereco SET pais = '{$dados["estado"]}', cep = '{$dados["cep"]}', endereco = '{$dados["endereco"]}', numero = '{$dados["numero"]}', datahora = NOW(), status = '{$dados["status"]}' WHERE id_cliente = '{$dados["id_cliente"]}'";

        $result =  $conn->query($sql);
        if($result == true){
        
            return 1;
        }else{
           
            return 0;
        }
    }




//eu odeio profundamente vcs, decidiram mudar tudo em cima da hora faltando 9 dias, vai se fude cada um de vcs 8=========================D

//------------------------ CARRINHO ------------------------ \\
function carrAdicionar($dados){
    require_once "conexao.php";
    $sql = "INSERT INTO carrinhos (id_cliente, id_produto, nome, preco, quantidade, total, datahora, status) VALUES ('{$dados["id_Cliente"]}' ,'{$dados["id"]}', '{$dados["nome"]}', '{$dados["preco"]}', '{$dados["quantidade"]}', '{$dados["total"]}', now() , '{$dados["status"]}')";


    $result =  $conn->query($sql);
    if($result == true){
        $conn->close();
        return $result = 1;
    }else{
        $conn->close();
        return $result = 0;
    }
}

function carrListar($idCli,$conn){
     $sql = "SELECT * FROM carrinhos WHERE id_cliente = $idCli AND status = 'No carrinho' ";
     $result = $conn->query($sql);
     if($result->num_rows > 0){
        $num = $result->num_rows;
        $dados = array();
        $dados["result"] = 1;
        $dados["num"] = $num;
        $i = 1;
         while($row = $result->fetch_assoc()){
                $dados [$i]["id-carrinho"] = $row["id_carrinho"];
                $dados [$i]["id-cliente"] = $row["id_cliente"];
                $dados [$i]["id-produto"] = $row["id_produto"];
                $dados [$i]["nome"] = $row["nome"];
                $dados [$i]["preco"] = $row["preco"];
                $dados [$i]["quantidade"] = $row["quantidade"];
                $dados [$i]["total"] = $row["total"]; 
                $dados [$i]["datahora"] = $row["datahora"];
                $dados [$i]["status"] = $row["status"];
                $i++;
            }
            return $dados;
    }else{
        $dados["result"] = 0;
        return $dados;
    }
}

function carrListar_finalCompra($conn,$idCli){
    require_once "conexao.php";
     $sql = "SELECT * FROM carrinhos WHERE id_cliente = $idCli AND status = 'No carrinho'";
     $result = $conn->query($sql);
     if($result->num_rows > 0){
        $num = $result->num_rows;
        $dados = array();
        $dados["result"] = 1;
        $dados["num"] = $num;
        $i = 1;
         while($row = $result->fetch_assoc()){
                $dados [$i]["id-carrinho"] = $row["id_carrinho"];
                $dados [$i]["id-cliente"] = $row["id_cliente"];
                $dados [$i]["id-produto"] = $row["id_produto"];
                $dados [$i]["nome"] = $row["nome"];
                $dados [$i]["preco"] = $row["preco"];
                $dados [$i]["quantidade"] = $row["quantidade"];
                $dados [$i]["total"] = $row["total"]; 
                $dados [$i]["datahora"] = $row["datahora"];
                $dados [$i]["status"] = $row["status"];
                $i++;
            }
            return $dados;
    }else{
        $dados["result"] = 0;
        return $dados;
    }
}

function carListar_Pedido($idCli, $conn){
    require_once "conexao.php";
    $sql = "SELECT * FROM carrinhos WHERE id_cliente = $idCli ";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
       $num = $result->num_rows;
       $dados = array();
       $dados["result"] = 1;
       $dados["num"] = $num;
       $i = 1;
        while($row = $result->fetch_assoc()){
               $dados [$i]["nome"] = $row["nome"];
               $dados [$i]["quantidade"] = $row["quantidade"];
               $dados [$i]["preco"] = $row["preco"];
               $i++;
           }
          
           return $dados;
   }else{
       $dados["result"] = 0;
      
       return $dados;
   }
}



function enserirPedidosEnde($idEnde, $idCli, $conn){
    $sql = "UPDATE pedidos SET id_endereco = $idEnde, pagamento = 'Pagamento Concluido', status = 'Item comprado' WHERE id_cliente = $idCli";
    $result = $conn->query($sql);
    
    return $result;
}

function pedidosListar($idCli, $conn){

     $sql = "SELECT * FROM pedidos WHERE id_cliente = $idCli ";
     $result = $conn->query($sql);
     if($result->num_rows > 0){
        $num = $result->num_rows;
        $dados2 = array();
        $dados2["result"] = 1;
        $dados2["num"] = $num;
        $i = 1;
         while($row = $result->fetch_assoc()){
                $dados2 [$i]["id-pedido"] = $row["id_pedido"];
                $dados2 [$i]["id-cliente"] = $row["id_cliente"];
                $dados2 [$i]["id-endereco"] = $row["id_endereco"];
                $dados2 [$i]["valor"] = $row["valor"];
                $dados2 [$i]["pagamento"] = $row["pagamento"];
                $dados2 [$i]["status"] = $row["status"];
                $dados2 [$i]["datahora"] = $row["datahora"]; 
                $i++;
            }
    
            return $dados2;
    }else{
        $dados2["result"] = 0;
        return $dados2;
    }
}

function delCarrinho($idProd, $idCli){
    require_once "conexao.php";
    $sql = "DELETE FROM carrinhos WHERE id_cliente = '$idCli' AND id_produto = '$idProd' ";

    $result = $conn->query($sql);
    return $result;
}

function editQuantidade($quantidade, $idCar, $idCli){
    require_once "conexao.php";
    $sql = "UPDATE carrinhos SET quantidade = $quantidade WHERE id_carrinho = $idCar AND id_cliente = $idCli";

    $result = $conn->query($sql);
    return $result;
    
}


function pedirCarrinhoSelect($conn, $idCli){
    require_once "conexao.php";
    $dados = array();
    $sql = "SELECT id_carrinho, total FROM carrinhos WHERE id_cliente = '$idCli'";
    $result = $conn->query($sql);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $dados[] = array(
                "id_carrinho" => $row['id_carrinho'],
                "total" => $row['total']
            );
        }
    }
    return $dados;
}

function enserirPedidos($idCli){
    require_once "conexao.php";
    $dados = array(); 
    $result = 1;

    $dadosCarrinho = pedirCarrinhoSelect($conn, $idCli);

    foreach ($dadosCarrinho as $carrinho){
        $sql = "INSERT INTO pedidos (id_cliente, valor, pagamento, status, datahora) VALUES ('$idCli', '{$carrinho["total"]}', 'Pagamento Pendente', 'Em Processamento', now())";
        $result = $conn->query($sql);
    }


    if ($result) {
        $dados["result"] = 1;
    } else {
        $dados["result"] = 0;
    }

    $conn -> close();
    return $dados;
}

function listaPedidos(){
   require_once "conexao.php";
   $sql = "SELECT * FROM pedidos";
   $result = $conn->query($sql);
   if($result->num_rows > 0){
      $num = $result->num_rows;
      $dados = array();
      $dados["result"] = 1;
      $dados["num"] = $num;
      $i = 1;
       while($row = $result->fetch_assoc()){
              $dados [$i]["id-pedido"] = $row["id_pedido"];
              $dados [$i]["id-cliente"] = $row["id_cliente"];
              $dados [$i]["id-endereco"] = $row["id_endereco"];
              $dados [$i]["valor"] = $row["valor"];
              $dados [$i]["pagamento"] = $row["pagamento"];
              $dados [$i]["status"] = $row["status"];
              $dados [$i]["datahora"] = $row["datahora"];
              $i++;
          }
          $conn->close();
          return $dados;
  }else{
      $dados["result"] = 0;
      $conn->close();
      return $dados;
  }
  
}
function delPedido($idCli){
    require_once "conexao.php";
    $sql = "DELETE FROM pedidos WHERE id_cliente = $idCli";

    $result = $conn->query($sql);
    return $result;
}
    
    /*
    $sql1 = "SELECT * FROM carrinhos WHERE id_cliente = '$idCli'";
    $result1 = $conn->query($sql1);
    if ($result1){
        while ($row = $result1->fetch_assoc()){
            $dados[$i]["id_carrinho"] = $row['id_carrinho'];
            $dados[$i]["total"] = $row['total'];

            // Insere os dados do carrinho na tabela Pedidos
            $sql2 = "INSERT INTO pedidos (id_cliente, id_endereco, id_carrinho, valor, pagamento, status, datahora) VALUES ('$idCli', '5', '{$dados[$i]["id_carrinho"]}', '{$dados[$i]["total"]}', 'Pagamento Pendente', 'Em Processamento', now())";
            $result2 = $conn->query($sql2);
           
            $i++;
        }
    }
    
    if($result1 == true && $result2 == true){
        $conn->close();
        $dados["result"] = 1;
        return $dados;
    }else{
        $conn->close();
        $dados["result"] = 0;
        return $dados;
    }
    
}
*/

function atualizarQuanti($quantidades, $idProds) {
    require_once "conexao.php";
    
    $successCount = 0;

    // Preparar a instrução SQL com um espaço reservado para o valor
    $sql = "UPDATE carrinhos SET quantidade = ? WHERE id_produto = ?";

    // Preparar a instrução
    $stmt = $conn->prepare($sql);

    // Verificar se a preparação foi bem-sucedida
    if ($stmt) {
        // Associar parâmetros e executar para cada par de quantidade e idProduto
        for ($i = 0; $i < count($quantidades); $i++) {
            $stmt->bind_param("ii", $quantidades[$i], $idProds[$i]);
            $stmt->execute();

            // Verificar se a atualização foi bem-sucedida
            if ($stmt->affected_rows > 0) {
                $successCount++;
            }
        }

        // Fechar a instrução
        $stmt->close();
    }

    return $successCount;
}


/*
function atualizarQuanti($quantidades, $idProds) {
    require_once "conexao.php";
    
    $successCount = 0;

    // Preparar a instrução SQL com um espaço reservado para o valor
    $sql = "UPDATE carrinhos SET quantidade = ? WHERE id_produto = ?";

    // Preparar a instrução
    $stmt = $conn->prepare($sql);

    // Verificar se a preparação foi bem-sucedida
    if ($stmt) {
        // Associar parâmetros e executar para cada par de quantidade e idProduto
        for ($i = 0; $i < count($quantidades); $i++) {
            $stmt->bind_param("ii", $quantidades[$i], $idProds[$i]);
            $stmt->execute();

            // Verificar se a atualização foi bem-sucedida
            if ($stmt->affected_rows > 0) {
                $successCount++;
            }
        }

        // Fechar a instrução
        $stmt->close();
    }

    return $successCount;
}
}
*/


// arrumar isso
function imgList($conn, $idProd) {
    require_once "conexao.php";
    $sql = "SELECT * FROM produtos WHERE id_produtos = $idProd ";
    $result = $conn->query($sql);

    $img = Array();
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $img["result"] = 1;
        $img["imgpq"] = $row["imgpq"];
    } else {
        $img["result"] = 0;
    }

    return $img;
}





function Pesquisar($pes){
    require_once "conexao.php";
    $sql = "SELECT * 
    FROM produtos 
    WHERE nome LIKE '%$pes%' 
    OR preco LIKE '%$pes%'
    OR titulo_desc LIKE '%$pes%'
    OR descri LIKE '%$pes%'
    OR tipo_produto_macro LIKE '%$pes%'
    OR SOUNDEX(nome) = SOUNDEX('$pes')
    OR SOUNDEX(preco) = SOUNDEX('$pes')
    OR SOUNDEX(titulo_desc) = SOUNDEX('$pes')
    OR SOUNDEX(descri) = SOUNDEX('$pes')
    OR SOUNDEX(tipo_produto_macro) = SOUNDEX('$pes')";
    
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        $num = $result->num_rows;
        $dados = array();
        $dados["result"] = 1;
        $dados["num"] = $num;
        $i = 1;
        while($row = $result->fetch_assoc()){
                $dados [$i]["id_produtos"] = $row["id_produtos"];
                $dados [$i]["nome"] = $row["nome"];
                $dados [$i]["preco"] = $row["preco"];
                $dados [$i]["titulo_desc"] = $row["titulo_desc"];
                $dados [$i]["descri"] = $row["descri"];
                $dados [$i]["tipo_produto_macro"] = $row["tipo_produto_macro"];
                $i++;
        }
        $conn->close();
        return $dados;
    } else {
        $dados["result"] = 0;
        $dados["num"] = 0;
        $conn->close();
        return $dados;
    }
}

function estoqueProd($nome){
    
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "tca2023";

    // Criando a conexão
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Checkando a conexao
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $dados = array(); 
    $result = 1;

    $sql = "INSERT INTO estoque (nome, quantidade, status ,datahora) VALUES ('$nome', 100, 1 ,now())";
    $result = $conn->query($sql);

    if ($result) {
        $dados["result"] = 1;
    } else {
        $dados["result"] = 0;
    }

    $conn -> close();
    return $dados;
}


function atualizarEstoque($produtos) {
    require_once "conexao.php";
    
    foreach ($produtos as $produto) {
        $nome = $produto['nome'];
        $quantidadeVendida = $produto['quantidade'];

        // Recupere a quantidade disponível no estoque
        $estoqueInfo = obterInfoEstoque($nome);

        if ($estoqueInfo['result'] == 1) {
            $quantidadeAtual = $estoqueInfo['quantidade_produto'];

            // Verifique se a quantidade no estoque é suficiente
            if ($quantidadeAtual >= $quantidadeVendida) {
                // Subtraia a quantidade vendida da quantidade disponível
                $novaQuantidade = $quantidadeAtual - $quantidadeVendida;

                // Atualize a quantidade no estoque
                $sqlUpdate = "UPDATE estoque SET quantidade = $novaQuantidade WHERE id_produto = $nome";
                $conn->query($sqlUpdate);
            } else {
                // Lidar com o caso em que a quantidade vendida é maior do que a disponível no estoque
                echo "Erro: A quantidade vendida é maior do que a disponível no estoque para o produto ID $nome.";
            }
        }
    }

    $conn->close();
}


function obterInfoEstoque($nome) {
    require_once "conexao.php";

    $sql = "SELECT * FROM estoque WHERE nome = $nome";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $info = array(
            'result' => 1,
            'quantidade_produto' => $row['quantidade_produto']
        );
    } else {
        $info = array('result' => 0);
    }

    $conn->close();
    return $info;
}

function apagarCar($idCli, $conn){
    //$sql = "DELETE FROM carrinhos WHERE id_cliente = $idCli";
    $sql = "UPDATE carrinhos SET status = 'Concluido' where id_cliente = $idCli ";
    $result = $conn->query($sql);

    if($result == true){
        return $result;
    } else {
        return $result;
    }
}
?>


