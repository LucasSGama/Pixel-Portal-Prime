<?php

if(!isset($_SESSION)) {
    session_start();
  }  

  // Verifica se o usuário não está logado
if (!isset($_SESSION['nome'])) {
    // Se não estiver logado, exibe uma mensagem e encerra o script
    include_once("../nao-logado/nao-logado.php");
    exit();
  }

  
// Seu código de conexão ao banco de dados aqui
include_once "../Base/conexao.php"; // Substitua pelo seu arquivo de conexão


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['quantidade']) && isset($_POST['produto_id'])) {
    $quantidade = $_POST['quantidade'];
    $produto_id = $_POST['produto_id'];
    $usuario_id = $_SESSION['usuario_id']; // Substitua pelo nome da sua variável de sessão que armazena o ID do usuário

    // Insira os dados na tabela do carrinho
    $sql = "INSERT INTO carrinho (usuario_id, produto_id, quantidade) VALUES (?, ?, ?)";
    $stmt = $mysqli->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("iii", $usuario_id, $produto_id, $quantidade);
        $stmt->execute();
        $stmt->close();
    }
}

?>



<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compras</title>

      <!-- Link para o CSS/Bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <!-- Link para os icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- Link para o CSS -->
    <link rel="stylesheet" href="compras.css">

     <!-- Link para o header -->
     <link rel="stylesheet" href="../templates/header.css">

    <!-- Link para o footer -->
    <link rel="stylesheet" href="../templates/footer.css">

</head>
<body>
    <?php
      include_once("../templates/header.php");
    ?>

<div class="container">
        <!-- Produto -->
        <a href="../Home/home-foda.php"><button type="button" class="btn btn-secondary">Voltar</button></a>
        <div class="row mt-3 mainEsquerda">
            <div class="col-md-6">
                <section class="encimaEsquerda">
                    <!-- <img src="Imagens-não-oficiais/camisa2.png" alt="camiseta1" class="img-fluid">
                    <img src="Imagens-não-oficiais/costas.png" alt="camisa2" class="img-fluid mt-2"> -->
                    <ul class="imagemMenor">
                        <li><a href="#"><img src="../Imagens-não-oficiais/Camisas/Camisas-StarWars/camisa-starwars1.png" alt="produto" width="70px" height="70px" id="imgMenor1"></a></li>
                        <li><a href="#"><img src="../Imagens-não-oficiais/Camisas/Camisas-StarWars/camisa-starwars2.png" alt="produto" width="70px" height="70px" id="imgMenor2"></a></li>
                        <li><a href="#"><img src="../Imagens-não-oficiais/Camisas/Camisas-StarWars/camisa-starwars3.png" alt="produto" width="70px" height="70px" id="imgMenor3"></a></li>
                </ul>
                <div class="imagemPrincipal">
                    <img src="../Imagens-não-oficiais/Camisas/Camisas-StarWars/camisa-starwars1.png" alt="produto" width="430px" class="img-fluid" height="430px" id="imgMaior">
                </div>
                </section>
            </div>
            <div class="col-md-6">
                <div class="letra">
                    <h1>Camiseta Star Wars</h1>
                    <p id="valor"> De: R$79,90</p>
                    <h3 class="valor2">R$49,90</h3>
                </div>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <input type="hidden" name="produto_id" value="4"> <!-- Substitua pelo ID do produto -->
                <div class="escolha mt-3">
                    <input type="number" id="quantity" name="quantidade" value="1" minlength="1" maxlength="10" required class="form-control" style="width: 150px;">
                </div>
                <button class="btn btn-success mt-3 Comprar" disabled>COMPRAR</button>
                <br>
                <a href="../Carrinho/carrinho.php" class="text-decoration-none adicionar-no-carrinho">
                    <button type="submit" class="btn btn-secondary mt-3">Adicionar no carrinho
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/>
                        </svg>
                    </button>
                </a>
                </form>
            </div>
        </div>

        <!-- DESCRIÇÃO DA BLUSA -->
        <h1 class="descricao">Descrição</h1>
        <div class="descricao mt-4">
            <p class="text-justify"> A camiseta do Chapolin Colorado é uma peça icônica que homenageia um dos personagens mais queridos da televisão latino-americana. 
        Conhecido por suas trapalhadas, frases engraçadas e seu famoso bordão "Não contavam com a minha astúcia!", 
        o Chapolin Colorado é um herói atrapalhado que conquistou o coração de milhões de fãs.
        <br>
        <br>
        <b>Conforto Inigualável:</b>
            Fabricada com materiais de alta qualidade, 
            nossa camiseta proporciona o máximo conforto durante todo o dia. 
            O tecido macio e respirável garante uma sensação agradável na pele, 
            enquanto a modelagem cuidadosamente pensada oferece um caimento perfeito.
        <br>
        <br>
        <b>Estilo Versátil:</b>
            A camiseta geralmente apresenta uma estampa vibrante e colorida, com a imagem do Chapolin em destaque. 
            O vermelho característico de seu uniforme, as antenas amarelas em sua cabeça e o coração amarelo no peito são 
            elementos marcantes que não podem faltar na representação do personagem.
            Além disso, a expressão facial peculiar e o inseparável martelo vermelho que ele carrega são detalhes que c
            ontribuem para a identificação imediata.
        </p>
        </div>

        <!-- Avaliações -->
        <div class="mt-4">
            <h3 class="avaliacoes">Avaliações</h3>
            <div class="fabricio row mt-3">
                <div class="col-md-3">
                <img src="../Imagens-não-oficiais/foto-de-perfil-default.jpg" class="card-img-top rounded-circle" alt="..." style="width: 200px; height: 200px; object-fit: cover;">
                </div>
                <div class="col-md-9 informacoes-fabricio">
                    <p>Orelha master 123 (mago dos games)</p>
                    <p>⭐⭐⭐⭐⭐</p>
                    <p>A Camiseta Exclusiva Colorado superou todas as expectativas! A qualidade do material é excepcional, proporcionando um conforto notável. O design impressionante, fiel ao personagem. Uma compra que vale cada centavo!</p>
                </div>
            </div>
            <div class="ana row mt-3">
                <div class="col-md-3">
                <img src="../Imagens-não-oficiais/foto-de-perfil-default.jpg" class="card-img-top rounded-circle" alt="..." style="width: 200px; height: 200px; object-fit: cover;">
                </div>
                <div class="col-md-9 informacoes-ana">
                    <p>Rafa com f</p>
                    <p>⭐⭐⭐⭐⭐</p>
                    <p>A Camiseta Exclusiva do Chapolim superou todas as expectativas! A qualidade do material é excepcional, proporcionando um conforto notável. O design impressionante, fiel ao personagem. Uma compra que vale cada centavo!</p>
                </div>
            </div>
        </div>
    </div>

<?php
  include_once("../templates/footer.php");
?>

<script src="compras.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script>
    var quantity = document.getElementById('quantity').value;

    if (quantity.length < 8 || quantity.length > 20) {
            alert("A quantidade deve ser entre 1 e 10 unidades.");
            return false;
        }
</script>
<script>
        const imgMenor1 = document.querySelector("#imgMenor1")
        const imgMenor2 = document.querySelector("#imgMenor2")
        const imgMenor3 = document.querySelector("#imgMenor3")
        const imgMaior = document.querySelector("#imgMaior")

        imgMenor1.addEventListener("click", function() {
            imgMaior.src = "../Imagens-não-oficiais/Camisas/Camisas-StarWars/camisa-starwars1.png"
        });

        imgMenor2.addEventListener("click", function() {
            imgMaior.src = "../Imagens-não-oficiais/Camisas/Camisas-StarWars/camisa-starwars2.png"
        });

        imgMenor3.addEventListener("click", function() {
            imgMaior.src = "../Imagens-não-oficiais/Camisas/Camisas-StarWars/camisa-starwars3.png"
        });
</script>
</body>
</html>