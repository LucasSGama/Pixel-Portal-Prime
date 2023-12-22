<?php

if(!isset($_SESSION)) {
  session_start();
}

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Link para o CSS/Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Icon -->
    <link rel="shortcut icon" href="../Imagens-não-oficiais/logo.png" type="image/x-icon">

    <!-- Link para os icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- Link para o CSS -->
    <link rel="stylesheet" href="home-foda.css">

    <!-- Link para o header -->
    <link rel="stylesheet" href="../templates/header.css">

    <!-- Link para o footer -->
    <link rel="stylesheet" href="../templates/footer.css">

    <style>
        /* Estilize seu pop-up aqui */
        #popup {
            display: none;
            position: fixed;
            width: 350px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            z-index: 999;
        }
        .botao {
          width: 100px;
          border-radius: 10px;
          position: relative;
        }
        .parte-baixo {
          display: flex;
        }

        #verMaisBtn {
            opacity: 0.8; /* Define a opacidade para tornar o botão meio transparente */
            font-weight: bold; /* Torna a letra mais grossa */
        }

        .ocultar-conteudo {
            display: none;
        }
    </style>

  </head>
<body>
    <?php
      include_once("../templates/header.php");
    ?>

<div id="popup">
    <!-- Conteúdo do pop-up -->
    <?php if(isset($_SESSION['nome'])): ?>
    <p>Bem vindo de volta, <?php echo $_SESSION['nome']; ?>!!</p>
    <?php endif; ?>
    <div class="parte-baixo">
    <p>🤓🤓🤓🤓🤓🤓🤓🤓🤓</p>
    <button class="botao" onclick="fecharPopup()">Fechar</button>
    </div>
</div>
     <!-- Carrossel -->

     <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="2000">
            <img src="../Imagens-não-oficiais/Banners/image.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="../Imagens-não-oficiais/Banners/a bridal shower (1).png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="../Imagens-não-oficiais/Banners/promoção3.jpeg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Próximo</span>
        </button>
      </div>
      <!-- ;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;; -->

      <h1 class="titulo">NOVIDADES DO MÊS DE DEZEMBRO!</h1>
      <div class="row row-cols-1 row-cols-md-4 g-4 items-novidades">
        <div class="col">
          <div class="card">
            <img src="../Imagens-não-oficiais/Camisas/Camisas-chapolim/chapolim.png" class="card-img-top" id="chapolim" alt="camisa-chapolin" height="350px" width="200px" onmouseover="changeChapolim()" onmouseout="restoreChapolim()">
            <div class="card-body">
              <h5 class="card-title">CAMISETA CHAPOLIM</h5>
              <p class="card-text">R$ 69,90</p>
              <a href="../Compras/compras-chapolim.php"><button type="button" class="btn btn-outline-success btn-lg">Comprar</button></a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="../Imagens-não-oficiais/Camisas/Camisas-DC/camisa-dc1.png" class="card-img-top" id="camisa-dc" alt="camisa-dc" height="350px" width="200px" onmouseover="changeDC()" onmouseout="restoreDC()">
            <div class="card-body">
              <h5 class="card-title">CAMISETA DC</h5>
              <p class="card-text">R$ 69,90</p>
              <a href="../Compras/compras-DC.php"><button type="button" class="btn btn-outline-success btn-lg">Comprar</button></a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="../Imagens-não-oficiais/Camisas/Camisas-Marvel/camisa-marvel1.png" class="card-img-top" id="camisa-marvel" alt="camisa-marvel" height="350px" width="200px" onmouseover="changeMarvel()" onmouseout="restoreMarvel()">
            <div class="card-body">
              <h5 class="card-title">CAMISETA MARVEL</h5>
              <p class="card-text">R$ 69,90</p>
              <a href="../Compras/compras-marvel.php"><button type="button" class="btn btn-outline-success btn-lg">Comprar</button></a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="../Imagens-não-oficiais/Camisas/Camisas-StarWars/camisa-starwars1.png" class="card-img-top" id="camisa-star-wars" alt="Star Wars" height="350px" width="200px" onmouseover="changeStarWars()" onmouseout="restoreStarWars()">
            <div class="card-body">
              <h5 class="card-title">CAMISETA STAR WARS</h5>
              <p class="card-text">R$ 69,90</p>
              <a href="../Compras/compras-starwars.php"><button type="button" class="btn btn-outline-success btn-lg">Comprar</button></a>
            </div>
          </div>
        </div>
      </div>

      <H1 class="titulo">TEMAS</H1>

      <div class="row row-cols-1 row-cols-md-4 g-4 imagens-marcas">
        <div class="col harry_potter">
          <a href="#" class="text-decoration-none">
          <div class="card h-100 border-0">
            <img src="../Imagens-não-oficiais/Marcas/harry-potter.jpeg" class="card-img-top rounded-circle" alt="..." style="width: 230px; height: 230px; object-fit: cover;">
          </div>
        </a>
        </div>
        <div class="col">
          <a href="#" class="text-decoration-none">
          <div class="card h-100 border-0">
            <img src="../Imagens-não-oficiais/Marcas/marvel.jpg" class="card-img-top rounded-circle" alt="..." style="width: 230px; height: 230px; object-fit: cover;">
          </div>
        </a>
        </div>
        <div class="col">
          <a href="#" class="text-decoration-none">
          <div class="card h-100 border-0">
            <img src="../Imagens-não-oficiais/Marcas/disney.png" class="card-img-top rounded-circle" alt="..." style="width: 230px; height: 230px; object-fit: cover;">
          </div>
        </a>
        </div>
        <div class="col">
          <a href="#" class="text-decoration-none">
          <div class="card h-100 border-0">
            <img src="../Imagens-não-oficiais/Marcas/dc.png" class="card-img-top rounded-circle" alt="..." style="width: 240px; height: 240px; object-fit: cover;">
          </div>
        </a>
        </div>
      </div>

      <br>
      <div class="container text-center">
        <!-- Botão "Ver Mais" -->
        <button class="btn btn-outline-primary" id="verMaisBtn">Mostrar Mais</button>
    </div>
    <br>

    <div class="row row-cols-1 row-cols-md-4 g-4 imagens-marcas ocultar-conteudo">
        <div class="col harry_potter">
          <a href="#" class="text-decoration-none">
          <div class="card h-100 border-0">
            <img src="../Imagens-não-oficiais/Marcas/harry-potter.jpeg" class="card-img-top rounded-circle" alt="..." style="width: 230px; height: 230px; object-fit: cover;">
          </div>
        </a>
        </div>
        <div class="col">
          <a href="#" class="text-decoration-none">
          <div class="card h-100 border-0">
            <img src="../Imagens-não-oficiais/Marcas/marvel.jpg" class="card-img-top rounded-circle" alt="..." style="width: 230px; height: 230px; object-fit: cover;">
          </div>
        </a>
        </div>
        <div class="col">
          <a href="#" class="text-decoration-none">
          <div class="card h-100 border-0">
            <img src="../Imagens-não-oficiais/Marcas/disney.png" class="card-img-top rounded-circle" alt="..." style="width: 230px; height: 230px; object-fit: cover;">
          </div>
        </a>
        </div>
        <div class="col">
          <a href="#" class="text-decoration-none">
          <div class="card h-100 border-0">
            <img src="../Imagens-não-oficiais/Marcas/dc.png" class="card-img-top rounded-circle" alt="..." style="width: 240px; height: 240px; object-fit: cover;">
          </div>
        </a>
        </div>
      </div>

<?php
  include_once("../templates/footer.php");
?>



</body>
<script>
    // Função para abrir o pop-up automaticamente
    window.onload = function() {
        abrirPopup();
    };

    // Função para abrir o pop-up
    function abrirPopup() {
        document.getElementById('popup').style.display = 'block';
    }

    // Função para fechar o pop-up
    function fecharPopup() {
        document.getElementById('popup').style.display = 'none';
    }
</script>
<script src="home-foda.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>