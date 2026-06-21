<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/insumoDAL.php';
include_once __DIR__ . '/../../MODEL/insumo.php';

$nome = trim($_POST['nome'] ?? '');
$tipo = trim($_POST['tipo'] ?? '');
$unidadeMedida = trim($_POST['unidade_medida'] ?? '');
$quantidadeEstoque = $_POST['quantidade_estoque'] ?? '';

if (empty($nome) || empty($tipo) || empty($unidadeMedida) || !is_numeric($quantidadeEstoque) || $quantidadeEstoque < 0) {
    header("Location: frmisInsumo.php?erro=1");
    exit;
}

$insumo = new MODEL\Insumo();

$insumo->setNome($nome);
$insumo->setTipo($tipo);
$insumo->setUnidadeMedida($unidadeMedida);
$insumo->setQuantidadeEstoque($quantidadeEstoque);
$insumo->setImagem($_POST['imagem'] ?? null);

$dalInsumo = new DAL\InsumoDAL();
$dalInsumo->Insert($insumo);

header("Location: lstInsumo.php");
exit;
?>