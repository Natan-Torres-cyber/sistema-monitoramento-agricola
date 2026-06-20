<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/ALMIR.1PHP/DAL/usuarioDAL.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/ALMIR.1PHP/MODEL/usuario.php";

$usuario = new MODEL\Usuario();

$usuario->setNome($_POST['nome']);
$usuario->setEmail($_POST['email']);
$usuario->setSenha(password_hash($_POST['senha'], PASSWORD_DEFAULT));
$usuario->setPerfil($_POST['perfil']);

$dalUsuario = new DAL\UsuarioDAL();
$dalUsuario->Insert($usuario);

header("Location: lstUsuario.php");
exit;
?>