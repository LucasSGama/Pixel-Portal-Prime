<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once('../Base/conexao.php');

// Verifica se o comentário_id foi enviado via POST
if (isset($_POST['comentario_id'])) {
    $comentario_id = $_POST['comentario_id'];

    // Adicione a lógica necessária para verificar se o usuário tem permissão para excluir o comentário

    // Consulta SQL para excluir o comentário
    $sql = "DELETE FROM comentarios WHERE comentario_id = $comentario_id";
    $resultado = $mysqli->query($sql);

    header("Location: comentarios-pessoais.php");
}

// Fechar a conexão com o banco de dados
$mysqli->close();
?>
