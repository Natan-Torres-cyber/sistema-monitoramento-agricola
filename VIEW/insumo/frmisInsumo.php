<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
$tituloPagina = 'Cadastrar Insumo';
include __DIR__ . '/../../header.php';
?>
    <h3>Cadastrar Insumo</h3>
    <div class="card">
        <div class="card-content">
    <?php if (isset($_GET['erro'])) { ?>
        <p class="red-text">Preencha nome, tipo, unidade e uma quantidade válida.</p>
    <?php } ?>

    <form action="opinsInsumo.php" method="post">

        <div class="input-field">
            <input type="text" name="nome" id="nome" required>
            <label for="nome">Nome do insumo</label>
        </div>

        <div class="input-field">
            <input type="text" name="tipo" id="tipo" required>
            <label for="tipo">Tipo</label>
        </div>

        <div class="input-field">
            <input type="text" name="unidade_medida" id="unidade_medida" required>
            <label for="unidade_medida">Unidade de medida</label>
        </div>

        <div class="input-field">
            <input type="number" step="0.01" min="0" name="quantidade_estoque" id="quantidade_estoque" required>
            <label for="quantidade_estoque">Quantidade em estoque</label>
        </div>

        <div class="input-field">
            <input type="text" name="imagem" id="imagem">
            <label for="imagem">URL da imagem (opcional)</label>
        </div>

        <button class="btn green" type="submit">Salvar</button>
        <a class="btn grey" href="lstInsumo.php">Cancelar</a>
    </form>
        </div>
    </div>

<?php include __DIR__ . '/../../footer.php'; ?>
