<?php
$caminhoRaiz = '';
require_once __DIR__ . '/seguranca.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>AgroMonitor - Menu</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body class="green lighten-5">

<nav class="green darken-2">
    <div class="nav-wrapper container">
        <a href="index.php" class="brand-logo">AgroMonitor</a>
        <ul class="right">
            <li><a href="logout.php"><?= htmlspecialchars($_SESSION['usuario_nome']) ?> | Sair</a></li>
        </ul>
    </div>
</nav>

<div class="container" style="margin-top: 40px;">
    <h3>Menu Principal</h3>

    <div class="row">
        <div class="col s12 m6">
            <a class="btn green waves-effect" style="width: 100%; margin-bottom: 10px;" href="VIEW/lote/lstLote.php">
                Lotes
            </a>
        </div>
        <div class="col s12 m6">
            <a class="btn green waves-effect" style="width: 100%; margin-bottom: 10px;" href="VIEW/insumo/lstInsumo.php">
                Insumos
            </a>
        </div>
        <div class="col s12 m6">
            <a class="btn green waves-effect" style="width: 100%; margin-bottom: 10px;" href="VIEW/aplicacao/lstAplicacao.php">
                Aplicações
            </a>
        </div>
        <div class="col s12 m6">
            <a class="btn green waves-effect" style="width: 100%; margin-bottom: 10px;" href="VIEW/usuario/lstUsuario.php">
                Usuários
            </a>
        </div>
    </div>
</div>

</body>
</html>
