<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/ALMIR.1PHP/DAL/usuarioDAL.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/ALMIR.1PHP/MODEL/usuario.php";

$usuario = new MODEL\Usuario();

$usuario->setId($_POST['id']);
$usuario->setNome($_POST['nome']);
$usuario->setEmail($_POST['email']);

if (!empty($_POST['senha'])) {
    $usuario->setSenha(password_hash($_POST['senha'], PASSWORD_DEFAULT));
} else {
    $usuario->setSenha($_POST['senha_atual']);
}

$usuario->setPerfil($_POST['perfil']);

$dalUsuario = new DAL\UsuarioDAL();
$dalUsuario->Update($usuario);

header("Location: lstUsuario.php");
exit;
?>