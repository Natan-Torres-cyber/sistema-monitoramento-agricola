<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/insumoDAL.php';
include_once __DIR__ . '/../../MODEL/insumo.php';

$insumo = new MODEL\Insumo();

$insumo->setId($_POST['id']);
$insumo->setNome($_POST['nome']);
$insumo->setTipo($_POST['tipo']);
$insumo->setUnidadeMedida($_POST['unidade_medida']);
$insumo->setQuantidadeEstoque($_POST['quantidade_estoque']);
$insumo->setImagem($_POST['imagem'] ?? null);

$dalInsumo = new DAL\InsumoDAL();
$dalInsumo->Update($insumo);

header("Location: lstInsumo.php");
exit;
?>