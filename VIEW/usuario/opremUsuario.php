<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/usuarioDAL.php';

$id = $_GET['id'];

$dalUsuario = new DAL\UsuarioDAL();
$dalUsuario->Delete($id);

header("Location: lstUsuario.php");
exit;
?>