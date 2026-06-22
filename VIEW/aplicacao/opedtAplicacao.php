<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/aplicacaoDAL.php';
include_once __DIR__ . '/../../DAL/insumoDAL.php';
include_once __DIR__ . '/../../MODEL/aplicacao.php';

$id = (int) $_POST['id'];
$quantidadeNova = $_POST['quantidade_utilizada'] ?? '';
$insumoIdNovo = (int) $_POST['insumo_id'];

$dalAplicacao = new DAL\AplicacaoDAL();
$dalInsumo = new DAL\InsumoDAL();

// pega os dados antigos pra poder desfazer a movimentação anterior
$aplicacaoAntiga = $dalAplicacao->SelectById($id);
if ($aplicacaoAntiga === null) {//MELHORANDO ADICIONADO
    header("Location: lstAplicacao.php");
    exit;
}
$insumoAntigo = $dalInsumo->SelectById((int) $aplicacaoAntiga->getInsumoId());

// devolve ao estoque a quantidade que tinha sido descontada antes
$insumoAntigo->setQuantidadeEstoque($insumoAntigo->getQuantidadeEstoque() + $aplicacaoAntiga->getQuantidadeUtilizada());
$dalInsumo->Update($insumoAntigo);

// pega o insumo novo (pode ser o mesmo ou outro) já com o estoque devolvido
$insumoNovo = $insumoIdNovo === (int) $insumoAntigo->getId()
    ? $insumoAntigo
    : $dalInsumo->SelectById($insumoIdNovo);

if (!is_numeric($quantidadeNova) || $quantidadeNova <= 0 || $quantidadeNova > $insumoNovo->getQuantidadeEstoque()) {
    header("Location: frmedtAplicacao.php?id=" . $id . "&erro=estoque");
    exit;
}

$aplicacao = new MODEL\Aplicacao();
$aplicacao->setId($id);
$aplicacao->setDataAplicacao($_POST['data_aplicacao']);
$aplicacao->setQuantidadeUtilizada($quantidadeNova);
$aplicacao->setObservacao($_POST['observacao'] ?? null);
$aplicacao->setInsumoId($insumoIdNovo);
$aplicacao->setLoteId($_POST['lote_id']);
$aplicacao->setUsuarioId($_POST['usuario_id']);

$dalAplicacao->Update($aplicacao);

// desconta a nova quantidade do insumo novo
$insumoNovo->setQuantidadeEstoque($insumoNovo->getQuantidadeEstoque() - $quantidadeNova);
$dalInsumo->Update($insumoNovo);

header("Location: lstAplicacao.php");
exit;
?>