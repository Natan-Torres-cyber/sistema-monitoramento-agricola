<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/ALMIR.1PHP/DAL/loteDAL.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/ALMIR.1PHP/MODEL/lote.php";

$lote = new MODEL\Lote();

$lote->setNome($_POST['nome']);
$lote->setCultura($_POST['cultura']);
$lote->setAreaHectares($_POST['area_hectares']);
$lote->setLocalizacao($_POST['localizacao'] ?? null);

$dalLote = new DAL\LoteDAL();
$dalLote->Insert($lote);

header("Location: lstLote.php");
exit;
?>