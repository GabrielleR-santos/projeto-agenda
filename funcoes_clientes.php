<?php

function obterClientes(PDO $pdo): array {
    
    $sql = "SELECT * FROM clientes";

    $stmt = $pdo->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);

    
}


function exibirTabelaClientes(array $clientes): void {
    if (empty($clientes)) {
        echo "<p>Nenhum cliente encontrado.</p>";
        return;
    }

    echo "<table>\n";
    echo "  <thead>\n";
    echo "    <tr><th>#</th><th>Nome</th><th>CPF</th><th>E-mail</th><th>Telefone</th><th>Endereço</th><th>Ações</th></tr>\n";
    echo "  </thead>\n";
    echo "  <tbody>\n";

    foreach ($clientes as $indice => $cliente) {
        $num   = $indice + 1;
        $id = $cliente['id'];
        $nome  = htmlspecialchars($cliente['nome']);
        $cpf  = htmlspecialchars($cliente['cpf']);
        $email = htmlspecialchars($cliente['email']);
        $fone  = htmlspecialchars($cliente['telefone']);
        $endereco  = htmlspecialchars($cliente['endereco']);


        echo "    <tr>\n";
        echo "      <td>{$num}</td>\n";
        echo "      <td>{$nome}</td>\n";
        echo "      <td>{$cpf}</td>\n";
        echo "      <td>{$email}</td>\n";
        echo "      <td>{$fone}</td>\n";
        echo "      <td>{$endereco}</td>\n";
        echo "      <td>
                    <a class='btn-novo-contato'href='editar_cliente.php?id={$id}'>Editar</a>
                    |
                    <a class='btn-novo-contato'href='excluir_cliente.php?id={$id}'
                    onclick=\"return confirm('Deseja excluir este cliente?')\">
                    Excluir
                    </a>
                    </td>\n";


        echo "    </tr>\n";
    }

    echo "  </tbody>\n";
    echo "</table>\n";
}




?>