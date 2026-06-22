<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/insumoDAL.php';
include_once __DIR__ . '/../../DAL/loteDAL.php';
include_once __DIR__ . '/../../DAL/usuarioDAL.php';

$dalInsumo = new DAL\InsumoDAL();
$dalLote = new DAL\LoteDAL();
$dalUsuario = new DAL\UsuarioDAL();

$lstInsumo = $dalInsumo->Select();
$lstLote = $dalLote->Select();
$lstUsuario = $dalUsuario->Select();
$tituloPagina = 'Cadastrar Aplicação';
include __DIR__ . '/../../header.php';
?>
    <h3 class="green-text text-darken-3">Cadastrar Aplicação</h3>
    <div class="card">
        <div class="card-content">
    <?php if (isset($_GET['erro']) && $_GET['erro'] === 'estoque') { ?>
        <div class="card-panel red lighten-4 red-text text-darken-4">
            <p class="red-text">Quantidade inválida ou maior do que o estoque disponível desse insumo.</p>
        </div>
    <?php } ?>
    
    <form action="opinsAplicacao.php" method="post">

        <div class="input-field">
            <input type="date" name="data_aplicacao" id="data_aplicacao" required>
            <label class="active" for="data_aplicacao">Data da aplicação</label>
        </div>

        <div class="input-field">
            <input type="number" step="0.01" min="0" name="quantidade_utilizada" id="quantidade_utilizada" required>
            <label for="quantidade_utilizada">Quantidade utilizada</label>
        </div>

        <div class="input-field">
            <textarea name="observacao" id="observacao" class="materialize-textarea"></textarea>
            <label for="observacao">Observação</label>
        </div>

        <div class="input-field">
            <select name="insumo_id" required>
                <option value="" disabled selected>Selecione o insumo</option>
                <?php foreach ($lstInsumo as $insumo) { ?>
                    <option value="<?= $insumo->getId(); ?>">
                        <?= $insumo->getNome(); ?> - Estoque: <?= $insumo->getQuantidadeEstoque(); ?>
                    </option>
                <?php } ?>
            </select>
            <label>Insumo</label>
        </div>

        <div class="input-field">
            <select name="lote_id" required>
                <option value="" disabled selected>Selecione o lote</option>
                <?php foreach ($lstLote as $lote) { ?>
                    <option value="<?= $lote->getId(); ?>">
                        <?= $lote->getNome(); ?> - <?= $lote->getCultura(); ?>
                    </option>
                <?php } ?>
            </select>
            <label>Lote</label>
        </div>

        <div class="input-field">
            <select name="usuario_id" required>
                <option value="" disabled selected>Selecione o usuário</option>
                <?php foreach ($lstUsuario as $usuario) { ?>
                    <option value="<?= $usuario->getId(); ?>">
                        <?= $usuario->getNome(); ?> - <?= $usuario->getPerfil(); ?>
                    </option>
                <?php } ?>
            </select>
            <label>Usuário</label>
        </div>

        <button class="btn green" type="submit">Salvar</button>
        <a class="btn grey" href="lstAplicacao.php">Cancelar</a>
    </form>
        </div>
    </div>

<?php include __DIR__ . '/../../footer.php'; ?>
