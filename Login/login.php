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
    <form novalidate action="login.php" method="POST">
    <div class="content">
        <section>
        <div class="Login">
            <img src="Imagens-não-oficiais/logo.png" alt="logo">
            <h2>Login</h2>
            <br>
            <div class="inputBox">
                <input type="email" placeholder="Digite seu email" required>
            </div>
            <div class="inputBox">
                <input type="password" id="senha" name="senha" placeholder="Digite sua senha" required>
                <span class="show-password" id="span-olho" >
                    <i class="bi bi-eye-slash olho1" id="olho1" ></i>
                </span>
                <p class="subtitulo">Entre 8 e 20 caracteres</p>
            </div>
            <div class="inputBox">
                <input type="submit" value="Entrar" id="btn">
            </div>
            <div class="group">
                <a href="#">Esqueci a senha</a>
                <a href="Cadastro/cadastro.php">Quero me cadastrar!</a>
            </div>
            <br>
        </div>
    </section>
    </div>
    </form>
    <!-- BootStrap - Script -->
    <script src="login.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>