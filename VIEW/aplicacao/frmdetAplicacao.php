<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/aplicacaoDAL.php';
include_once __DIR__ . '/../../DAL/insumoDAL.php';
include_once __DIR__ . '/../../DAL/loteDAL.php';
include_once __DIR__ . '/../../DAL/usuarioDAL.php';

$id = (int) ($_GET['id'] ?? 0); 

$dalAplicacao = new DAL\AplicacaoDAL();
$aplicacao = $dalAplicacao->SelectById($id);
if ($aplicacao === null) {
    header("Location: lstAplicacao.php");
    exit;
}

$dalInsumo = new DAL\InsumoDAL();
$dalLote = new DAL\LoteDAL();
$dalUsuario = new DAL\UsuarioDAL();

$insumo = $dalInsumo->SelectById($aplicacao->getInsumoId());
$lote = $dalLote->SelectById($aplicacao->getLoteId());
$usuario = $dalUsuario->SelectById($aplicacao->getUsuarioId());
$tituloPagina = 'Detalhes da Aplicação';
include __DIR__ . '/../../header.php';
?>
    <h3 class="green-text text-darken-3">Detalhes da Aplicação</h3>
    <div class="card">
        <div class="card-content">
    
    <table class="striped">
        <tr>
            <th>ID</th>
            <td><?= $aplicacao->getId(); ?></td>
        </tr>
        <tr>
            <th>Data</th>
            <td><?= $aplicacao->getDataAplicacao(); ?></td>
        </tr>
        <tr>
            <th>Quantidade utilizada</th>
            <td><?= $aplicacao->getQuantidadeUtilizada(); ?></td>
        </tr>
        <tr>
            <th>Observação</th>
            <td><?= $aplicacao->getObservacao(); ?></td>
        </tr>
        <tr>
            <th>Insumo</th>
            <td><?= $insumo->getNome(); ?></td>
        </tr>
        <tr>
            <th>Lote</th>
            <td><?= $lote->getNome(); ?></td>
        </tr>
        <tr>
            <th>Usuário</th>
            <td><?= $usuario->getNome(); ?></td>
        </tr>
    </table>

    <br>
    <a class="btn grey" href="lstAplicacao.php">Voltar</a>
        </div>
    </div>

<?php include __DIR__ . '/../../footer.php'; ?>
