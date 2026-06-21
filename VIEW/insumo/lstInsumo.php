<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/insumoDAL.php';
include_once __DIR__ . '/../../MODEL/insumo.php';

$dalInsumo = new DAL\InsumoDAL();
$lstInsumo = $dalInsumo->Select();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listar Insumos</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="green lighten-5">

<div class="container">
    <p><a href="../../index.php">&larr; Menu Principal</a></p>
    <h3>Lista de Insumos</h3>

    <a class="btn green" href="frmisInsumo.php">
        <i class="material-icons right">add</i>
        Novo Insumo
    </a>

    <table class="striped responsive-table">
        <tr>
            <th>ID</th>
            <th>Imagem</th>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Unidade</th>
            <th>Estoque</th>
            <th>Ações</th>
        </tr>

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
</div>

<script>
function remover(id) {
    if (confirm("Deseja excluir o insumo " + id + "?")) {
        location.href = "opremInsumo.php?id=" + id;
    }
}
</script>

</body>
</html>