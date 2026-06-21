<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/loteDAL.php';
include_once __DIR__ . '/../../MODEL/lote.php';

$lote = new MODEL\Lote();

$lote->setId($_POST['id']);
$lote->setNome($_POST['nome']);
$lote->setCultura($_POST['cultura']);
$lote->setAreaHectares($_POST['area_hectares']);
$lote->setLocalizacao($_POST['localizacao'] ?? null);

$dalLote = new DAL\LoteDAL();
$dalLote->Update($lote);

header("Location: lstLote.php");
exit;
?>