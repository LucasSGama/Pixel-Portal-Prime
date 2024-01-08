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
    <link rel="stylesheet" href="../templates/header/header.css">

    <!-- Link para o footer -->
    <link rel="stylesheet" href="../templates/footer/footer.css">

    <!-- Link para o css -->
    <link rel="stylesheet" href="comentarios-pessoais.css">
</head>

<body>
    <?php
    include_once("../templates/header/header.php");
    ?>

    <a href="../Comunidade/comunidade.php" class="voltar-home"><button type="button" class="btn btn-secondary">Voltar</button></a>

    <br>

    <h1 class="text-center mt-5">Meus comentarios:</h1>

    <?php
    // Verifique se o usuário está autenticado
    if (isset($_SESSION['usuario_id'])) {
        // Obtém o ID do usuário da sessão
        $usuarioID = $_SESSION['usuario_id'];

        // Consulta SQL para obter os comentários do usuário específico
        $sql = "SELECT comentario_id, comentario, usuario_nome, data_criacao FROM comentarios WHERE usuario_id = $usuarioID";
        $resultado = $mysqli->query($sql);

        // Verifique se há resultados
        if ($resultado->num_rows > 0) {
            // Itera sobre os resultados e exibe cada comentário
            while ($row = $resultado->fetch_assoc()) {
                // Obter dados do banco de dados
                $comentarioID = $row['comentario_id'];
                $conteudoComentario = $row['comentario'];
                $usuarioNome = $row['usuario_nome'];
                $DataCriacao = $row['data_criacao'];

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

                    // Verifica se a edição está ativa para este comentário

                    echo '<div class="template row mt-3 p-3 rounded shadow">
                        <div class="col-md-3 dados-do-comentario">
                            <img src="data:image/jpeg;base64,' . $usuarioFotoBase64 . '" class="img-fluid rounded-circle foto-de-perfil" style="width: 130px; height: 130px; object-fit: cover;" alt="Foto de Perfil">
                        </div>
                        <div class="col-md-9 informacoes-template">
                            <p id="usuarioNome_' . $comentarioID . '" class="fw-bold">' . $usuarioNome . '</p>
                            <p id="conteudoComentario_' . $comentarioID . '" class="mb-0">' . $conteudoComentario . '</p>';

                    // Se a edição está ativa, exibir o formulário de edição
                    echo '<form id="formEditar_' . $comentarioID . '" action="editar-comentario.php" method="POST" style="display:none;">
                            <textarea class="form-control mb-2" name="atualizar_comentario" rows="3" placeholder="Digite sua edição...">' . $conteudoComentario . '</textarea>
                            <input type="hidden" name="comentario_id" value="' . $comentarioID . '">
                            <button type="submit" class="btn btn-success btn-sm">Salvar</button>
                            <button type="button" class="btn btn-secondary btn-sm" onclick="cancelarEdicao(' . $comentarioID . ')">Cancelar</button>
                        </form>';

                    // Se a edição não está ativa, exibir o botão de edição
                    echo '<p class="data-criacao">Data e horário da postagem:</p>
                        <p class="data-criacao">' . $DataCriacao . '</p>
                        <button class="btn btn-sm" onclick="ativarEdicao(' . $comentarioID . ')"><i class="bi bi-pencil-fill"></i> Editar</button>';

                    echo '<form action="excluir-comentario.php" method="post" style="display:inline;">
                            <input type="hidden" name="comentario_id" value="' . $comentarioID . '">
                            <button type="submit" class="btn btn-sm"><i class="bi bi-trash-fill"></i> Excluir</button>
                        </form>
                        </div>
                        </div>';
                }
            }
        } else {
            // Se o usuário não tiver comentários, exiba uma mensagem
            echo '<p class="text-center mt-3">Você ainda não fez nenhum comentário.</p>';
        }
        // Fechar a conexão com o banco de dados
        $mysqli->close();
    }
    ?>

    <?php
    include_once("../templates/footer/footer.php");
    ?>

    <script src="comunidade.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    
    <script>
    function ativarEdicao(comentarioID) {
        // Esconder o botão de edição
        document.querySelector('.template #formEditar_' + comentarioID).style.display = 'block';
        // Esconder o parágrafo de conteúdo do comentário
        document.getElementById('conteudoComentario_' + comentarioID).style.display = 'none';
    }

    function cancelarEdicao(comentarioID) {
        // Mostrar o botão de edição
        document.querySelector('.template #formEditar_' + comentarioID).style.display = 'none';
        // Mostrar o parágrafo de conteúdo do comentário
        document.getElementById('conteudoComentario_' + comentarioID).style.display = 'block';
    }
</script>

</body>
</html>