<?php

require_once "config.php";
include "cabecalho.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM clientes WHERE id = ?");
$stmt->execute([$id]);

$cliente = $stmt->fetch();

$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome']);
    $cpf = trim($_POST['cpf']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);
    $endereco = trim($_POST['endereco']);

    if (!$nome || !$email) {

        $erro = "Nome e email são obrigatórios.";

    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {

        $erro = "Email inválido.";

    } elseif (!preg_match("/^\d{3}\.\d{3}\.\d{3}\-\d{2}$/", $cpf)) {

        $erro = "CPF inválido. Use o formato 000.000.000-00";

    } else {

        $update = $pdo->prepare(
            "UPDATE clientes
             SET nome = ?, cpf = ?, email = ?, telefone = ?, endereco = ?
             WHERE id = ?"
        );

        $update->execute([
            $nome,$cpf,$email,$telefone,$endereco,$id
        ]);

        header("Location: clientes.php");
        exit;
    }
}
?>

<div class="form-container">
    <h1>Editar:</h1>

    <?php if (!empty($erro)) : ?>

        <div class="msg-erro">
            <?= $erro ?>
        </div>

    <?php endif; ?>
    
    <form method="POST">

    <div class="form-group">
        <input type="text" name="nome"
        value="<?= $cliente['nome'] ?>">
    </div>

    <div class="form-group">
        <input type="text" name="cpf"
        value="<?= $cliente['cpf'] ?>">
    </div>

    <div class="form-group">
        <input type="text" name="email"
        value="<?= $cliente['email'] ?>">
    </div>

    
    <div class="form-group">
        <input type="text" name="telefone"
        value="<?= $cliente['telefone'] ?>">
    </div>

    <div class="form-group">
        <input type="text" name="endereco"
        value="<?= $cliente['endereco'] ?>">
    </div>
    

    <button type="submit" class="btn-cadastrar">
        Salvar
    </button>

    </form>
</div>



