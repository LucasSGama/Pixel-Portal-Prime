<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <!-- Link para o CSS/Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Link para os icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- Link para o CSS -->
    <link rel="stylesheet" href="Home/home-foda.css">

    <!-- Link para o header -->
    <link rel="stylesheet" href="templates/header.css">

    <!-- Link para o footer -->
    <link rel="stylesheet" href="templates/footer.css">
</head>
<body>
    <?php
      include_once("templates/header.php");
    ?>

     <!-- Carrossel -->

     <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="2000">
            <img src="Imagens-não-oficiais/image.png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="Imagens-não-oficiais/a bridal shower (1).png" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item" data-bs-interval="2000">
            <img src="Imagens-não-oficiais/promoção3.jpeg" class="d-block w-100" alt="...">
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
            <img src="Imagens-não-oficiais/chapolim.png" class="card-img-top" id="chapolim" alt="camisa-chapolin" height="350px" width="200px" onmouseover="changeChapolim()" onmouseout="restoreChapolim()">
            <div class="card-body">
              <h5 class="card-title">CAMISETA ART HISTORY</h5>
              <p class="card-text">R$ 69,90</p>
              <a href=""><button type="button" class="btn btn-outline-success btn-lg">Comprar</button></a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="Imagens-não-oficiais/camisa-dc.png" class="card-img-top" id="camisa-dc" alt="camisa-dc" height="350px" width="200px" onmouseover="changeDC()" onmouseout="restoreDC()">
            <div class="card-body">
              <h5 class="card-title">CAMISETA TOLKIEN</h5>
              <p class="card-text">R$ 69,90</p>
              <a href=""><button type="button" class="btn btn-outline-success btn-lg">Comprar</button></a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="Imagens-não-oficiais/marvel.png" class="card-img-top" id="camisa-marvel" alt="camisa-marvel" height="350px" width="200px" onmouseover="changeMarvel()" onmouseout="restoreMarvel()">
            <div class="card-body">
              <h5 class="card-title">CAMISETA PARANOID</h5>
              <p class="card-text">R$ 69,90</p>
              <a href=""><button type="button" class="btn btn-outline-success btn-lg">Comprar</button></a>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <img src="Imagens-não-oficiais/starwars.png" class="card-img-top" id="camisa-star-wars" alt="Star Wars" height="350px" width="200px" onmouseover="changeStarWars()" onmouseout="restoreStarWars()">
            <div class="card-body">
              <h5 class="card-title">CAMISETA FOLLOW YOUR</h5>
              <p class="card-text">R$ 69,90</p>
              <a href=""><button type="button" class="btn btn-outline-success btn-lg">Comprar</button></a>
            </div>
          </div>
        </div>
      </div>

      <H1 class="titulo">TEMAS</H1>

      <div class="row row-cols-1 row-cols-md-4 g-4 imagens-marcas">
        <div class="col">
          <a href="#" class="text-decoration-none">
          <div class="card h-100 border-0">
            <img src="Imagens-não-oficiais/harry-potter.jpeg" class="card-img-top rounded-circle" alt="..." style="width: 230px; height: 230px; object-fit: cover;">
          </div>
        </a>
        </div>
        <div class="col">
          <a href="#" class="text-decoration-none">
          <div class="card h-100 border-0">
            <img src="Imagens-não-oficiais/marvel.jpg" class="card-img-top rounded-circle" alt="..." style="width: 230px; height: 230px; object-fit: cover;">
          </div>
        </a>
        </div>
        <div class="col">
          <a href="#" class="text-decoration-none">
          <div class="card h-100 border-0">
            <img src="Imagens-não-oficiais/disney.png" class="card-img-top rounded-circle" alt="..." style="width: 230px; height: 230px; object-fit: cover;">
          </div>
        </a>
        </div>
        <div class="col">
          <a href="#" class="text-decoration-none">
          <div class="card h-100 border-0">
            <img src="Imagens-não-oficiais/dc.png" class="card-img-top rounded-circle" alt="..." style="width: 240px; height: 240px; object-fit: cover;">
          </div>
        </a>
        </div>
      </div>

<?php
  include_once("templates/footer.php");
?>



</body>
<script src="Home/home-foda.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</html>