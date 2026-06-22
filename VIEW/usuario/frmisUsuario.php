<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Usuário</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body class="green lighten-5">

<div class="container">
    <h3>Cadastrar Usuário</h3>

    <?php if (isset($_GET['erro'])) { ?>
        <p class="red-text">Verifique os dados: nome, perfil, e-mail válido e senha com pelo menos 4 caracteres.</p>
    <?php } ?>

    <form action="opinsUsuario.php" method="post">
        <div class="input-field">
            <input type="text" name="nome" id="nome" required>
            <label class="active" for="nome">Nome</label>
        </div>

        <div class="input-field">
            <input type="email" name="email" id="email" required>
            <label class="active" for="email">E-mail</label>
        </div>

        <div class="input-field">
            <input type="password" name="senha" id="senha" required>
            <label class="active" for="senha">Senha</label>
        </div>

        <div class="input-field">
            <input type="text" name="perfil" id="perfil" required>
            <label class="active" for="perfil">Perfil</label>
        </div>

        <button class="btn green" type="submit">Salvar</button>
        <a class="btn grey" href="lstUsuario.php">Cancelar</a>
    </form>
</div>

</body>
</html>