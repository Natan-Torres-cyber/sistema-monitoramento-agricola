<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/usuarioDAL.php';
include_once __DIR__ . '/../../MODEL/usuario.php';

$id = $_GET['id'];

$dalUsuario = new DAL\UsuarioDAL();
$usuario = $dalUsuario->SelectById($id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Usuário</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body class="green lighten-5">

<div class="container">
    <h3>Detalhes do Usuário</h3>

    <table class="striped">
        <tr><th>ID</th><td><?= $usuario->getId(); ?></td></tr>
        <tr><th>Nome</th><td><?= $usuario->getNome(); ?></td></tr>
        <tr><th>E-mail</th><td><?= $usuario->getEmail(); ?></td></tr>
        <tr><th>Perfil</th><td><?= $usuario->getPerfil(); ?></td></tr>
    </table>

    <br>
    <a class="btn grey" href="lstUsuario.php">Voltar</a>
</div>

</body>
</html>