<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/loteDAL.php';
include_once __DIR__ . '/../../MODEL/lote.php';

$dalLote = new DAL\LoteDAL();
$lstLote = $dalLote->Select();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listar Lotes</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body class="green lighten-5">

<div class="container">
    <p><a href="../../index.php">&larr; Menu Principal</a></p>
    <h3>Lista de Lotes</h3>

    <a class="btn green" href="frmisLote.php">Novo Lote</a>

    <table class="striped responsive-table">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cultura</th>
            <th>Área</th>
            <th>Localização</th>
            <th>Ações</th>
        </tr>

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
</div>

<script>
function remover(id) {
    if (confirm("Deseja excluir o lote " + id + "?")) {
        location.href = "opremLote.php?id=" + id;
    }
}
</script>

</body>
</html>