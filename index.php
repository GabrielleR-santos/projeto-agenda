<?php
// index.php — página principal

require_once "config.php";    // erro fatal se não encontrar
include      "cabecalho.php"; // warning se não encontrar
include_once "funcoes.php";   // inclui apenas uma vez



?>

<main>
    <a href="cadastro_contato.php" class="btn-novo-contato">+ Novo Contato</a>

    <?php
    
    $contatos = obterContatos($pdo);
    exibirTabelaContatos($contatos);
    
    ?>




</main>

<?php

include "rodape.php";

?>

</body>
</html>
