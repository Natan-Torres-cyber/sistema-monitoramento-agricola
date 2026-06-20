<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/ALMIR.1PHP/DAL/aplicacaoDAL.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/ALMIR.1PHP/MODEL/aplicacao.php";

$aplicacao = new MODEL\Aplicacao();

$aplicacao->setId($_POST['id']);
$aplicacao->setDataAplicacao($_POST['data_aplicacao']);
$aplicacao->setQuantidadeUtilizada($_POST['quantidade_utilizada']);
$aplicacao->setObservacao($_POST['observacao'] ?? null);
$aplicacao->setInsumoId($_POST['insumo_id']);
$aplicacao->setLoteId($_POST['lote_id']);
$aplicacao->setUsuarioId($_POST['usuario_id']);

$dalAplicacao = new DAL\AplicacaoDAL();
$dalAplicacao->Update($aplicacao);

header("Location: lstAplicacao.php");
exit;
?>