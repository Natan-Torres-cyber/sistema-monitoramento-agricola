<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/loteDAL.php';

$id = $_GET['id'];

$dalLote = new DAL\LoteDAL();
$dalLote->Delete($id);

header("Location: lstLote.php");
echo "Olá, mundo!";
exit;
?>