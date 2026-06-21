<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once __DIR__ . '/DAL/usuarioDAL.php';
include_once __DIR__ . '/MODEL/usuario.php';

$email = trim($_POST['email'] ?? '');
$senha = $_POST['senha'] ?? '';

if (empty($email) || empty($senha)) {
    header("Location: login.php?erro=1");
    exit;
}

$dalUsuario = new DAL\UsuarioDAL();
$usuario = $dalUsuario->SelectByEmail($email);

if ($usuario && password_verify($senha, $usuario->getSenha())) {
    $_SESSION['usuario_id'] = $usuario->getId();
    $_SESSION['usuario_nome'] = $usuario->getNome();
    $_SESSION['usuario_perfil'] = $usuario->getPerfil();

    header("Location: index.php");
    exit;
}

header("Location: login.php?erro=1");
exit;
?>
