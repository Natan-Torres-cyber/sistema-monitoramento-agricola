<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
$tituloPagina = 'Cadastrar Lote';
include __DIR__ . '/../../header.php';
?>
    <h3>Cadastrar Lote</h3>
    <div class="card">
        <div class="card-content">
    <?php if (isset($_GET['erro'])) { ?>
        <p class="red-text">Preencha nome, cultura e uma área válida.</p>
    <?php } ?>

    <form action="opinsLote.php" method="post">
        <div class="input-field">
            <input type="text" name="nome" id="nome" required>
            <label for="nome">Nome do lote</label>
        </div>

        <div class="input-field">
            <input type="text" name="cultura" id="cultura" required>
            <label for="cultura">Cultura</label>
        </div>

        <div class="input-field">
            <input type="number" step="0.01" min="0" name="area_hectares" id="area_hectares" required>
            <label for="area_hectares">Área em hectares</label>
        </div>

        <div class="input-field">
            <input type="text" name="localizacao" id="localizacao">
            <label for="localizacao">Localização</label>
        </div>

        <button class="btn green" type="submit">Salvar</button>
        <a class="btn grey" href="lstLote.php">Cancelar</a>
    </form>
        </div>
    </div>

<?php include __DIR__ . '/../../footer.php'; ?>