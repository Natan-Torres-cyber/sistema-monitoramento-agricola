<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/aplicacaoDAL.php';
include_once __DIR__ . '/../../DAL/insumoDAL.php';
include_once __DIR__ . '/../../MODEL/aplicacao.php';

$quantidadeUtilizada = $_POST['quantidade_utilizada'] ?? '';

$dalInsumo = new DAL\InsumoDAL();
$insumo = $dalInsumo->SelectById((int) $_POST['insumo_id']);
if ($insumo === null) {
    header("Location: frmisAplicacao.php?erro=estoque");
    exit;
}

// não deixa aplicar mais do que tem em estoque
if (!is_numeric($quantidadeUtilizada) || $quantidadeUtilizada <= 0 || $quantidadeUtilizada > $insumo->getQuantidadeEstoque()) {
    header("Location: frmisAplicacao.php?erro=estoque");
    exit;
}

$aplicacao = new MODEL\Aplicacao();

$aplicacao->setDataAplicacao($_POST['data_aplicacao']);
$aplicacao->setQuantidadeUtilizada($quantidadeUtilizada);
$aplicacao->setObservacao($_POST['observacao'] ?? null);
$aplicacao->setInsumoId($_POST['insumo_id']);
$aplicacao->setLoteId($_POST['lote_id']);
$aplicacao->setUsuarioId($_POST['usuario_id']);

$dalAplicacao = new DAL\AplicacaoDAL();
$dalAplicacao->Insert($aplicacao);

// movimentação de estoque: desconta a quantidade usada do insumo
$insumo->setQuantidadeEstoque($insumo->getQuantidadeEstoque() - $quantidadeUtilizada);
$dalInsumo->Update($insumo);

header("Location: lstAplicacao.php");
exit;
?>