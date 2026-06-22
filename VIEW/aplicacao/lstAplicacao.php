<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/aplicacaoDAL.php';
include_once __DIR__ . '/../../MODEL/aplicacao.php';

$dalAplicacao = new DAL\AplicacaoDAL();
$lstAplicacao = $dalAplicacao->Select();
$tituloPagina = 'Aplicações';
include __DIR__ . '/../../header.php';
?>
<h3>Lista de Aplicações</h3>
    <div class="card">
        <div class="card-content">
    <a class="btn green" href="frmisAplicacao.php">Nova Aplicação</a>
    
    <table class="striped highlight responsive-table white z-depth-1" style="margin-top:25px;">
        <thead class="green lighten-4">
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Qtd.</th>
                <th>Insumo</th>
                <th>Lote</th>
                <th>Usuário</th>
                <th>Ações</th>
            </tr>
        </thead>

        <?php foreach ($lstAplicacao as $aplicacao) { ?>
            <tr>
                <td><?= $aplicacao->getId(); ?></td>
                <td><?= $aplicacao->getDataAplicacao(); ?></td>
                <td><?= $aplicacao->getQuantidadeUtilizada(); ?></td>
                <td><?= $aplicacao->insumo_nome; ?></td>
                <td><?= $aplicacao->lote_nome; ?></td>
                <td><?= $aplicacao->usuario_nome; ?></td>

                <td>
                    <a class="btn-small orange" href="frmedtAplicacao.php?id=<?= $aplicacao->getId(); ?>">Editar</a>
                    <a class="btn-small blue" href="frmdetAplicacao.php?id=<?= $aplicacao->getId(); ?>">Detalhes</a>
                    <a class="btn-small red" onclick="remover(<?= $aplicacao->getId(); ?>)">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>

<script>
function remover(id) {
    if (confirm("Deseja excluir a aplicação " + id + "?")) {
        location.href = "opremAplicacao.php?id=" + id;
    }
}
</script>
        </div>
    </div>

<?php include __DIR__ . '/../../footer.php'; ?>
