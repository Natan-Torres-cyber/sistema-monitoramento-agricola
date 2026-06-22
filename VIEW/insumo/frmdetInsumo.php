<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/insumoDAL.php';
include_once __DIR__ . '/../../MODEL/insumo.php';

$id = (int) ($_GET['id'] ?? 0);

$dalInsumo = new DAL\InsumoDAL();
$insumo = $dalInsumo->SelectById($id);

if ($insumo === null) {
    header("Location: lstInsumo.php");
    exit;
}

$tituloPagina = 'Detalhes do Insumo';

include __DIR__ . '/../../header.php';
?>
    <h3 class="green-text text-darken-3">Detalhes do Insumo</h3>
    <div class="card">
        <div class="card-content">
    
    <table class="striped">
        <tr>
            <th>ID</th>
            <td><?php echo $insumo->getId(); ?></td>
        </tr>
        <tr>
            <th>Nome</th>
            <td><?php echo $insumo->getNome(); ?></td>
        </tr>
        <tr>
            <th>Tipo</th>
            <td><?php echo $insumo->getTipo(); ?></td>
        </tr>
        <tr>
            <th>Unidade de medida</th>
            <td><?php echo $insumo->getUnidadeMedida(); ?></td>
        </tr>
        <tr>
            <th>Quantidade em estoque</th>
            <td><?php echo $insumo->getQuantidadeEstoque(); ?></td>
        </tr>
        <tr>
            <th>Imagem</th>
            <td>
                <?php if (!empty($insumo->getImagem())) { ?>
                    <img src="<?php echo htmlspecialchars($insumo->getImagem()); ?>" alt="<?php echo htmlspecialchars($insumo->getNome()); ?>" style="max-width:200px; border-radius:4px;" onerror="this.style.display='none';">
                <?php } else { ?>
                    <em>sem imagem</em>
                <?php } ?>
            </td>
        </tr>
    </table>
    
    <br>
    
    <a class="btn grey" href="lstInsumo.php">Voltar</a>
        </div>
    </div>

<?php include __DIR__ . '/../../footer.php'; ?>
