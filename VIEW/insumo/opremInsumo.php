<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/insumoDAL.php';

$id = $_GET['id'];

$dalInsumo = new DAL\InsumoDAL();
$dalInsumo->Delete($id);

header("Location: lstInsumo.php");
exit;
?>