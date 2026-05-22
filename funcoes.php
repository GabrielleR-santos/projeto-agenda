<?php
// funcoes.php — funções reutilizáveis

/**
 * Retorna o array de contatos.
 * Em um projeto real, isso viria do banco de dados.
 */
function obterContatos(PDO $pdo): array {
    
    $sql = "SELECT * FROM contatos";

    $stmt = $pdo->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

    
}

/**
 * Renderiza a tabela HTML com a lista de contatos.
 */
function exibirTabelaContatos(array $contatos): void {
    if (empty($contatos)) {
        echo "<p>Nenhum contato encontrado.</p>";
        return;
    }

    echo "<table>\n";
    echo "  <thead>\n";
    echo "    <tr><th>#</th><th>Nome</th><th>E-mail</th><th>Telefone</th><th>Ações</th></tr>\n";
    echo "  </thead>\n";
    echo "  <tbody>\n";

    foreach ($contatos as $indice => $contato) {
        $num   = $indice + 1;
        $id = $contato['id'];
        $nome  = htmlspecialchars($contato['nome']);
        $email = htmlspecialchars($contato['email']);
        $fone  = htmlspecialchars($contato['telefone']);

        echo "    <tr>\n";
        echo "      <td>{$num}</td>\n";
        echo "      <td>{$nome}</td>\n";
        echo "      <td>{$email}</td>\n";
        echo "      <td>{$fone}</td>\n";
        echo "      <td>
                    <a class='btn-novo-contato'href='editar.php?id={$id}'>Editar</a>
                    |
                    <a class='btn-novo-contato'href='excluir.php?id={$id}'
                    onclick=\"return confirm('Deseja excluir este contato?')\">
                    Excluir
                    </a>
                    </td>\n";







        echo "    </tr>\n";
    }

    echo "  </tbody>\n";
    echo "</table>\n";
}
