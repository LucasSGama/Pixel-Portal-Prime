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

// Verifica se o botão de exclusão foi acionado
if (isset($_POST['confirmar_exclusao'])) {
    // Monta a instrução SQL para excluir o usuário (substitua o nome da tabela conforme a sua estrutura)
    $sqlExcluir = "DELETE FROM usuarios WHERE usuario_id = '$_SESSION[usuario_id]'";

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
            $foto = isset($_POST['foto']) ? $_POST['foto'] : '';

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
                    WHERE usuario_id = '$_SESSION[usuario_id]'";


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
    
    <title>Conta</title>

    <style>
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


    
    
    <div class="container">
        <h1 class="mb-4">INFORMAÇÕES DO PERFIL</h1>
        <form action="trocar-foto.php" method="POST" enctype="multipart/form-data">
        <div>
            <div id="foto-de-perfil" style="display: none;">
                <p>Selecione a sua foto</p>
                <input type="file" name="foto" accept="image/*">
                <br>
                <br>
                <button type="button" class="btn btn-secondary" onclick="NaoMudarFoto()">Cancelar</button>      
                <button type="submit" class="btn btn-success  salvar" name="submit" id="submit">Salvar</button>
                <!-- <button type="submit" class="btn btn-success  salvar" name="submit" id="submit" onclick="abrirPopup()">Salvar</button> -->
            </div>
        </div>
        <div class="row">
            <!-- _______________________________ -->
            <div class="col-md-6 esquerda-meio-container">
                <h3 class="text-foto-de-perfil">FOTO DE PERFIL</h3>
                <div class="foto-perfil-container position-relative">
                    <?php
                    if (isset($_SESSION['foto'])) {
                        echo '<img src="data:image/jpeg;base64,' . base64_encode($_SESSION['foto']) . '" alt="Foto de Perfil" class="img-fluid rounded-circle foto-de-perfil" style="width: 230px; height: 230px; object-fit: cover;">';
                    } else {
                        echo '<img src="../Imagens-não-oficiais/foto-de-perfil-default.jpg" alt="default" class="img-fluid rounded-circle foto-de-perfil" style="width: 230px; height: 230px; object-fit: cover;">';
                    }
                    ?>
                    
                    <button type="button" class="btn btn-primary MudarDeFoto" onclick="MudarDefoto()">Mudar foto de perfil</button>


                    <!-- Adicione input para upload de foto -->
                </div>
            </div>
            </form>   
            <!-- ___________________ -->
            
            <form action="perfil.php" method="POST" id="excluir-form" enctype="multipart/form-data" class="col-md-6">
                

            <div class="informacoes-principais">
                <div class="mb-3">
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

    <div class="col-md-4 col-sm-12 genero">
        <label for="genero" class="form-label">Gênero:</label>
        <br>
        <div class="form-check form-check-inline">
            <input type="radio" id="masculino" name="genero" value="masculino" class="form-check-input" <?php echo (isset($_SESSION['genero']) && $_SESSION['genero'] === 'masculino') ? 'checked' : ''; ?>>
            <label for="masculino" class="form-check-label">Masculino</label>
        </div>

        <div class="form-check form-check-inline">
            <input type="radio" id="feminino" name="genero" value="feminino" class="form-check-input" <?php echo (isset($_SESSION['genero']) && $_SESSION['genero'] === 'feminino') ? 'checked' : ''; ?>>
            <label for="feminino" class="form-check-label">Feminino</label>
        </div>

        <div class="form-check form-check-inline">
            <input type="radio" id="outro" name="genero" value="outro" class="form-check-input" <?php echo (isset($_SESSION['genero']) && $_SESSION['genero'] === 'outro') ? 'checked' : ''; ?>>
            <label for="outro" class="form-check-label">Outro</label>
        </div>
    </div>

    <div class="col-md-4 col-sm-12 localizacao">
        <label for="endereco" class="label-inputs-abaixo">Localização</label>
        <br>
        <input type="text" name="endereco" id="endereco" class="form-control inputs-baixos" value="<?php echo isset($_SESSION['endereco']) ? $_SESSION['endereco'] : ''; ?>">
        <br>
        <label for="CEP" class="CEP-TELEFONE label-inputs-abaixo">CEP:</label>
        <br>
        <input type="number" name="CEP" id="CEP" class="form-control inputs-baixos" value="<?php echo isset($_SESSION['CEP']) ? $_SESSION['CEP'] : ''; ?>">
    </div>

    <div class="col-md-4 col-sm-12 data-de-nascimento">
        <label for="data-de-nascimento" class="label-inputs-abaixo">Data de Nascimento:</label>
        <br>
        <input type="date" name="data_nascimento" id="data_nascimento" class="form-control inputs-baixos" value="<?php echo isset($_SESSION['data_nascimento']) ? $_SESSION['data_nascimento'] : ''; ?>">
        <br>
        <label for="telefone" class="CEP-TELEFONE label-inputs-abaixo">Telefone:</label>
        <br>
        <input type="number" name="telefone" id="telefone" class="form-control telefone inputs-baixos" value="<?php echo isset($_SESSION['telefone']) ? $_SESSION['telefone'] : ''; ?>">
        <br>
    </div>
</div>

        <br>
        <div class="botoes">
        <a href="../Home/home-foda.php"><button type="button" class="btn voltar">Voltar</button></a>
        <button type="button" class="btn btn-danger deletar" name="excluir_perfil" onclick="confirmarExclusao()">Deletar</button>
        <button type="submit" class="btn btn-success  salvar" name="submit" id="submit">Salvar</button>
        <!-- <button type="submit" class="btn btn-success botoes Editar" name="submit" id="submit" onclick="abrirPopup()">Salvar</button> -->
        </div>
    </div>


    <div class="col-md-6">
            <div id="confirmarExclusao" style="display: none;">
                <p>Tem certeza que deseja excluir o perfil?</p>
                 <button type="submit" class="btn btn-danger" name="confirmar_exclusao">Confirmar Exclusão</button>                    <button type="button" class="btn btn-secondary" onclick="cancelarExclusao()">Cancelar</button>
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
    // function abrirPopup() {
    //     document.getElementById('popup').style.display = 'block';
    //     // Desabilita o botão de salvar enquanto o pop-up estiver aberto
    //     document.getElementById('submit').disabled = true;
    // }

    // // Função para fechar o pop-up
    // function fecharPopup() {
    //     document.getElementById('popup').style.display = 'none';
    //     // Habilita o botão de salvar quando o pop-up for fechado
    //     document.getElementById('submit').disabled = false;
    // }

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

    // Função para abrir a seção de mudar a foto
function MudarDefoto() {
    document.getElementById('foto-de-perfil').style.display = 'block';
 
}

// Função para cancelar a troca de foto de perfil
function NaoMudarFoto() {
    document.getElementById('foto-de-perfil').style.display = 'none';
}
</script>
</body>
</html>