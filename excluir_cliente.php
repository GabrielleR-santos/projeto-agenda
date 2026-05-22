<?php

require_once "config.php";

$id = $_GET['id'];

$stmt = $pdo->prepare(
    "DELETE FROM clientes WHERE id = ?"
);

$stmt->execute([$id]);

header("Location: clientes.php");
exit;
?>