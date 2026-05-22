<?php

require_once "config.php";
include "cabecalho.php";

?>


<div class="form-container">
    <h1>Cadastrar:</h1>
    <form method="POST">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input id="nome" name="nome" type="text" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input id="email" name="email" type="text" required>

        </div>

        <div class="form-group">
            <label for="telefone">Telefone:</label>
            <input id="telefone" name="telefone" type="text" required>

        </div>

        <button type="submit" class="btn-cadastrar" value="cadastrar">Cadastrar</button>
   
    </form>
</div>


<?php



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$nome     = trim($_POST['nome'] 	?? '');
	$email    = trim($_POST['email']	?? '');
	$telefone = trim($_POST['telefone'] ?? '');
 
	if ($nome && $email) {
    	$stmt = $pdo->prepare(
        	'INSERT INTO contatos (nome, email, telefone) VALUES (?, ?, ?)'
    	);
    	$stmt->execute([$nome, $email, $telefone]);
    	header('Location: index.php');
    	exit;
	
    } else {
        echo "Nome e email são obrigatórios";
    }
}



?>