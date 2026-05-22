<?php
// index.php — página principal

require_once "config.php";    // erro fatal se não encontrar
include      "cabecalho.php"; // warning se não encontrar
include_once "funcoes_produtos.php";   // inclui apenas uma vez



?>

<main>
    <a href="cadastro_produto.php" class="btn-novo-contato">+ Novo Produto</a>
    <?php
    
    $produtos = obterProdutos($pdo);
    exibirTabelaProdutos($produtos);
    
    ?>



</main>

<?php

include "rodape.php";

?>

</body>
</html>
