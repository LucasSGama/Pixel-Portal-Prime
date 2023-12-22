<?php

if(!isset($_SESSION)) {
  session_start();
}


include_once('../Base/conexao.php');

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera o comentario do formulário
    $comentario = $_POST['comentario'];

    // Recupera o usuario_id da sessão (certifique-se de definir isso ao autenticar o usuário)
    $usuario_id = $_SESSION['usuario_id'];

    // Insere o comentario no banco de dados
    $sql = "INSERT INTO comentarios (comentario, usuario_id) VALUES ('$comentario', $usuario_id)";

    if (mysqli_query($mysqli, $sql)) {
        // echo "Comentário enviado com sucesso!";
    } else {
        // echo "Erro ao enviar o comentário: " . mysqli_error($conexao);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comunidade</title>

    <!-- Link para o CSS/Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Icon -->
    <link rel="shortcut icon" href="../Imagens-não-oficiais/logo.png" type="image/x-icon">

    <!-- Link para os icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    
    <!-- Link para o header -->
    <link rel="stylesheet" href="../templates/header.css">

    <!-- Link para o footer -->
    <link rel="stylesheet" href="../templates/footer.css">

    <!-- Link para o css -->
    <link rel="stylesheet" href="comunidade.css">

</head>
<body>
    <?php
      include_once("../templates/header.php");
    ?>

<a href="../Home/home-foda.php"><button type="button" class="btn btn-secondary">Voltar</button></a>

<br>
            <h1 class="text-center">COMUNIDADE</h1>
            <div class="d-flex justify-content-around p-3">
                <h6>Comentários:</h6>
                <button class="btn btn-outline-primary" id="CriarBTN">Criar comentário</button>
            </div>

            <br>
            <br>

            <div class="container text-center ocultar-conteudo">
                <form action="comunidade.php" method="POST">
                    <h3>Digite seu comentário:</h3>
                    <textarea name="comentario" id="comentario" cols="30" rows="10" maxlength="255" placeholder="Digite seu comentario..."></textarea>
                    <br>
                        <div class="botoes">
                            <button type="button" class="btn btn-secondary" id="CancelarBTN">Cancelar</button>
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </div>
                </form>
            </div>

            <div class="fabricio row mt-3">
                <div class="col-md-3">
                <img src="../Imagens-não-oficiais/foto-de-perfil-default.jpg" class="card-img-top rounded-circle" alt="..." style="width: 200px; height: 200px; object-fit: cover;">
                </div>
                <div class="col-md-9 informacoes-fabricio">
                    <p>Orelha master 123 (mago dos games)</p>
                    <p>⭐⭐⭐⭐⭐</p>
                    <p>A Camiseta Exclusiva Colorado superou todas as expectativas! A qualidade do material é excepcional, proporcionando um conforto notável. O design impressionante, fiel ao personagem. Uma compra que vale cada centavo!</p>
                </div>
            </div>


    <?php
    include_once("../templates/footer.php");
    ?>

<script src="comunidade.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>