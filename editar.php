<?php

require_once "config.php";
include "cabecalho.php";

$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM contatos WHERE id = ?");
$stmt->execute([$id]);

$contato = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $telefone = trim($_POST['telefone']);

    $update = $pdo->prepare(
        "UPDATE contatos
         SET nome = ?, email = ?, telefone = ?
         WHERE id = ?"
    );

    $update->execute([$nome, $email, $telefone, $id]);

    header("Location: index.php");
    exit;
}
?>

<div class="form-container">
    <h1>Editar:</h1>
    <form method="POST">

    <div class="form-group">
        <input type="text" name="nome"
        value="<?= $contato['nome'] ?>">
    </div>

    <div class="form-group">
        <input type="text" name="email"
        value="<?= $contato['email'] ?>">
    </div>

    
    <div class="form-group">
        <input type="text" name="telefone"
        value="<?= $contato['telefone'] ?>">
    </div>
    

    <button type="submit" class="btn-cadastrar">
        Salvar
    </button>

    </form>
</div>



