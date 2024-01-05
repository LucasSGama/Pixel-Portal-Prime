<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once('../Base/conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Se o botão de atualização for acionado
    if (isset($_POST['atualizar_comentario'])) {
        // Recupera os dados do formulário
        $novoConteudoComentario = isset($_POST['atualizar_comentario']) ? $_POST['atualizar_comentario'] : '';
        $comentarioID = isset($_POST['comentario_id']) ? $_POST['comentario_id'] : '';

        // Monta a instrução SQL para atualizar o comentário
        $sql = "UPDATE comentarios SET 
                    comentario='$novoConteudoComentario'
                    WHERE comentario_id = '$comentarioID'";

        // Executa a instrução SQL
        if ($mysqli->query($sql) === TRUE) {
            // Redireciona para a página de comentários pessoais após a atualização bem-sucedida
            header("Location: comentarios-pessoais.php");
            exit;
        } else {
            echo "Erro na atualização de dados: " . $mysqli->error;
        }
    }
}

?>
