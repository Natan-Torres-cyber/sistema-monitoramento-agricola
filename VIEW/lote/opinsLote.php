<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/loteDAL.php';
include_once __DIR__ . '/../../MODEL/lote.php';

$nome = trim($_POST['nome'] ?? '');
$cultura = trim($_POST['cultura'] ?? '');
$areaHectares = $_POST['area_hectares'] ?? '';

if (empty($nome) || empty($cultura) || !is_numeric($areaHectares) || $areaHectares <= 0) {
    header("Location: frmisLote.php?erro=1");
    exit;
}

$lote = new MODEL\Lote();

$lote->setNome($nome);
$lote->setCultura($cultura);
$lote->setAreaHectares($areaHectares);
$lote->setLocalizacao($_POST['localizacao'] ?? null);

$dalLote = new DAL\LoteDAL();
$dalLote->Insert($lote);

header("Location: lstLote.php");
exit;
?>