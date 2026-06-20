<?php
include_once $_SERVER['DOCUMENT_ROOT'] . "/ALMIR.1PHP/DAL/aplicacaoDAL.php";
include_once $_SERVER['DOCUMENT_ROOT'] . "/ALMIR.1PHP/MODEL/aplicacao.php";

$dalAplicacao = new DAL\AplicacaoDAL();
$lstAplicacao = $dalAplicacao->Select();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listar Aplicações</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body class="green lighten-5">

<div class="container">
    <h3>Lista de Aplicações</h3>

    <a class="btn green" href="frmisAplicacao.php">Nova Aplicação</a>

    <table class="striped responsive-table">
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Quantidade</th>
            <th>Insumo</th>
            <th>Lote</th>
            <th>Usuário</th>
            <th>Ações</th>
        </tr>

        <?php foreach ($lstAplicacao as $aplicacao) { ?>
            <tr>
                <td><?= $aplicacao->getId(); ?></td>
                <td><?= $aplicacao->getDataAplicacao(); ?></td>
                <td><?= $aplicacao->getQuantidadeUtilizada(); ?></td>
                <td><?= $aplicacao->getInsumoId(); ?></td>
                <td><?= $aplicacao->getLoteId(); ?></td>
                <td><?= $aplicacao->getUsuarioId(); ?></td>
                <td>
                    <a class="btn-small orange" href="frmedtAplicacao.php?id=<?= $aplicacao->getId(); ?>">Editar</a>
                    <a class="btn-small blue" href="frmdetAplicacao.php?id=<?= $aplicacao->getId(); ?>">Detalhes</a>
                    <a class="btn-small red" onclick="remover(<?= $aplicacao->getId(); ?>)">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>

<script>
function remover(id) {
    if (confirm("Deseja excluir a aplicação " + id + "?")) {
        location.href = "opremAplicacao.php?id=" + id;
    }
}
</script>

</body>
</html>