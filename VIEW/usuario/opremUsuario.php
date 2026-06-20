<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/ALMIR.1PHP/DAL/usuarioDAL.php";

$id = $_GET['id'];

$dalUsuario = new DAL\UsuarioDAL();
$dalUsuario->Delete($id);

header("Location: lstUsuario.php");
exit;
?>