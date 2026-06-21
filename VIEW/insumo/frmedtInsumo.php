<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/insumoDAL.php';
include_once __DIR__ . '/../../MODEL/insumo.php';

$id = $_GET['id'];

$dalInsumo = new DAL\InsumoDAL();
$insumo = $dalInsumo->SelectById($id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Insumo</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<body class="green lighten-5">

<div class="container">
    <h3>Editar Insumo</h3>

    <form action="opedtInsumo.php" method="post">

        <input type="hidden" name="id" value="<?php echo $insumo->getId(); ?>">

        <div class="input-field">
            <input type="text" name="nome" id="nome" required
                   value="<?php echo $insumo->getNome(); ?>">
            <label class="active" for="nome">Nome do insumo</label>
        </div>

        <div class="input-field">
            <input type="text" name="tipo" id="tipo" required
                   value="<?php echo $insumo->getTipo(); ?>">
            <label class="active" for="tipo">Tipo</label>
        </div>

        <div class="input-field">
            <input type="text" name="unidade_medida" id="unidade_medida" required
                   value="<?php echo $insumo->getUnidadeMedida(); ?>">
            <label class="active" for="unidade_medida">Unidade de medida</label>
        </div>

        <div class="input-field">
            <input type="number" step="0.01" min="0"
                   name="quantidade_estoque" id="quantidade_estoque" required
                   value="<?php echo $insumo->getQuantidadeEstoque(); ?>">
            <label class="active" for="quantidade_estoque">Quantidade em estoque</label>
        </div>

        <div class="input-field">
            <input type="text" name="imagem" id="imagem"
                   value="<?php echo $insumo->getImagem(); ?>">
            <label class="active" for="imagem">URL da imagem</label>
        </div>

        <button class="btn orange" type="submit">Salvar alterações</button>
        <a class="btn grey" href="lstInsumo.php">Cancelar</a>
    </form>
</div>

</body>
</html>