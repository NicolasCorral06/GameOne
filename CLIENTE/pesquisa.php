<?php

include_once '../ADM/Model/manager.php';
$pes = $_GET["pesquisa"];

$dados = Pesquisar($pes);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" sizes="32x32" href="../assets/favicon-16x16.png">
<link rel="icon" type="image/x-icon" sizes="16x16" href="../assets/favicon.icon">
</head>
<body>
    

    <?php

     if ($dados["num"] > 0) {
        echo "Itens encontrados:" . $dados["num"] . "<br><br>";
        // Loop pelos resultados e exibição
        for ($i = 1; $i <= $dados["num"]; $i++) {
            echo "<div>";
            //echo "<b>ID:</b>" . $dados[$i]["id_produtos"] . "<br>";
            echo "<b>Nome:</b> " . $dados[$i]["nome"] . "<br>";
            echo "<b>Preço:</b> " . $dados[$i]["preco"] . "<br>";
            echo "<b>Descrição:</b> " . $dados[$i]["descri"] . "<br>";
            echo "<b>Empresa:</b> " . $dados[$i]["tipo_produto_macro"] . "<br>";
            echo "</div><br>";
            echo "<hr>";
        }
    } else {
        echo "Nenhum resultado encontrado.";
    }
    ?>

</body>
</html>