<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/usuarioDAL.php';
include_once __DIR__ . '/../../MODEL/usuario.php';

$dalUsuario = new DAL\UsuarioDAL();
$lstUsuario = $dalUsuario->Select();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listar Usuários</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body class="green lighten-5">

<div class="container">
    <p><a href="../../index.php">&larr; Menu Principal</a></p>
    <h3>Lista de Usuários</h3>

    <a class="btn green" href="frmisUsuario.php">Novo Usuário</a>

    <table class="striped responsive-table">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Perfil</th>
            <th>Ações</th>
        </tr>

        <?php foreach ($lstUsuario as $usuario) { ?>
            <tr>
                <td><?= $usuario->getId(); ?></td>
                <td><?= $usuario->getNome(); ?></td>
                <td><?= $usuario->getEmail(); ?></td>
                <td><?= $usuario->getPerfil(); ?></td>
                <td>
                    <a class="btn-small orange" href="frmedtUsuario.php?id=<?= $usuario->getId(); ?>">Editar</a>
                    <a class="btn-small blue" href="frmdetUsuario.php?id=<?= $usuario->getId(); ?>">Detalhes</a>
                    <a class="btn-small red" onclick="remover(<?= $usuario->getId(); ?>)">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<script>
function remover(id) {
    if (confirm("Deseja excluir o usuário " + id + "?")) {
        location.href = "opremUsuario.php?id=" + id;
    }
}
</script>

</body>
</html>