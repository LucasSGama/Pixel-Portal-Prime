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
                if(!isset($_SESSION)) {
                    session_start();
                  }  
                // Seu código de conexão ao banco de dados aqui
                include_once "../Base/conexao.php"; // Substitua pelo seu arquivo de conexão
                
                $usuario_id = $_SESSION['id'];
                
                // Consulta para recuperar os produtos no carrinho do usuário
                $sql = "SELECT produtos.id as produto_id, produtos.nome, produtos.descricao, produtos.imagem, carrinho.quantidade, produtos.preco FROM carrinho
                INNER JOIN produtos ON carrinho.produto_id = produtos.id
                WHERE carrinho.usuario_id = $usuario_id";

                $result = $mysqli->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        // Verificação e lógica de exclusão dentro do loop
                        // if (isset($_POST['excluir_item'])) {
                        //     $produto_id = $_POST['produto_id'];
                        //     $sqlRemoverItem = "DELETE FROM carrinho WHERE usuario_id = ? AND produto_id = ?";
                        //     $stmt = $mysqli->prepare($sqlRemoverItem);
                        //     $stmt->bind_param("ii", $usuario_id, $produto_id);
                        //     $stmt->execute();
                        //     $stmt->close();
                        // }
                        
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
                                        <form action="carrinho.php" method="POST">
                                        <input type="hidden" name="produto_id" value="<?php echo $row['produto_id']; ?>">
                                        <button type="submit" class="btn btn-danger" name="excluir_item_<?php echo $row['produto_id']; ?>">Remover item</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <?php
                                if (isset($_POST['excluir_item_' . $row['produto_id']])) {
                                    // Restante do código para remover o item
                                    $produto_id = $row['produto_id'];
                                    $sqlRemoverItem = "DELETE FROM carrinho WHERE usuario_id = ? AND produto_id = ?";
                                    $stmt = $mysqli->prepare($sqlRemoverItem);
                                    $stmt->bind_param("ii", $usuario_id, $produto_id); // "ii" indica que são dois valores inteiros
                                    $stmt->execute();
                                    $stmt->close();
                                }
                            
                        
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
} else {
    echo '
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-12 text-center">
                <p class="nenhum">Nenhum produto encontrado no carrinho</p>
                <img class="nenhum-img img-fluid" src="../Imagens-não-oficiais/Carinha-triste.jpg" alt="carinha triste">
            </div>
        </div>
    </div>';
}?>
<button type="button" class="btn btn-outline-success btn-lg" disabled>Comprar</button>
</main>
    <?php
  include_once("../templates/footer.php");
  ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>


<!-- <div class="caixa-direita col-md-3 mb-3">
    <h1>Resumo do pedido</h1>
    <div class="caixa-direita-cima">
        <div class="escrita1">
            <label>
                1 Produto<br>
                Frete
            </label>
        </div>

        <div class="escrita2">
            <label>
                R$ 150,00<br>
                <strong>Grátis!</strong>
            </label>
        </div>
    </div>

    <div class="caixa-direita-meio">
        <label class="escrita3"><strong>Total</strong></label>

        <div class="escrita4">
            <label>
                <strong>R$ 150,00</strong><br>
            </label>
            
            <p>Em até <span><strong>10x sem juros!</strong></span></p>
        </div>
    </div>

    <div class="caixa-direita-baixo">
        <a href="../../Identificação/Barcelona/indentifi.html"><strong>Continuar</strong></a>
        <p>Adicionar mais produtos</p>

        <br><br>

        <p>
            Possui cupom ou vale?<br>
            Você poderá usá-los na<br>
            Etapa de pagamento.
        </p>
    </div> -->