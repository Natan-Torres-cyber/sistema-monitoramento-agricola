<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/loteDAL.php';
include_once __DIR__ . '/../../MODEL/lote.php';

$id = $_GET['id'];

$dalLote = new DAL\LoteDAL();
$lote = $dalLote->SelectById($id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Lote</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body class="green lighten-5">

<div class="container">
    <h3>Detalhes do Lote</h3>

    <table class="striped">
        <tr><th>ID</th><td><?= $lote->getId(); ?></td></tr>
        <tr><th>Nome</th><td><?= $lote->getNome(); ?></td></tr>
        <tr><th>Cultura</th><td><?= $lote->getCultura(); ?></td></tr>
        <tr><th>Área em hectares</th><td><?= $lote->getAreaHectares(); ?></td></tr>
        <tr><th>Localização</th><td><?= $lote->getLocalizacao(); ?></td></tr>
    </table>

    <br>
    <a class="btn grey" href="lstLote.php">Voltar</a>
</div>

</body>
</html>