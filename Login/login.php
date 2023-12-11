<?php
    include_once('Base/conexao.php');

    if(isset($_POST['email']) || isset($_POST['senha'])) {

        if(strlen($_POST['email']) == 0) {
            echo "Insira seu email";
        } else if(strlen($_POST['senha']) == 0) {
            echo "Preencha sua senha";
        } else {

            $email = $mysqli->real_escape_string($_POST['email']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql_code = "SELECT id, nome, email, senha, telefone, endereco, data_nascimento, genero, CEP FROM usuarios WHERE  email = '$email' AND senha = '$senha'";
            $sql_query = $mysqli->query($sql_code) or die("Falha na conexão" . $mysqli->error);

            $quantidade = $sql_query->num_rows;

            if($quantidade == 1) {

                $usuario = $sql_query->fetch_assoc();

                if(!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nome'] = $usuario['nome'];
                $_SESSION['email'] = $usuario['email'];
                $_SESSION['senha'] = $usuario['senha'];
                $_SESSION['telefone'] = $usuario['telefone'];
                $_SESSION['endereco'] = $usuario['endereco'];
                $_SESSION['data_nascimento'] = $usuario['data_nascimento'];
                $_SESSION['genero'] = $usuario['genero'];
                $_SESSION['CEP'] = $usuario['CEP'];

                header("Location: Home/home-foda.php");

            }
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
    <!-- BootStrap - Icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- Style.css -->
    <link rel="stylesheet" href="Login/login.css">
    <link rel="shortcut icon" href="imgs/icon.png" type="image/x-icon">
    <title>Login</title>


    <style>
        /* Defina seus estilos CSS aqui */
        p {
            font-size: small;
            margin-top: -30px;
            margin-left: -70px;
            margin-bottom: 40px;
            opacity: 0.7;
            color: black;
        }
    </style>
</head>
<body>
    <div class="video-background">
        <div class="video-wrap">
            <video id="myVideo" loop muted autoplay>
                <source src="Imagens-não-oficiais/SuperMarioBros2.mp4" type="video/mp4">
                Seu navegador não suporta o elemento de vídeo.
            </video>
        </div>
    </div>
    <form action="" method="POST">
    <div class="content">
        <section>
        <div class="Login">
            <img src="Imagens-não-oficiais/logo.png" alt="logo">
            <h2>Login</h2>
            <br>
            <div class="inputBox">
                <input type="email" id="email" name="email" placeholder="Digite seu email" required>
            </div>
            <div class="inputBox">
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" minlength="8" maxlength="20" required>
            <div class="inputBox">
                <a href="Home/home-foda.php"><input type="submit" value="Entrar" name="Entrar" id="btn"></a>
            </div>
            </form>
            <div class="group">
                <a href="#">Esqueci a senha</a>
                <a href="Cadastro/cadastro.php">Quero me cadastrar!</a>
            </div>
            <br>
        </div>
    </section>
    </div>
    <!-- BootStrap - Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>