<?php
	session_start();
	include_once 'head.html';
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Carrinho de Compras</title>
  <link rel="stylesheet" href="styles.css">
  <link rel="icon" type="image/x-icon" sizes="32x32" href="../assets/favicon-16x16.png">
<link rel="icon" type="image/x-icon" sizes="16x16" href="../assets/favicon.icon">
</head>

<style>
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

  <div id="page">
    <!-- Navegação -->
    <nav class="colorlib-nav" role="navigation">
      <div class="top-menu">
        <div class="container">
          <div class="row">
            <div class="col-xs-2">
              <div id="colorlib-logo"><img src="logo.png" alt="Logo"></div>
            </div>
            <div class="col-xs-10 text-right menu-1">
              <ul>
                <li><a href="shop.php">Home</a></li>
                <li><a href="shop.php">Produtos</a></li>
                <li class="active"><a href="cart.php"><i class="icon-shopping-cart"></i> Carrinho </a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </nav>
    
    <!-- Cabeçalho -->
    <aside id="colorlib-hero" class="breadcrumbs">
      <div class="flexslider">
        <ul class="slides">
          <li style="background-image: url(images/3.jpg);">
            <div class="overlay"></div>
            <div class="container-fluid">
              <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
                  <div class="slider-text-inner text-center">
                    <h1>Carrinho de compras</h1>
                    <h2 class="bread"><span><a href="shop.php">Home</a></span><span>Carrinho de compras</span></h2>
                  </div>
                </div>
              </div>
            </div>
          </li>
        </ul>
      </div>
    </aside>

    <!-- Conteúdo do Carrinho -->
    <div class="colorlib-shop">
      <div class="container">
        <!-- Seu código existente para process-wrap e product-name -->
        <div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Carrinho de compras</h3>
							</div>
							<div class="process text-center">
								<p><span>02</span></p>
								<h3> Pagamento </h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Finalizado</h3>
							</div>
						</div>
					</div>
				</div>

        <div class="row row-pb-md">
          <div class="col-md-10 col-md-offset-1">
            <div class="product-name">
              <div class="one-forth text-center">
                <span>Detalhes dos produtos</span>
              </div>
              <div class="one-eight text-center">
                <span>Preço</span>
              </div>
              <div class="one-eight text-center">
                <span>Quantidade</span>
              </div>
              <div class="one-eight text-center">
                <span>Total</span>
              </div>
              <div class="one-eight text-center">
                <span>Remover</span>
              </div>
            </div>

            <!-- Exemplo de entrada de produto (substitua com seu loop PHP) -->
            <div class="product-cart">
              <div class="one-forth">
                <div class="product-img" style="background-image: url(images/example.jpg);"></div>
                <div class="display-tc">
                  <h3 id="nome">Nome do Produto</h3>
                </div>
              </div>
              <div class="one-eight text-center">
                <div class="display-tc">
                  <span class="price" for="id_valor" id="id_valor">R$ 19.99</span>
                </div>
              </div>
              <div class="one-eight text-center">
                <div class="display-tc">
                  <form method="post" action="../App/Controller/updateQtd.php">
                    <input type="number" for="id_quantidade" name="id_quantidade" id="id_quantidade" class="form-control  input-number text-center" value="1" min="1" max="100">
                    <input style="visibility: hidden; width:2%;height:2%;" type="number" name="idproduto" value="1"> <br>
                    <button class="btn btn-primary">alterar</button>
                  </form>
                </div>
              </div>
              <div class="one-eight text-center">
                <div class="display-tc">
                  <span for="id_total" class="price" id="id_total" name="id_total">R$ 19.99</span>
                </div>
              </div>
              <div class="one-eight text-center">
                <div class="display-tc">
                  <a href="../App/Controller/delete.php?produto=1" class="closed" style="background-color: #FFC300"></a>
                </div>
              </div>
            </div>
            <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="total-wrap">
        <div class="row">
          <div class="col-md-8">
            <form action="#">
              <div class="row form-group">
                <!-- Adicione campos do formulário, se necessário -->
              </div>
            </form>
          </div>
          <div class="col-md-3 col-md-push-1 text-center">
            <div class="total">
              <div class="grand-total">
                <p><span><strong>Total:</strong></span> <span>R$ 99,99</span></p> <!-- Substitua pelo seu valor total -->
              </div>
            </div>
            <p><a class="btn btn-primary" href="checkoutUm.php" style="opacity: 0.5; filter: alpha(opacity=50)" disabled> Próximo </a></p>
            <!-- Ou use o seguinte para o botão habilitado -->
            <!-- <p><a href="checkout.php?proximo=true&carrinho=true" class="btn btn-primary"> Próximo </a></p> -->
          </div>
        </div>
      </div>
    </div>
  </div>

          </div>
        </div>

        <!-- Seu código existente para total-wrap -->

      </div>
    </div>

    <!-- Seu código existente para rodapé e gototop -->

  </div>

</body>
</html>
