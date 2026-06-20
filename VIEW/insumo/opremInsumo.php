<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/ALMIR.1PHP/DAL/insumoDAL.php";

$id = $_GET['id'];

$dalInsumo = new DAL\InsumoDAL();
$dalInsumo->Delete($id);

header("Location: lstInsumo.php");
exit;
?>