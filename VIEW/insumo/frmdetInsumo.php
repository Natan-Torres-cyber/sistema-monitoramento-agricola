<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
include_once __DIR__ . '/../../DAL/insumoDAL.php';
include_once __DIR__ . '/../../MODEL/insumo.php';

$id = $_GET['id'];

$dalInsumo = new DAL\InsumoDAL();
$insumo = $dalInsumo->SelectById($id);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Detalhes do Insumo</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<body class="green lighten-5">

<div class="container">
    <h3>Detalhes do Insumo</h3>

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

</body>
</html>