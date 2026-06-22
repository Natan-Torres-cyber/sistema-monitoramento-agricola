<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/usuarioDAL.php';
include_once __DIR__ . '/../../MODEL/usuario.php';

$dalUsuario = new DAL\UsuarioDAL();
$lstUsuario = $dalUsuario->Select();
$tituloPagina = 'Usuários';
include __DIR__ . '/../../header.php';
?>
<h3>Lista de Usuários</h3>
    <div class="card">
        <div class="card-content">
    <a class="btn green" href="frmisUsuario.php">Novo Usuário</a>

    <table class="striped highlight responsive-table white z-depth-1" style="margin-top:25px;">
        <thead class="green lighten-4">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Perfil</th>
                <th>Ações</th>
            </tr>
        </thead>

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

<script>
function remover(id) {
    if (confirm("Deseja excluir o usuário " + id + "?")) {
        location.href = "opremUsuario.php?id=" + id;
    }
}
</script>
        </div>
    </div>

<?php include __DIR__ . '/../../footer.php'; ?>