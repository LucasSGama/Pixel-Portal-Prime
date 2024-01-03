<?php

if(!isset($_SESSION)) {
  session_start();
}


include_once('../Base/conexao.php');


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

<a href="../Home/home-foda.php" class="voltar-home"><button type="button" class="btn btn-secondary">Voltar</button></a>

<br>
            <h1 class="text-center">COMUNIDADE</h1>
            <div class="d-flex justify-content-around p-3">
                <h6>Comentários:</h6>
                <button class="btn btn-outline-primary" id="CriarBTN">Criar comentário</button>
            </div>

            <br>
            <br>

            <div class="container text-center ocultar-conteudo">
                <form action="criar-comentario.php" method="POST">
                    <h3>Digite seu comentário:</h3>
                    <textarea name="comentario" id="comentario" cols="30" rows="10" maxlength="255" placeholder="Digite seu comentario..."></textarea>
                    <br>
                        <div class="botoes">
                            <button type="button" class="btn btn-secondary" id="CancelarBTN">Cancelar</button>
                            <button type="submit" class="btn btn-success">Enviar</button>
                        </div>
                </form>
            </div>



            <?php 

                   // Consulta SQL para obter todos os comentários com conteúdo
                    $sqlComentarios = "SELECT comentario_id, comentario, usuario_nome, usuario_id FROM comentarios";
                    $resultadoComentarios = $mysqli->query($sqlComentarios);

                    // Verificar se há resultados
                    if ($resultadoComentarios->num_rows > 0) {
                        // Iterar sobre os resultados e exibir cada comentário
                        while ($row = $resultadoComentarios->fetch_assoc()) {
                            // Obter dados do banco de dados
                            $comentarioID = $row['comentario_id'];
                            $conteudoComentario = $row['comentario'];
                            $usuarioID = $row['usuario_id'];
                            $usuarioNome = $row['usuario_nome'];

                            // Agora, faça uma nova consulta para obter a foto do usuário
                            $sqlUsuario = "SELECT foto FROM usuarios WHERE usuario_id = $usuarioID";
                            $resultadoUsuario = $mysqli->query($sqlUsuario);

                            // Verificar se há resultados para o usuário
                            if ($resultadoUsuario->num_rows > 0) {
                                $rowUsuario = $resultadoUsuario->fetch_assoc();
                                $usuarioFoto = $rowUsuario['foto'];

                                // Verificar se o usuário tem uma foto de perfil
                                if ($usuarioFoto) {
                                    $usuarioFotoBase64 = base64_encode($usuarioFoto);
                                } else {
                                    // Usar foto padrão se o usuário não tiver uma foto
                                    $fotoPadraoPath = '../Imagens-não-oficiais/foto-de-perfil-default.jpg';
                                    $usuarioFotoBase64 = base64_encode(file_get_contents($fotoPadraoPath));
                                }

                                // Exibir o template com os dados do comentário
                                echo '<div class="template row mt-3 p-3 rounded shadow">
                                        <div class="col-md-3 dados-do-comentario">
                                            <img src="data:image/jpeg;base64,' . $usuarioFotoBase64 . '" class="img-fluid rounded-circle foto-de-perfil" style="width: 130px; height: 130px; object-fit: cover;" alt="Foto de Perfil">
                                        </div>
                                        <div class="col-md-9 informacoes-template">
                                            <p class="fw-bold">' . $usuarioNome . '</p>
                                            <p class="mb-0">' . $conteudoComentario . '</p>
                                        </div>
                                    </div>';
                            }
                        }
                    }

                 // Fechar a conexão com o banco de dados
                 $mysqli->close();
                  ?>

            <?php
            include_once("../templates/footer.php");
            ?>
            
<script src="comunidade.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</body>
</html>