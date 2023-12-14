<?php

if (!isset($_SESSION)) {
    session_start();
}

include_once('../Base/conexao.php');

// Verifica se o botão de exclusão foi acionado
if (isset($_POST['confirmar_exclusao'])) {
    // Monta a instrução SQL para excluir o usuário (substitua o nome da tabela conforme a sua estrutura)
    $sqlExcluir = "DELETE FROM usuarios WHERE id = '$_SESSION[id]'";

    // Executa a instrução SQL
    if ($mysqli->query($sqlExcluir) === TRUE) {
        // Limpa os dados da sessão
        session_unset();

        // Destroi a sessão
        session_destroy();

        // Redireciona para a tela de login
        header("Location: ../index.php");
        exit();
    } else {
        echo "Erro na exclusão do perfil: " . $mysqli->error;
    }
}


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

        // Monta a instrução SQL para inserir dados na tabela (substitua os nomes dos campos e da tabela conforme a sua estrutura)
        $sql = "UPDATE usuarios SET 
                    nome='$nome', 
                    email='$email', 
                    senha='$senha', 
                    genero='$genero', 
                    endereco='$endereco', 
                    CEP='$CEP', 
                    data_nascimento='$data_nascimento', 
                    telefone='$telefone' 
                    WHERE id = '$_SESSION[id]'";


        // Executa a instrução SQL
        if ($mysqli->query($sql) === TRUE) {
            // Atualiza também os valores na sessão para refletir as mudanças
            $_SESSION['nome'] = $nome;
            $_SESSION['email'] = $email;
            $_SESSION['senha'] = $senha;
            $_SESSION['genero'] = $genero;
            $_SESSION['endereco'] = $endereco;
            $_SESSION['CEP'] = $CEP;
            $_SESSION['data_nascimento'] = $data_nascimento;
            $_SESSION['telefone'] = $telefone;
        } else {
            echo "Erro na atualização de dados: " . $mysqli->error;
        }
    }

?>

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

    <!-- Icon -->
    <link rel="shortcut icon" href="../Imagens-não-oficiais/logo.png" type="image/x-icon">

    <!-- Link para o header -->
    <link rel="stylesheet" href="../templates/header.css">
    
    <!-- Link para o footer -->
    <link rel="stylesheet" href="../templates/footer.css">
    
    <link rel="shortcut icon" href="imgs/icon.png" type="image/x-icon">
    <title>Conta</title>

    <style>
        /* Estilize seu pop-up aqui */
        #popup {
            position: fixed;
            width: 170px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;
            display: <?php echo isset($_SESSION['alteracoes_salvas']) && $_SESSION['alteracoes_salvas'] ? 'flex' : 'none'; ?>;
        }
        .botao {
          width: 100px;
          border-radius: 10px;
          position: relative;
        }
        .parte-baixo {
          display: flex;
        }

        #confirmarExclusao {
            position: fixed;
            width: 320px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            z-index: 1000;
        }
    </style>
</head>
<body>
    <!-- Header -->
     <!-- Header -->
     <?php
      include_once("../templates/header.php");
    ?>
    <!-- ______________________________-->
    <!-- Body -->


    <form action="perfil.php" method="POST" id="excluir-form">
    <div id="confirmarExclusao" style="display: none;">
        <p>Tem certeza que deseja excluir o perfil?</p>
        <button type="submit" class="btn btn-danger" name="confirmar_exclusao">Confirmar Exclusão</button>
        <button type="button" class="btn btn-secondary" onclick="cancelarExclusao()">Cancelar</button>
    </div>
           <!-- Seção do pop-up -->
    <div id="popup">
    <!-- Conteúdo do pop-up -->
    <?php if(isset($_SESSION['nome'])): ?>
    <p>Alterações salvas</p>
    <?php endif; ?>
    <div class="parte-baixo">
    <button class="botao" onclick="fecharPopup()">Fechar</button>
    </div>
</div>

    <div class="container">
        <h1 class="mb-4">INFORMAÇÕES DO PERFIL</h1>
        <div class="row">
            <div class="col-md-6 esquerda-meio-container">
                <h3>FOTO DE PERFIL</h3>
                <img src="../Imagens-não-oficiais/fabricio.png" alt="fabricio" class="img-fluid">
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <input type="hidden">
                    <label for="nome" class="form-label">Nome:</label>
                    <input type="text" name="nome" id="nome" class="form-control" minlength="6" maxlength="18" required value="<?php echo isset($_SESSION['nome']) ? $_SESSION['nome'] : ''; ?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">E-mail:</label>
                    <input type="email" name="email" id="email" class="form-control" required value="<?php echo isset($_SESSION['email']) ? $_SESSION['email'] : '';; ?>">
                </div>
                <div class="mb-3">
                    <label for="senha" class="form-label">Senha:</label>
                    <input type="password" name="senha" id="senha" class="form-control" minlength="8" maxlength="20" required value="<?php echo isset($_SESSION['senha']) ? $_SESSION['senha'] : ''; ?>">
                </div>
            </div>
        </div>
        <div class="row mt-4 baixo-conteiner">
            <h3>Informações adicionais:</h3>
            <div class="col-md-4 genero">
                <label for="genero" name="genero" id="genero" class="form-label">Genêro:</label>
                <br>
                <input type="radio" id="masculino" name="genero" value="masculino" <?php echo (isset($_SESSION['genero']) && $_SESSION['genero'] === 'masculino') ? 'checked' : ''; ?>>
                <label for="masculino">Masculino</label>

                <input type="radio" id="feminino" name="genero" value="feminino" <?php echo (isset($_SESSION['genero']) && $_SESSION['genero'] === 'feminino') ? 'checked' : ''; ?>>
                <label for="feminino">Feminino</label>

                <br>

                <input type="radio" id="outro" name="genero" value="outro" <?php echo (isset($_SESSION['genero']) && $_SESSION['genero'] === 'outro') ? 'checked' : ''; ?>>
                <label for="outro">Outro</label>

            </div>
            <div class="col-md-4 localizacao">
                <label for="endereco">Localização</label>
                <br>
                <input type="text" name="endereco" id="endereco" value="<?php echo isset($_SESSION['endereco']) ? $_SESSION['endereco'] : ''; ?>">
                <br>
                <label for="CEP" class="CEP-TELEFONE">CEP:</label>
                <br>
                <input type="number" name="CEP" id="CEP" value="<?php echo isset($_SESSION['CEP']) ? $_SESSION['CEP'] : ''; ?>">
            </div>
            <div class="col-md-4 data-de-nascimento">
                <label for="data-de-nascimento">Data de Nascimento:</label>
                <br>
                <input type="date" name="data_nascimento" id="data_nascimento" value="<?php echo isset($_SESSION['data_nascimento']) ? $_SESSION['data_nascimento'] : ''; ?>">
                <br>
                <!-- TELEFONE -->
                <label for="telefone" class="CEP-TELEFONE">Telefone:</label>
                <br>
                <input type="number" name="telefone" id="telefone" class="telefone" value="<?php echo isset($_SESSION['telefone']) ? $_SESSION['telefone'] : ''; ?>">
                <br>
            </div>
        </div>
        <br>
        <div class="botoes">
        <a href="../Home/home-foda.php"><button type="button" class="btn voltar">Voltar</button></a>
        <button type="button" class="btn btn-danger" name="excluir_perfil" onclick="confirmarExclusao()">Deletar</button>
        <button type="submit" class="btn btn-success  salvar" name="submit" id="submit" onclick="abrirPopup()">Salvar</button>
        <!-- <button type="submit" class="btn btn-success botoes Editar" name="submit" id="submit" onclick="abrirPopup()">Salvar</button> -->
        </div>
    </div>
</form>

    <!-- footer -->  
    <?php
    include_once("../templates/footer.php");
    ?>
    <!-- _____________________ -->
    <!-- BootStrap - Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
    // Função para abrir o pop-up
    function abrirPopup() {
        document.getElementById('popup').style.display = 'block';
        // Desabilita o botão de salvar enquanto o pop-up estiver aberto
        document.getElementById('submit').disabled = true;
    }

    // Função para fechar o pop-up
    function fecharPopup() {
        document.getElementById('popup').style.display = 'none';
        // Habilita o botão de salvar quando o pop-up for fechado
        document.getElementById('submit').disabled = false;
    }

    // Função para abrir a seção de confirmação de exclusão
function confirmarExclusao() {
    document.getElementById('confirmarExclusao').style.display = 'block';
    // Desabilita o botão de salvar enquanto a confirmação estiver aberta
    document.getElementById('submit').disabled = true;
}

// Função para cancelar a confirmação de exclusão
function cancelarExclusao() {
    document.getElementById('confirmarExclusao').style.display = 'none';
    // Habilita o botão de salvar quando a confirmação for cancelada
    document.getElementById('submit').disabled = false;
}
</script>
</body>
</html>