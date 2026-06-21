<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/aplicacaoDAL.php';
include_once __DIR__ . '/../../DAL/insumoDAL.php';
include_once __DIR__ . '/../../DAL/loteDAL.php';
include_once __DIR__ . '/../../DAL/usuarioDAL.php';

$id = $_GET['id'];

$dalAplicacao = new DAL\AplicacaoDAL();
$aplicacao = $dalAplicacao->SelectById($id);

$dalInsumo = new DAL\InsumoDAL();
$dalLote = new DAL\LoteDAL();
$dalUsuario = new DAL\UsuarioDAL();

$insumo = $dalInsumo->SelectById($aplicacao->getInsumoId());
$lote = $dalLote->SelectById($aplicacao->getLoteId());
$usuario = $dalUsuario->SelectById($aplicacao->getUsuarioId());
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes da Aplicação</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<body class="green lighten-5">
<div class="container">
    <h3>Detalhes da Aplicação</h3>

    <table class="striped">
        <tr><th>ID</th><td><?= $aplicacao->getId(); ?></td></tr>
        <tr><th>Data</th><td><?= $aplicacao->getDataAplicacao(); ?></td></tr>
        <tr><th>Quantidade utilizada</th><td><?= $aplicacao->getQuantidadeUtilizada(); ?></td></tr>
        <tr><th>Observação</th><td><?= $aplicacao->getObservacao(); ?></td></tr>
        <tr><th>Insumo</th><td><?= $insumo->getNome(); ?></td></tr>
        <tr><th>Lote</th><td><?= $lote->getNome(); ?></td></tr>
        <tr><th>Usuário</th><td><?= $usuario->getNome(); ?></td></tr>
    </table>

    <br>
    <a class="btn grey" href="lstAplicacao.php">Voltar</a>
</div>
</body>
</html>