<?php

function obterProdutos(PDO $pdo): array {
    
    $sql = "SELECT * FROM produtos";

    $stmt = $pdo->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

    
}


function exibirTabelaProdutos(array $produtos): void {
    if (empty($produtos)) {
        echo "<p>Nenhum produto encontrado.</p>";
        return;
    }

    echo "<table>\n";
    echo "  <thead>\n";
    echo "    <tr><th>#</th><th>Nome</th><th>Descrição</th><th>Preço</th><th>Estoque</th><th>Imagem</th></tr>\n";
    echo "  </thead>\n";
    echo "  <tbody>\n";

    foreach ($produtos as $indice => $produto) {
        $num   = $indice + 1;
        $id = $produto['id'];
        $nome  = htmlspecialchars($produto['nome']);
        $descricao  = htmlspecialchars($produto['descricao']);
        $preco = number_format($produto['preco'], 2, ',', '.');
        $estoque  = htmlspecialchars($produto['estoque']);
        $img  = htmlspecialchars($produto['img']);


        echo "    <tr>\n";
        echo "      <td>{$num}</td>\n";
        echo "      <td>{$nome}</td>\n";
        echo "      <td>{$descricao}</td>\n";
        echo "      <td>{$preco}</td>\n";
        echo "      <td>{$estoque}</td>\n";
        echo "      <td><img src='uploads/{$img}' width='80'></td>\n";



        echo "    </tr>\n";
    }

    echo "  </tbody>\n";
    echo "</table>\n";
}




?>