<?php
if (isset($_POST["id-produto"])) {
    if($_POST["id-cliente"] == "falha"){
        ?>
            <form method="post" action="../../CLIENTE/acessar.php" id="form">
                <input type="hidden" value="FR28" name="msg">
            </form>

            <script>
                document.getElementById("form").submit();
            </script>
    <?php
    }
    if ($_POST["id-produto"] == "" ||$_POST["preco-produto"] == "" || $_POST["status-produto"] == "" || $_POST["quantidade-produto"] == "" || $_POST["nome-produto"] == "") {
        ?>
        
        <form method="post" action="../../CLIENTE/descricao.php?id_produtos=<?=$_POST["id-produto"];?> " id="form">
            <input type="hidden" value="FR28" name="msg">
        </form>

        <script>
            document.getElementById("form").submit();
        </script>
        porra
    <?php
    }

    $dados = array();

    $dados["id_Cliente"] = $_POST["id-cliente"];
    $dados["id"] = $_POST["id-produto"];
    $dados["nome"] = $_POST["nome-produto"];
    $dados["preco"] = floatval($_POST["preco-produto"]);
    $dados["quantidade"] = intval($_POST["quantidade-produto"]);
    $dados["total"] = $dados["preco"] * $dados["quantidade"];
    $dados["status"] = $_POST["status-produto"];
    
    include_once '../Model/manager.php';
    $result = carrAdicionar($dados);

    if ($result == 1) {
        ?>
        <form method="post" action="../../CLIENTE/descricao.php?id_produtos=<?=$dados["id"];?>" id="form">
            <input type="hidden" value="OP50" name="msg">
        </form>

        <script>
            document.getElementById("form").submit();
        </script>
    <?php
    } else {
        ?>
        <form method="post" action="../../CLIENTE/descricao.php?id_produtos=<?=$dados["id"];?>" id="form">
            <input type="hidden" value="FR01" name="msg">
        </form>

        <script>
            document.getElementById("form").submit();
        </script>
    <?php
    }
}


/*
if (isset($_POST["finalizar"])) {
    $idCli = $_POST["id-cliente"];
    
     
    include_once '../Model/manager.php';
    $result = enserirPedidos($idCli);
    
    if ($result != 1) {
            
        ?>
        <form method="post" action="../../CLIENTE/carinho.php" id="form">
            <input type="hidden" value="OP50" name="msg">
        </form>

        <script>
            document.getElementById("form").submit();
        </script>
            
    <?php
    } else {
           
        ?>
        <form method="post" action="../../CLIENTE/finalCompra.php" id="form">
            <input type="hidden" value="FR01" name="msg">
        </form>

        <script>
            document.getElementById("form").submit();
        </script>
    <?php
    }
    
} 
*/

if (isset($_POST["finalizar"])){
    $idCli = $_POST["id-cliente"];
    
    include_once "../Model/manager.php";
    $dados = enserirPedidos($idCli);

    if ($dados["result"] === 1){
        ?>
            <form method="post" action="../../CLIENTE/finalCompra.php" id="form">
            </form>

            <script>
                document.getElementById("form").submit();
            </script>
        <?php
    } else {
        ?>
        <form method="post" action="../../CLIENTE/carrinho.php" id="form">
            <input type="hidden" value="FR28" name="msg">
        </form>

        <script>
            document.getElementById("form").submit();
        </script>
    <?php
    }
} 


if (isset($_POST['produtos-carrinho_ERROR'])){
    ?>
        <form method="post" action="../../CLIENTE/login.php" id="form">
            <input type="hidden" value="FR28" name="msg">
        </form>

        <script>
            document.getElementById("form").submit();
        </script>
            
    <?php
}


if(isset($_POST["pagamento"])){
    if($_POST["endereco"] == ""){
        ?>
        <form method="post" action="../../CLIENTE/acessar.php" id="form">
            <input type="hidden" value="FR29" name="msg">
        </form>

        <script>
            document.getElementById("form").submit();
        </script>
            
    <?php
    } else {
        $idCli = $_POST["idCliente"];
        $endereco = $_POST["endereco"];
        $idCli = $_POST["idCliente"];
        $metodoPagamento = $_POST["metodoPagamento"];

        $endereco2 = $endereco;
        $partes = explode(',', $endereco2);
        $id = isset($partes[0]) ? $partes[0] : '';
        include_once "../Model/conexao.php";
        include_once "../Model/manager.php";
        $dados = enserirPedidosEnde($id, $idCli, $conn);

        if ($dados == true){
            ?>

            <form method="post" action="../../CLIENTE/finalizacao.php?metodoPagamento=<?=$metodoPagamento?>&ende=<?= $endereco?>" id="form">
            </form>

            <script>
                document.getElementById("form").submit();
            </script>
        
            <?php
        }

    }
}

if(isset($_POST["final"])){
    if(isset($_POST["id_ende"])){ //ja existe um endereço cadastrado
        $idEnde = $_POST["id_ende"];
        $idCli = $_POST["idcli"];

        include_once "../Model/conexao.php";
        include_once "../Model/manager.php";

        $dados = enserirPedidosEnde($idEnde, $idCli, $conn);
        $dados2 = apagarCar($idCli, $conn);
        if ($dados == true || $dados2 == true){
            ?>

                <form method="post" action="../../CLIENTE/finalizacao.php" id="form">
                    <input type="hidden" value="OP50" name="msg">
                </form>

                <script>
                    document.getElementById("form").submit();
                </script>
            <?php
            $conn->close();
        } 
        
        
    } else { // não existe um endereço, então precisa cria-lo
        $dados = Array();
        $dados["id_cliente"] = $_POST["idcli"];
        $dados["estado"] = $_POST["id_estado"];
        $dados["endereco"] = $_POST["endereco"];
        $dados["cep"] = $_POST["cep"];
        $dados["numero"] = $_POST["numero"];
        $dados["status"] = "Ativo";

        include_once "../Model/conexao.php";
        include_once "../Model/manager.php";

        $result = enderecoNew($dados);

        if($result == 1){
            ?>
                <form method="post" action="../../CLIENTE/finalizacao.php" id="form">
                    <input type="hidden" value="OP50" name="msg">
                </form>

                <script>
                    document.getElementById("form").submit();
                </script>
            <?php
        } else {
            ?>
            <form method="post" action="../../CLIENTE/finalCompra.php" id="form">
                <input type="hidden" value="FR02" name="msg">
            </form>

            <script>
                document.getElementById("form").submit();
            </script>
        <?php
        }
    }

    
}

if(isset($_POST["delPedidoVolta"])){
    $idCli = $_POST["idcliente"];

    include_once "../Model/manager.php";
    $dados = delPedido($idCli);

    if($dados == true){
        header("Location: ../../CLIENTE/carrinho.php");
    } else {
        echo "Burro";
    }
}

if(isset($_POST["delItem"])){
    $idCli = $_POST["idC"];
    $idProd = $_POST["idP"];

    

    include_once "../Model/manager.php";
    $dados = delCarrinho($idProd, $idCli);

    if ($dados == true){
        ?>
           <form method="post" action="../../CLIENTE/carrinho.php" id="form">
                <input type="hidden" value="OP50" name="msg">
            </form>

            <script>
                document.getElementById("form").submit();
            </script>
            <?php
        } else {
        ?>
            <form method="post" action="../../CLIENTE/carrinho.php" id="form">
                <input type="hidden" value="OP01" name="msg">
            </form>

            <script>
                document.getElementById("form").submit();
            </script>
        <?php
        }

}

if(isset($_POST["atualizarQuantidade"])){
    $quantidade = $_POST["id_quantidade"];
    $idCar = $_POST["idCar"];
    $idCli = $_POST["idCli"];

    include_once "../Model/manager.php";
    $dados = editQuantidade($quantidade, $idCar, $idCli);

    if ($dados == true){
        ?>
           <form method="post" action="../../CLIENTE/carrinho.php" id="form">
                <input type="hidden" value="OP50" name="msg">
            </form>

            <script>
                document.getElementById("form").submit();
            </script>
            <?php
        } else {
        ?>
            <form method="post" action="../../CLIENTE/carrinho.php" id="form">
                <input type="hidden" value="OP01" name="msg">
            </form>

            <script>
                document.getElementById("form").submit();
            </script>
        <?php
        }

}
?>
