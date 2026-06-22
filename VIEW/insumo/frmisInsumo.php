<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Insumo</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<body class="green lighten-5">

<div class="container">
    <h3>Cadastrar Insumo</h3>

    <?php if (isset($_GET['erro'])) { ?>
        <p class="red-text">Preencha nome, tipo, unidade e uma quantidade válida.</p>
    <?php } ?>

    <form action="opinsInsumo.php" method="post">

        <div class="input-field">
            <input type="text" name="nome" id="nome" required>
            <label class="active" for="nome">Nome do insumo</label>
        </div>

        <div class="input-field">
            <input type="text" name="tipo" id="tipo" required>
            <label class="active" for="tipo">Tipo</label>
        </div>

        <div class="input-field">
            <input type="text" name="unidade_medida" id="unidade_medida" required>
            <label class="active" for="unidade_medida">Unidade de medida</label>
        </div>

        <div class="input-field">
            <input type="number" step="0.01" min="0" name="quantidade_estoque" id="quantidade_estoque" required>
            <label class="active" for="quantidade_estoque">Quantidade em estoque</label>
        </div>

        <div class="input-field">
            <input type="text" name="imagem" id="imagem">
            <label class="active" for="imagem">URL da imagem (opcional)</label>
        </div>

        <button class="btn green" type="submit">Salvar</button>
        <a class="btn grey" href="lstInsumo.php">Cancelar</a>
    </form>
</div>

</body>
</html>