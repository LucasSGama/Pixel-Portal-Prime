<?php

    // Verifica se o usuário não está logado
if (!isset($_SESSION['nome'])) {
    // Se não estiver logado, exibe uma mensagem e encerra o script
    include_once("../nao-logado/nao-logado.php");
    exit();
  }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>

      <!-- Link para o CSS/Bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<!-- Icon -->
<link rel="shortcut icon" href="../Imagens-não-oficiais/logo.png" type="image/x-icon">

<!-- Link para os icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

<!-- Link para o CSS -->
<link rel="stylesheet" href="carrinho.css">

<!-- Link para o header -->
<link rel="stylesheet" href="../templates/header.css">

<!-- Link para o footer -->
<link rel="stylesheet" href="../templates/footer.css">

</head>
<body>
<?php
      include_once("../templates/header.php");
    ?>

<main class="container mt-5">
<a href="../Home/home-foda.php"><button type="button" class="btn btn-secondary">Voltar</button></a>

        <section class="main-baixo mt-5">
            <h1 class="mb-4">Seu carrinho</h1>
            <div class="row">
                
                <?php   
                // Seu código de conexão ao banco de dados aqui
                include_once "../Base/conexao.php"; // Substitua pelo seu arquivo de conexão

                if(!isset($_SESSION)) {
                    session_start();
                  }  
                
                $usuario_id = $_SESSION['usuario_id'];

                // Processar remoção de item antes de exibir a lista
                if(isset($_POST['excluir_item']) && isset($_POST['carrinho_id'])) {
                    $carrinho_id = $_POST['carrinho_id'];
                    $sqlRemoverItem = "DELETE FROM carrinho WHERE usuario_id = ? AND carrinho_id = ?";
                    $stmt = $mysqli->prepare($sqlRemoverItem);
                    $stmt->bind_param("ii", $usuario_id, $carrinho_id);
                    $stmt->execute();
                    $stmt->close();
                    
                }
                
                $sql = "SELECT carrinho.carrinho_id, produtos.produto_id, produtos.nome, produtos.descricao, produtos.imagem, carrinho.quantidade, produtos.preco FROM carrinho
                INNER JOIN produtos ON carrinho.produto_id = produtos.produto_id
                WHERE carrinho.usuario_id = ?";
    
                $stmt = $mysqli->prepare($sql);
                $stmt->bind_param("i", $usuario_id);
                $stmt->execute();
                $result = $stmt->get_result();
            
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
       <div class="col-md-6 mb-3">
    <div class="conteudo-main-baixo row align-items-center">
        <div class="card mb-3 border-0" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img src="../Imagens-não-oficiais/<?php echo $row['imagem']; ?>" class="img-fluid rounded-start w-100 h-100" alt="Imagem do produto">
                </div>
                <div class="col-md-8">
                            <div class="card-body mb-3">
                                <p class="card-text">
                                    <strong><?php echo $row['nome']; ?></strong><br><br>
                                    <?php echo $row['descricao']; ?>
                                </p>

                                <div class="row">
                                    <div class="col-md-6">
                                        <label id="titulo-quantidade">Quantidade</label>
                                        <div>
                                            <input type="number" id="numero" value="<?php echo  isset($row['quantidade']) ? $row['quantidade'] : 0; ?>" class="form-control text-center">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Preço</label>
                                        <p><strong>R$ <?php echo $row['preco']; ?></strong></p><br>
                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                            <input type="hidden" name="carrinho_id" value="<?php echo $row['carrinho_id']; ?>">
                                            <button type="submit" class="btn btn-danger" name="excluir_item">Remover item</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo 
    '<div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 text-center">
                <p class="nenhum">Nenhum produto encontrado no carrinho</p>
                <img class="nenhum-img img-fluid" src="../Imagens-não-oficiais/Carinha-triste.jpg" alt="carinha triste">
            </div>
        </div>
    </div>';
}
?>
<button type="button" class="btn btn-outline-success btn-lg" disabled>Comprar</button>
</main>
    <?php
  include_once("../templates/footer.php");
  ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>