<?php
    session_start();
    if(!isset($_SESSION["id-Cliente"])   ||  ($_SESSION["id-Cliente"] == "")){
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
    $nomeCli = $_SESSION["nome-Cliente"];
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

    $dados =  enderecoList($idCli);
    
    ?>
      <table class="" border="1">
      <tr>
          <th class=""> id </th>
          <th class=""> Nome do Cliente  </th>
          <th class=""> estado </th>
          <th class=""> cep </th>
          <th class=""> endereço </th>
          <th class=""> numero </th>
          <th class=""> datahora </th>
          <th class=""> status </th>
          <th class="">  </th>
          
      </tr>
      <?php
        if(isset($dados["num"])){
            for($i = 1;$i <= $dados["num"]; $i++){
                
                echo "<tr>";
                echo "<td class=''>". $dados[$i]["id"] . "</td>";
                echo "<td class=''>". $nomeCli . "</td>";
                echo "<td class=''>". $dados[$i]["pais"] . "</td>";
                echo "<td class=''>". $dados[$i]["cep"] . "</td>";
                echo "<td class=''>". $dados[$i]["endereco"] . "</td>";
                echo "<td class=''>". $dados[$i]["numero"] . "</td>";
                echo "<td class=''>". $dados[$i]["datahora"] . "</td>";
                echo "<td class=''>". $dados[$i]["status"] . "</td>";
                echo "<td>";
                    ?>
                        <button onclick="window.location.href='enderecoUpd.php'"> Atualizar </button>
                    <?php
                echo"</td>";
                
                echo "</tr>";
            }
        } else {
            echo "<br><br> Nenhum endereço cadastrado <br>";
            ?>
                <a href="enderecoNew.php"> Cadastre um endereço </a>
            <?php
        }
      ?>
  </table> 

  </div>
</div>


<!--
<a href="enderecoNew.php" target="screen" class="linkMenu">Adicionar Endereço</a><br><br>
    -->
</body>
</html>