<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BootStrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Style.css -->
    <!-- <link rel="stylesheet" href="perfil.css"> -->
    <link rel="stylesheet" href="perfil-foda.css">
    <!-- Link para o header -->
    <link rel="stylesheet" href="../templates/header.css">

    <!-- Link para o footer -->
    <link rel="stylesheet" href="../templates/footer.css">
    
    <link rel="shortcut icon" href="imgs/icon.png" type="image/x-icon">
    <title>Conta</title>
</head>
<body>
    <!-- Header -->
    <?php
      include_once("../templates/header.php");
    ?>
    <!-- ______________________________-->
    <!-- Body -->
    <form action="perfil.php" method="post">
    <div class="container">
        <h1 class="mb-4">INFORMAÇÕES DO PERFIL</h1>
        <div class="row">
            <div class="col-md-6 esquerda-meio-container">
                <h3>FOTO DE PERFIL</h3>
                <img src="../Imagens-não-oficiais/fabricio.png" alt="fabricio" class="img-fluid">
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" class="form-control">
                </div>
            </div>
        </div>
        <div class="row mt-4 baixo-conteiner">
            <h3>Informações adicionais:</h3>
            <div class="col-md-4 genero">
                <label for="genero" class="form-label">Genêro:</label>
                <br>
                <input type="radio" class="form-check-input" id="masculino" name="genero"> Masculino
                <br>
                <input type="radio" class="form-check-input" id="feminino" name="genero"> feminino
                <br>
                <input type="radio" class="form-check-input" id="outro" name="genero"> Outro
            </div>
            <div class="col-md-4 localizacao">
                <label for="">Localização</label>
                <br>
                <input type="text" placeholder="Insira seu endereço:">
                <br>
                <label for="">CEP:</label>
                <br>
                <input type="number" placeholder="Insira seu CEP">
            </div>
            <div class="col-md-4 data-de-nascimento">
                <label for="data-de-nascimento">Data de Nascimento:</label>
                <br>
                <input type="date" name="dataNas" id="dataNas">
            </div>
        </div>
        <button type="button" class="btn btn-success salvar">Salvar</button>
    </div>
</form>

    <!-- footer -->  
    <?php
    include_once("../templates/footer.php");
    ?>
    <!-- _____________________ -->
    <!-- BootStrap - Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>