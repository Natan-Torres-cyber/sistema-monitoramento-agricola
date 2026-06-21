<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/aplicacaoDAL.php';
include_once __DIR__ . '/../../DAL/insumoDAL.php';
include_once __DIR__ . '/../../DAL/loteDAL.php';
include_once __DIR__ . '/../../DAL/usuarioDAL.php';

$id = $_GET['id'];

$dalAplicacao = new DAL\AplicacaoDAL();
$aplicacao = $dalAplicacao->SelectById($id);

$dalInsumo = new DAL\InsumoDAL();
$dalLote = new DAL\LoteDAL();
$dalUsuario = new DAL\UsuarioDAL();

$lstInsumo = $dalInsumo->Select();
$lstLote = $dalLote->Select();
$lstUsuario = $dalUsuario->Select();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Aplicação</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<body class="green lighten-5">
<div class="container">
    <h3>Editar Aplicação</h3>

    <?php if (isset($_GET['erro']) && $_GET['erro'] === 'estoque') { ?>
        <p class="red-text">Quantidade inválida ou maior do que o estoque disponível desse insumo.</p>
    <?php } ?>

    <form action="opedtAplicacao.php" method="post">
        <input type="hidden" name="id" value="<?= $aplicacao->getId(); ?>">

        <div class="input-field">
            <input type="date" name="data_aplicacao" id="data_aplicacao" required
                   value="<?= $aplicacao->getDataAplicacao(); ?>">
            <label class="active" for="data_aplicacao">Data da aplicação</label>
        </div>

        <div class="input-field">
            <input type="number" step="0.01" min="0" name="quantidade_utilizada"
                   id="quantidade_utilizada" required
                   value="<?= $aplicacao->getQuantidadeUtilizada(); ?>">
            <label class="active" for="quantidade_utilizada">Quantidade utilizada</label>
        </div>

        <div class="input-field">
            <textarea name="observacao" id="observacao" class="materialize-textarea"><?= $aplicacao->getObservacao(); ?></textarea>
            <label class="active" for="observacao">Observação</label>
        </div>

        <div class="input-field">
            <select name="insumo_id" required>
                <?php foreach ($lstInsumo as $insumo) { ?>
                    <option value="<?= $insumo->getId(); ?>"
                        <?= $insumo->getId() == $aplicacao->getInsumoId() ? 'selected' : ''; ?>>
                        <?= $insumo->getNome(); ?>
                    </option>
                <?php } ?>
            </select>
            <label>Insumo</label>
        </div>

        <div class="input-field">
            <select name="lote_id" required>
                <?php foreach ($lstLote as $lote) { ?>
                    <option value="<?= $lote->getId(); ?>"
                        <?= $lote->getId() == $aplicacao->getLoteId() ? 'selected' : ''; ?>>
                        <?= $lote->getNome(); ?> - <?= $lote->getCultura(); ?>
                    </option>
                <?php } ?>
            </select>
            <label>Lote</label>
        </div>

        <div class="input-field">
            <select name="usuario_id" required>
                <?php foreach ($lstUsuario as $usuario) { ?>
                    <option value="<?= $usuario->getId(); ?>"
                        <?= $usuario->getId() == $aplicacao->getUsuarioId() ? 'selected' : ''; ?>>
                        <?= $usuario->getNome(); ?>
                    </option>
                <?php } ?>
            </select>
            <label>Usuário</label>
        </div>

        <button class="btn orange" type="submit">Salvar alterações</button>
        <a class="btn grey" href="lstAplicacao.php">Cancelar</a>
    </form>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    M.FormSelect.init(document.querySelectorAll('select'));
});
</script>
</body>
</html>