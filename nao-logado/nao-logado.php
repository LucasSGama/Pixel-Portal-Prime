<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Não fez login</title>

    <!-- Link para o CSS/Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Icon -->
    <link rel="shortcut icon" href="../Imagens-não-oficiais/logo.png" type="image/x-icon">

    <!-- Link para os icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <style>
        body {
            background: linear-gradient(to bottom right, #000000, #ff8c00);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 0;
        }

        h1 {
            color: #FFF;
        }

        .custom-icon {
            font-size: 5em; /* Ajuste o tamanho conforme necessário */
            color: #ffffff; /* Cor branca */
        }

        .button-container {
            text-align: center;
            gap: 15px
        }

        a {
            width: 250px;
            margin-top: 5px; /* Espaçamento acima do primeiro botão */
            margin-bottom: 5px; /* Espaçamento abaixo dos botões */
        }
    </style>
</head>
<body>
    <div class="text-center">
        <i class="bi bi-exclamation-triangle custom-icon"></i>
        <h1>Você não está logado</h1>
        <div class="button-container d-sm-flex">
            <a class="btn btn-outline-warning" href="../index.php">Ir para a tela de login</a>
            <a class="btn btn-outline-secondary" href="../Cadastro/cadastro.php">Ir para a tela de Cadastro</a>
        </div>
    </div>
</body>
</html>
