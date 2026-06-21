<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/usuarioDAL.php';
include_once __DIR__ . '/../../MODEL/usuario.php';

$nome = trim($_POST['nome'] ?? '');
$email = trim($_POST['email'] ?? '');
$senha = $_POST['senha'] ?? '';
$perfil = trim($_POST['perfil'] ?? '');

if (empty($nome) || empty($perfil) || !filter_var($email, FILTER_VALIDATE_EMAIL) || strlen($senha) < 4) {
    header("Location: frmisUsuario.php?erro=1");
    exit;
}

$usuario = new MODEL\Usuario();

$usuario->setNome($nome);
$usuario->setEmail($email);
$usuario->setSenha(password_hash($senha, PASSWORD_DEFAULT));
$usuario->setPerfil($perfil);

$dalUsuario = new DAL\UsuarioDAL();
$dalUsuario->Insert($usuario);

header("Location: lstUsuario.php");
exit;
?>