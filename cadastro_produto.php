<?php

require_once "config.php";
include "cabecalho.php";

?>


<div class="form-container">
    <h1>Cadastrar:</h1>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input id="nome" name="nome" type="text" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input id="descricao" name="descricao" type="text" required>

        </div>

        <div class="form-group">
            <label for="preco">Preço:</label>
            <input id="preco" name="preco" type="text" required>

        </div>

        <div class="form-group">
            <label for="estoque">Estoque:</label>

            <input id="estoque" name="estoque" type="number" required>
        </div>

        <div class="form-group">
            <label for="preco">Imagem:</label>
            <input id="img" name="img" type="file" required>

        </div>

        <button type="submit" class="btn-cadastrar" value="cadastrar">Cadastrar</button>
   
    </form>
</div>


<?php



if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$nome     = trim($_POST['nome'] 	?? '');
	$descricao    = trim($_POST['descricao']	?? '');
	$preco = trim($_POST['preco'] ?? '');
	$estoque = trim($_POST['estoque'] ?? '');

    $erro = "";

    if ($preco <= 0){
        $erro= "Preço inválido.";
    }elseif ($estoque < 0){

        $erro = "Estoque inválido.";

    }else{

        $nomeArquivo = null;

        if (!empty($_FILES['img']['name'])) {
            $extensao  = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
            
            $permitidos = ['jpg', 'jpeg', 'png', 'webp'];
         
            if (!in_array(strtolower($extensao), $permitidos)) {
                
                $erro = 'Tipo de imagem não permitido.';
            
            } else {
                $nomeArquivo = uniqid('prod_') . '.' . $extensao;
                
                move_uploaded_file($_FILES['img']['tmp_name'], 'uploads/' . $nomeArquivo);
            }
        }
        
    }

    var_dump($erro);
    
    if (!$erro) {

        $stmt = $pdo->prepare(

            

            "INSERT INTO produtos
            (nome, descricao, preco, estoque, img)
            VALUES (?, ?, ?, ?, ?)"
        );

        $stmt->execute([
            $nome,
            $descricao,
            $preco,
            $estoque,
            $nomeArquivo
        ]);

        header("Location: produtos.php");
        exit;
    }
}

 


?>