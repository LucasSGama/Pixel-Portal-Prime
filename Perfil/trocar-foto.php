<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once('../Base/conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Se o botão de exclusão for acionado

            // Recupera os dados do formulário
            $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
            $email = isset($_POST['email']) ? $_POST['email'] : '';
            $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
            $genero = isset($_POST['genero']) ? $_POST['genero'] : '';
            $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
            $CEP = isset($_POST['CEP']) ? $_POST['CEP'] : '';
            $data_nascimento = isset($_POST['data_nascimento']) ? $_POST['data_nascimento'] : '';
            $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
            $foto = isset($_POST['foto']) ? $_POST['foto'] : '';

        // Monta a instrução SQL para inserir dados na tabela (substitua os nomes dos campos e da tabela conforme a sua estrutura)
        $sql = "UPDATE usuarios SET 
                    foto='$foto' 
                    WHERE usuario_id = '$_SESSION[usuario_id]'";


        // Executa a instrução SQL
        if ($mysqli->query($sql) === TRUE) {
            $_SESSION['foto'] = $foto;
        } else {
            echo "Erro na atualização de dados: " . $mysqli->error;
        }

         // Manipulação do upload da foto
         if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
            $foto = file_get_contents($_FILES['foto']['tmp_name']);
        
            // Atualiza a coluna 'foto' no banco de dados
            $sqlUpdateFoto = "UPDATE usuarios SET foto = ? WHERE usuario_id = ?";
            $stmt = $mysqli->prepare($sqlUpdateFoto);
            $stmt->bind_param("si", $foto, $_SESSION['usuario_id']);
        
            if ($stmt->execute()) {
                // Sucesso ao atualizar a foto
                
                // Atualiza a variável de sessão 'foto'
                $_SESSION['foto'] = $foto;
        
                // ... (seu código adicional)
            } else {
                echo "Erro ao atualizar a foto: " . $stmt->error;
            }
        
            $stmt->close();
            header("Location: perfil.php");

        }
    }

?>