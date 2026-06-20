<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/ALMIR.1PHP/DAL/loteDAL.php";

$id = $_GET['id'];

$dalLote = new DAL\LoteDAL();
$dalLote->Delete($id);

header("Location: lstLote.php");
exit;
?>