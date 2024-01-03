<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once('../Base/conexao.php');

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recupera o comentário do formulário
    $comentario = $_POST['comentario'];

    // Recupera o usuario_id da sessão (certifique-se de definir isso ao autenticar o usuário)
    $usuario_id = $_SESSION['usuario_id'];
    $usuario_nome = $_SESSION['nome'];
    $usuario_foto = $_SESSION['foto'];

    // Insere o comentário no banco de dados usando prepared statement
    $sql = "INSERT INTO comentarios (comentario, usuario_nome, usuario_id, usuario_foto) VALUES (?, ?, ?, ?)";

    $stmt = mysqli_prepare($mysqli, $sql);

    // Verifica se a preparação da consulta foi bem-sucedida
    if ($stmt) {
        // Vincula parâmetros à instrução preparada
        mysqli_stmt_bind_param($stmt, "ssis", $comentario, $usuario_nome, $usuario_id, $usuario_foto);

        // Executa a instrução preparada
        if (mysqli_stmt_execute($stmt)) {
            echo "Comentário enviado com sucesso!";
        } else {
            echo "Erro ao enviar o comentário: " . mysqli_stmt_error($stmt);
        }

        // Fecha a instrução preparada
        mysqli_stmt_close($stmt);
    } else {
        echo "Erro na preparação da consulta: " . mysqli_error($mysqli);
    }

    // Redireciona para a página comunidade.php
    header("Location: comunidade.php");
}
?>
