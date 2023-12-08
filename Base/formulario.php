<?php

    if(isset($_POST['submit']))
    {
        //     print_r($_POST['primeiro_nome']);
        //     print_r('<br>');
        //     print_r($_POST['ultimo_nome']);
        //     print_r('<br>');
        //     print_r($_POST['email']);
        //     print_r('<br>');
        //     print_r($_POST['cidade']);
        //     print_r('<br>');
        //         if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //             if (isset($_POST['genero'])) {
        //                 $generoSelecionado = $_POST['genero'];
        //                 echo "";
        //         print_r($generoSelecionado);
        //         } else {
        //         echo "Gênero não selecionado.";
        //     }
        // }

        //     print_r('<br>');
        //     print_r($_POST['senha']);

        include_once('conexao.php');

        $primeiro_nome = $_POST['primeiro_nome'];
        $ultimo_nome = $_POST['ultimo_nome'];
        $email = $_POST['email'];
        $cidade = $_POST['cidade'];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                       if (isset($_POST['genero'])) {
                     $genero = $_POST['genero'];
                       }}
        $senha = $_POST['senha'];
                    
        $result = mysqli_query($mysqli, "INSERT INTO usuarios(primeiro_nome,ultimo_nome,email,cidade,genero,senha)
        VALUES ('$primeiro_nome','$ultimo_nome','$email','$cidade','$genero','$senha')");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Link pro CSS -->
    <link rel="stylesheet" href="style.css">

    <!-- link do bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    
    <title>Cadastro</title>

    <style>
        body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    box-sizing: border-box;
    background-color: gray;
    }

    form {
      /* Adicione estilos adicionais ao seu formulário aqui */
      width: 100%; /* Isso garante que o formulário ocupe 100% da largura do contêiner pai */
      max-width: 500px; /* Ajuste conforme necessário */
      padding: 20px; /* Adiciona algum preenchimento interno para espaçamento */
      box-sizing: border-box;
      background-color: rgba(255, 255, 255, 0.8);
    }
    </style>
</head>
<body>
    <form class="g-3 needs-validation" novalidate action="formulario.php" method="POST">
        <h1>Cadastro</h1>
    <div class="col-md-12">
        <label for="primeiro_nome" class="form-label">Primeiro nome</label>
        <input type="text" class="form-control" id="primeiro_nome" name="primeiro_nome" required>
    </div>
    <div class="col-md-12">
        <label for="ultimo_nome" class="form-label">Last name</label>
        <input type="text" class="form-control" id="ultimo_nome" name="ultimo_nome" required>
    </div>
    <div class="col-md-12">
        <label for="email" class="form-label">E-mail</label>
        <input type="text" class="form-control" id="email" name="email" aria-describedby="inputGroupPrepend" required>
        </div>
    </div>
    <div class="col-md-12">
        <label for="cidade" class="form-label">Cidade</label>
        <input type="text" class="form-control" id="cidade" name="cidade" required>
    </div>
    <div class="col-md-12">
        <label for="genero" class="form-label">Gênero</label>
        <select class="form-select" id="genero" name="genero" required>
        <option selected disabled value="">...</option>
        <option>Masculino</option>
        <option>Feminino</option>
        </select>
    </div>
    
    
    <div class="col-auto">
            <label for="senha" class="col-form-label">Senha</label>
    </div>
        <div class="col-auto">
        <input type="password" id="senha" name="senha" class="form-control" aria-describedby="passwordHelpInline">
    </div>
        <div class="col-auto">
        <span id="passwordHelpInline" class="form-text">
            Deve ter de 8 a 20 caracteres.
        </span>
    </div>

    <br>

    <div class="col-12">
        <div class="form-check">
        <input class="form-check-input" type="checkbox" value="termos" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
                Concorde com os termos e condições
            </label>
        </div>
    </div>
    <br>
    <div class="col-12">
        <button type="submit" class="btn btn-primary" name="submit" id="submit">Enviar</button>
    </div>
    </form>

    <!-- Link do bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>