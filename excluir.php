<?php

require_once "config.php";

$id = $_GET['id'];

$stmt = $pdo->prepare(
    "DELETE FROM contatos WHERE id = ?"
);

$stmt->execute([$id]);

header("Location: index.php");
exit;
?>