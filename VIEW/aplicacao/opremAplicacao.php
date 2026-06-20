<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/ALMIR.1PHP/DAL/aplicacaoDAL.php";

$id = $_GET['id'];

$dalAplicacao = new DAL\AplicacaoDAL();
$dalAplicacao->Delete($id);

header("Location: lstAplicacao.php");
exit;
?>