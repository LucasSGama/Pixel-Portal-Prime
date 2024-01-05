<?php
// Verifica se o botão "Sair" foi clicado
if (isset($_GET['sair'])) {
    // Destrói a sessão
    session_destroy();

    // Redireciona para a página de login (ou qualquer outra página desejada)
    header("Location: ../index.php");
    exit();
}
?>

<header class="container-fluid">
        <div class="row head">
            <div class="col-md-3 logo">
                <a href="../Home/home-foda.php"><img src="../Imagens-não-oficiais/loguinho.png" alt="logo" width="200px"></a>
            </div>
            <div class="col-md-6 interacoes1">
                <input class="form-control barra-de-pesquisa" type="text" placeholder="O que você procura?">
            </div>
            <div class="col-md-3 interacoes2">
                <a href="../Carrinho/carrinho.php"><button class="btn btn-light carrinho"><img src="../Imagens-não-oficiais/cart.svg" alt="" height="30px" width="35px"></button></a>
                <li class="nav-item dropdown btn perfil">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="../Imagens-não-oficiais/person.svg" alt="" height="30px" width="35px"></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="../Perfil/perfil.php">Perfil</a></li>
                        <li><a class="dropdown-item" href="../Comunidade/comunidade.php">Comunidade</a></li>
                        <li><a class="dropdown-item" href="?sair">Sair</a></li>
                    </ul>
                </li>
            </div>
        </div>
    </header>
