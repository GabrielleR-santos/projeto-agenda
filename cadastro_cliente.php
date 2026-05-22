<?php

require_once "config.php";
include "cabecalho.php";

$erro = "";

$nome = "";
$cpf = "";
$email = "";
$telefone = "";
$endereco = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	$nome     = trim($_POST['nome'] ?? '');
    $cpf      = trim($_POST['cpf'] ?? '');
	$email    = trim($_POST['email'] ?? '');
	$telefone = trim($_POST['telefone'] ?? '');
    $endereco = trim($_POST['endereco'] ?? '');
 
	if ($nome && $email) {

        if (!preg_match("/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/", $cpf)) {
            $erro = "CPF inválido. Use o formato 000.000.000-00";

        } else {

    	    $stmt = $pdo->prepare(
        	    'INSERT INTO clientes (nome, cpf, email, telefone, endereco)
                 VALUES (?, ?, ?, ?, ?)'
    	    );

    	    $stmt->execute([
                $nome,
                $cpf,
                $email,
                $telefone,
                $endereco
            ]);

    	    header('Location: clientes.php');
    	    exit;
        }

	} else {

        $erro = "Nome e email são obrigatórios";
    }
}


?>

<div class="form-container">

    <h1>Cadastrar Cliente:</h1>

    <?php if (!empty($erro)) : ?>

        <div class="msg-erro">
            <?= $erro ?>
        </div>

    <?php endif; ?>

    <form method="POST" novalidate>

        <div class="form-group">
            <label for="nome">Nome:</label>

            <input id="nome" name="nome" type="text" required value="<?= htmlspecialchars($nome) ?>">
        </div>

        <div class="form-group">
            <label for="cpf">CPF:</label>

            <input id="cpf" name="cpf" type="text" required value="<?= htmlspecialchars($cpf) ?>">
        </div>

        <div class="form-group">
            <label for="email">Email:</label>

            <input id="email" name="email" type="text" required value="<?= htmlspecialchars($email) ?>">
        </div>

        <div class="form-group">
            <label for="telefone">Telefone:</label>

            <input id="telefone" name="telefone" type="text" required value="<?= htmlspecialchars($telefone) ?>">
        </div>

        <div class="form-group">
            <label for="endereco">Endereço:</label>

            <input id="endereco" name="endereco" type="text" required value="<?= htmlspecialchars($endereco) ?>">
        </div>

        <button type="submit" class="btn-cadastrar">Cadastrar</button>

    </form>

</div>
























