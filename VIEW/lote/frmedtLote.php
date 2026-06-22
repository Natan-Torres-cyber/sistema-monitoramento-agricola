<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/loteDAL.php';
include_once __DIR__ . '/../../MODEL/lote.php';

$id = (int) ($_GET['id'] ?? 0);

$dalLote = new DAL\LoteDAL();
$lote = $dalLote->SelectById($id);

if ($lote === null) {
    header("Location: lstLote.php");
    exit;
}

$tituloPagina = 'Editar Lote';

include __DIR__ . '/../../header.php';
?>
    <h3>Editar Lote</h3>
    <div class="card">
        <div class="card-content">
    <form action="opedtLote.php" method="post">
        <input type="hidden" name="id" value="<?= $lote->getId(); ?>">

        <div class="input-field">
            <input type="text" name="nome" id="nome" required value="<?= $lote->getNome(); ?>">
            <label class="active" for="nome">Nome do lote</label>
        </div>

        <div class="input-field">
            <input type="text" name="cultura" id="cultura" required value="<?= $lote->getCultura(); ?>">
            <label class="active" for="cultura">Cultura</label>
        </div>

        <div class="input-field">
            <input type="number" step="0.01" min="0" name="area_hectares" id="area_hectares" required value="<?= $lote->getAreaHectares(); ?>">
            <label class="active" for="area_hectares">Área em hectares</label>
        </div>

        <div class="input-field">
            <input type="text" name="localizacao" id="localizacao" value="<?= $lote->getLocalizacao(); ?>">
            <label class="active" for="localizacao">Localização</label>
        </div>

        <button class="btn orange" type="submit">Salvar alterações</button>
        <a class="btn grey" href="lstLote.php">Cancelar</a>
    </form>
        </div>
    </div>

<?php include __DIR__ . '/../../footer.php'; ?>
