<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/ALMIR.1PHP/DAL/usuarioDAL.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/ALMIR.1PHP/MODEL/usuario.php";

$id = $_GET['id'];

$dalUsuario = new DAL\UsuarioDAL();
$usuario = $dalUsuario->SelectById($id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body class="green lighten-5">

<div class="container">
    <h3>Editar Usuário</h3>

    <form action="opedtUsuario.php" method="post">
        <input type="hidden" name="id" value="<?= $usuario->getId(); ?>">
        <input type="hidden" name="senha_atual" value="<?= $usuario->getSenha(); ?>">

        <div class="input-field">
            <input type="text" name="nome" id="nome" required value="<?= $usuario->getNome(); ?>">
            <label class="active" for="nome">Nome</label>
        </div>

        <div class="input-field">
            <input type="email" name="email" id="email" required value="<?= $usuario->getEmail(); ?>">
            <label class="active" for="email">E-mail</label>
        </div>

        <div class="input-field">
            <input type="password" name="senha" id="senha">
            <label for="senha">Nova senha, deixe em branco para manter</label>
        </div>

        <div class="input-field">
            <input type="text" name="perfil" id="perfil" required value="<?= $usuario->getPerfil(); ?>">
            <label class="active" for="perfil">Perfil</label>
        </div>

        <button class="btn orange" type="submit">Salvar alterações</button>
        <a class="btn grey" href="lstUsuario.php">Cancelar</a>
    </form>
</div>

</body>
</html>