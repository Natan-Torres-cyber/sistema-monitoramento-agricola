<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/loteDAL.php';
include_once __DIR__ . '/../../MODEL/lote.php';

$dalLote = new DAL\LoteDAL();
$lstLote = $dalLote->Select();
$tituloPagina = 'Lotes';
include __DIR__ . '/../../header.php';
?>
<h3>Lista de Lotes</h3>
    <div class="card">
        <div class="card-content">
    <a class="btn green" href="frmisLote.php">Novo Lote</a>

    <table class="striped highlight responsive-table white z-depth-1" style="margin-top:25px;">
        <thead class="green lighten-4">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Cultura</th>
                <th>Área</th>
                <th>Localização</th>
                <th>Ações</th>
            </tr>
        </thead>

        <?php foreach ($lstLote as $lote) { ?>
            <tr>
                <td><?= $lote->getId(); ?></td>
                <td><?= $lote->getNome(); ?></td>
                <td><?= $lote->getCultura(); ?></td>
                <td><?= $lote->getAreaHectares(); ?></td>
                <td><?= $lote->getLocalizacao(); ?></td>
                <td>
                    <a class="btn-small orange" href="frmedtLote.php?id=<?= $lote->getId(); ?>">Editar</a>
                    <a class="btn-small blue" href="frmdetLote.php?id=<?= $lote->getId(); ?>">Detalhes</a>
                    <a class="btn-small red" onclick="remover(<?= $lote->getId(); ?>)">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>

<script>
function remover(id) {
    if (confirm("Deseja excluir o lote " + id + "?")) {
        location.href = "opremLote.php?id=" + id;
    }
}
</script>
        </div>
    </div>

<?php include __DIR__ . '/../../footer.php'; ?>