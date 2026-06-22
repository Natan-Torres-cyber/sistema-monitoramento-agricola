<?php
if (!isset($caminhoRaiz))  { $caminhoRaiz = ''; }
if (!isset($tituloPagina)) { $tituloPagina = 'AgroMonitor'; }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($tituloPagina); ?> - AgroMonitor</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body class="green lighten-5">

<nav class="green darken-2">
    <div class="nav-wrapper container">
        <a href="<?php echo $caminhoRaiz; ?>index.php" class="brand-logo">
            <i class="material-icons left">eco</i>AgroMonitor
        </a>
        <ul class="right hide-on-med-and-down">
            <li><a href="<?php echo $caminhoRaiz; ?>VIEW/insumo/lstInsumo.php">Insumos</a></li>
            <li><a href="<?php echo $caminhoRaiz; ?>VIEW/lote/lstLote.php">Lotes</a></li>
            <li><a href="<?php echo $caminhoRaiz; ?>VIEW/aplicacao/lstAplicacao.php">Aplicações</a></li>
            <li><a href="<?php echo $caminhoRaiz; ?>VIEW/usuario/lstUsuario.php">Usuários</a></li>
            <li>
                <a href="<?php echo $caminhoRaiz; ?>logout.php">
                    <i class="material-icons left">exit_to_app</i>
                    <?php echo htmlspecialchars($_SESSION['usuario_nome'] ?? ''); ?> | Sair
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="container" style="margin-top: 30px;">
