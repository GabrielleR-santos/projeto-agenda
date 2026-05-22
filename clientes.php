<?php
// index.php — página principal

require_once "config.php";    // erro fatal se não encontrar
include      "cabecalho.php"; // warning se não encontrar
include_once "funcoes_clientes.php";   // inclui apenas uma vez



?>

<main>
    <a href="cadastro_cliente.php" class="btn-novo-contato">+ Novo Cliente</a>
    <?php
    
    $clientes = obterClientes($pdo);
    exibirTabelaClientes($clientes);
    
    ?>




</main>

<?php

include "rodape.php";

?>

</body>
</html>
