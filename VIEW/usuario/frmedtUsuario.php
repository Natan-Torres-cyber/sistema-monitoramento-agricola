<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/usuarioDAL.php';
include_once __DIR__ . '/../../MODEL/usuario.php';

$id = (int) ($_GET['id'] ?? 0);

$dalUsuario = new DAL\UsuarioDAL();
$usuario = $dalUsuario->SelectById($id);

if ($usuario === null) {
    header("Location: lstUsuario.php");
    exit;
}

$tituloPagina = 'Editar Usuário';

include __DIR__ . '/../../header.php';
?>
    <h3>Editar Usuário</h3>
    <div class="card">
        <div class="card-content">
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
    </div>

<?php include __DIR__ . '/../../footer.php'; ?>
