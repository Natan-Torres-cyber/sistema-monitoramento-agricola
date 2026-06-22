<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/aplicacaoDAL.php';
include_once __DIR__ . '/../../DAL/insumoDAL.php';

$id = (int) $_GET['id'];

$dalAplicacao = new DAL\AplicacaoDAL();
$dalInsumo = new DAL\InsumoDAL();

// devolve a quantidade pro estoque do insumo antes de excluir
$aplicacao = $dalAplicacao->SelectById($id);
if ($aplicacao === null) {
    header("Location: lstAplicacao.php");
    exit;
}
$insumo = $dalInsumo->SelectById((int) $aplicacao->getInsumoId());

$insumo->setQuantidadeEstoque($insumo->getQuantidadeEstoque() + $aplicacao->getQuantidadeUtilizada());
$dalInsumo->Update($insumo);

$dalAplicacao->Delete($id);

header("Location: lstAplicacao.php");
exit;
?>