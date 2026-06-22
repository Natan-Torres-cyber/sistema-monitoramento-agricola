<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/insumoDAL.php';
include_once __DIR__ . '/../../MODEL/insumo.php';

$dalInsumo = new DAL\InsumoDAL();
$lstInsumo = $dalInsumo->Select();
$tituloPagina = 'Insumos';
include __DIR__ . '/../../header.php';
?>
<h3>Lista de Insumos</h3>
    <div class="card">
        <div class="card-content">
    <a class="btn green" href="frmisInsumo.php">
        <i class="material-icons right">add</i>
        Novo Insumo
    </a>

    <table class="striped highlight responsive-table white z-depth-1" style="margin-top:25px;">
        <thead class="green lighten-4">
            <tr>
                <th>ID</th>
                <th>Imagem</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Unidade</th>
                <th>Estoque</th>
                <th>Ações</th>
            </tr>
        </thead>

        <?php foreach ($lstInsumo as $insumo) { ?>
            <tr>
                <td><?php echo $insumo->getId(); ?></td>
                <td>
                    <?php if (!empty($insumo->getImagem())) { ?>
                        <img src="<?php echo htmlspecialchars($insumo->getImagem()); ?>" alt="<?php echo htmlspecialchars($insumo->getNome()); ?>" style="width:50px; height:50px; object-fit:cover; border-radius:4px;" onerror="this.style.display='none';">
                    <?php } ?>
                </td>
                <td><?php echo $insumo->getNome(); ?></td>
                <td><?php echo $insumo->getTipo(); ?></td>
                <td><?php echo $insumo->getUnidadeMedida(); ?></td>
                <td><?php echo $insumo->getQuantidadeEstoque(); ?></td>
                <td>
                    <a class="btn-small orange" href="frmedtInsumo.php?id=<?php echo $insumo->getId(); ?>">Editar</a>

                    <a class="btn-small blue" href="frmdetInsumo.php?id=<?php echo $insumo->getId(); ?>">Detalhes</a>

                    <a class="btn-small red" onclick="remover(<?php echo $insumo->getId(); ?>)">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>

<script>
function remover(id) {
    if (confirm("Deseja excluir o insumo " + id + "?")) {
        location.href = "opremInsumo.php?id=" + id;
    }
}
</script>
        </div>
    </div>

<?php include __DIR__ . '/../../footer.php'; ?>
