<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// se já estiver logado, manda direto pro menu
if (isset($_SESSION['usuario_id'])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login - AgroMonitor</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body class="green lighten-5">

<div class="container" style="max-width: 400px; margin-top: 80px;">
    <h3 class="center-align">AgroMonitor</h3>

    <?php if (isset($_GET['erro'])): ?>
        <p class="red-text">E-mail ou senha inválidos.</p>
    <?php endif; ?>

    <form action="oplogin.php" method="post">
        <div class="input-field">
            <input type="email" name="email" id="email" required>
            <label for="email">E-mail</label>
        </div>

        <div class="input-field">
            <input type="password" name="senha" id="senha" required>
            <label for="senha">Senha</label>
        </div>

        <button class="btn green" type="submit" style="width: 100%;">Entrar</button>
    </form>
</div>

</body>
</html>
