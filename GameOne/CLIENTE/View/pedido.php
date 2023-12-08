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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Pizza Etec</title>
    <link rel="stylesheet" href="../../css/style.css"> -->
    <link rel="icon" type="image/x-icon" sizes="32x32" href="../assets/favicon-16x16.png">
<link rel="icon" type="image/x-icon" sizes="16x16" href="../assets/favicon.icon">
</head>

<style>
    @import url('https://fonts.googleapis.com/css2?family=Corinthia&family=Inter:wght@100;200;300;400;500;600&family=Poppins:wght@100;200;300;400;500;600;700&display=swap'); 

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

</style>
<body>
<div class="card">
    <div class="card-details">
        <?php
        include_once "../../ADM/Model/manager.php";

        $dados = pedidosListar($idCli, $conn);
        $dados2 = carListar_Pedido($idCli, $conn);
        $dados3 = endeListar_Pedido($idCli, $conn);
        ?>
        <table class="" border="1">
            <tr>
                <th class=""> status Pedido: </th>
                <th class=""> Status pagamento: </th>

                <th class=""> Pedido: </th>
                <th class=""> Endereço: </th>

                <th class=""> nome: </th>
                <th class=""> Quantidade: </th>
                <th class=""> Total: </th>

            </tr>
            <?php
           if (isset($dados["num"]) && $dados["num"] > 0 &&
           isset($dados2["num"]) && $dados2["num"] > 0 &&
           isset($dados3["num"]) && $dados3["num"] > 0) {
                for ($i = 1; $i <= $dados["num"]; $i++) {
                    $total =  $dados2[$i]["preco"] * $dados2[$i]["quantidade"];

                    echo "<tr>";
                    echo "<td class=''>" . $dados[$i]["status"] . "</td>";
                    echo "<td class=''>" . $dados[$i]["pagamento"] . "</td>";

                    echo "<td class=''>" . $dados[$i]["id-pedido"] . "</td>";
                    echo "<td class=''>";

                    echo "Cep:" . $dados3[1]["cep"];
                    echo "<br> Endereço: " . $dados3[1]["endereco"];
                    echo "<br> Número: " . $dados3[1]["numero"];
                    echo "</td>";

                    echo "<td class=''>" . $dados2[$i]["nome"] . "</td>";
                    echo "<td class=''>" . $dados2[$i]["quantidade"] . "</td>";
                    echo "<td class=''>" . $total . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<br><br> Nenhum pedido localizado";
            }

           
            ?>


        </table>
    </div>
</div>


</body>
</html>
