<?php
if (!isset($_SESSION)) {
  session_start();
}

  // Verifica se o usuário não está logado
if (!isset($_SESSION['nome'])) {
  // Se não estiver logado, exibe uma mensagem e encerra o script
  include_once("../nao-logado/nao-logado.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre nós</title>

    <!-- Link para o CSS/Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Icon -->
    <link rel="shortcut icon" href="../Imagens-não-oficiais/logo.png" type="image/x-icon">

    <!-- Link para os icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- Link para o CSS -->
    <link rel="stylesheet" href="sobre-nos.css">
    
    <!-- Link para o header -->
    <link rel="stylesheet" href="../templates/header/header.css">

    <!-- Link para o footer -->
    <link rel="stylesheet" href="../templates/footer/footer.css">

</head>
<body>
    <?php
      include_once("../templates/header/header.php");
    ?>

  <br><br>
<!-- Sobre nós -->
<div class="container d-flex justify-content-center">
    <div class="card mb-3 border-0" style="max-width: 900px;"> <!-- Ajuste o valor de max-width conforme necessário -->
        <div class="row g-0">
            <div class="col-md-4 d-flex align-items-center">
                <img src="../Imagens-não-oficiais/logo.png" class="img-fluid rounded-start mx-auto my-4" alt="..."> <!-- Adicione a classe w-100 para tornar a imagem responsiva -->
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Sobre nós</h5>
                    <p class="card-text">A loja PIXEL PORTAL foi estabelecida no ano de 2015, e o site foi desenvolvido em 2020, com a proposta de atender a uma ampla variedade de preferências dentro do universo GEEK. Somos um grupo de seis empreendedores que almeja o reconhecimento internacional, comprometendo-se sempre a proporcionar confiança e segurança aos usuários que navegam em nosso site.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- _________________________________________________--- -->

<div class="container">
  <div class="row">
    <div class="col text-center">
      <h1 class="titulo">Integrantes</h1>
    </div>
  </div>
</div>

<br><br>

<div class="container d-flex justify-content-center align-items-center">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 imagens-marcas">
    <div class="col d-flex flex-column align-items-center">
      <div class="card h-100 border-0">
        <img src="../Imagens-não-oficiais/Integrantes/duda.jpg" class="card-img-top rounded-circle" alt="..." style="width: 230px; height: 230px; object-fit: cover;">
      </div>
      <p class="mt-2" style="font-size: 1.5rem; font-weight: bold;">Duda</p>
    </div>
    <div class="col d-flex flex-column align-items-center">
      <div class="card h-100 border-0">
        <img src="../Imagens-não-oficiais/Integrantes/richard.jpg" class="card-img-top rounded-circle" alt="..." style="width: 230px; height: 230px; object-fit: cover;">
      </div>
      <p class="mt-2" style="font-size: 1.5rem; font-weight: bold;">Richard</p>
    </div>
    <div class="col d-flex flex-column align-items-center">
      <div class="card h-100 border-0">
        <img src="../Imagens-não-oficiais/Integrantes/lucas.jpg" class="card-img-top rounded-circle" alt="..." style="width: 230px; height: 230px; object-fit: cover;">
      </div>
      <p class="mt-2" style="font-size: 1.5rem; font-weight: bold;">Lucas</p>
    </div>
    <div class="col d-flex flex-column align-items-center">
      <div class="card h-100 border-0">
        <img src="../Imagens-não-oficiais/Integrantes/rafa.jpg" class="card-img-top rounded-circle" alt="..." style="width: 240px; height: 240px; object-fit: cover;">
      </div>
      <p class="mt-2" style="font-size: 1.5rem; font-weight: bold;">Rafa</p>
    </div>
    <div class="col d-flex flex-column align-items-center">
      <div class="card h-100 border-0">
        <img src="../Imagens-não-oficiais/Integrantes/desgraça.jpg" class="card-img-top rounded-circle" alt="..." style="width: 240px; height: 240px; object-fit: cover;">
      </div>
      <p class="mt-2" style="font-size: 1.5rem; font-weight: bold;">Rafa 2</p>
    </div>
    <div class="col d-flex flex-column align-items-center">
      <div class="card h-100 border-0">
        <img src="../Imagens-não-oficiais/Integrantes/daniel.jpg" class="card-img-top rounded-circle" alt="..." style="width: 240px; height: 240px; object-fit: cover;">
      </div>
      <p class="mt-2" style="font-size: 1.5rem; font-weight: bold;">Daniel</p>
    </div>
  </div>
</div>

<br><br>

<a href="../Home/home-foda.php" class="d-flex justify-content-center align-items-center text-decoration-none">
  <button type="button" class="btn btn-secondary">Voltar</button>
</a>


    <?php
    include_once("../templates/footer/footer.php");
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>