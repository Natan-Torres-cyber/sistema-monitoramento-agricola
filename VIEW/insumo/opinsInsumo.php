<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/ALMIR.1PHP/DAL/insumoDAL.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/ALMIR.1PHP/MODEL/insumo.php";

$insumo = new MODEL\Insumo();

$insumo->setNome($_POST['nome']);
$insumo->setTipo($_POST['tipo']);
$insumo->setUnidadeMedida($_POST['unidade_medida']);
$insumo->setQuantidadeEstoque($_POST['quantidade_estoque']);
$insumo->setImagem($_POST['imagem'] ?? null);

$dalInsumo = new DAL\InsumoDAL();
$dalInsumo->Insert($insumo);

header("Location: lstInsumo.php");
exit;
?>