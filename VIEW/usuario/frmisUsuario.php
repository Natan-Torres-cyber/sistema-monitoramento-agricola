<?php
$caminhoRaiz = '../../';
require_once __DIR__ . '/../../seguranca.php';
$tituloPagina = 'Cadastrar Usuário';
include __DIR__ . '/../../header.php';
?>
    <h3>Cadastrar Usuário</h3>
    <div class="card">
        <div class="card-content">
    <?php if (isset($_GET['erro'])) { ?>
        <p class="red-text">Verifique os dados: nome, perfil, e-mail válido e senha com pelo menos 4 caracteres.</p>
    <?php } ?>

    <form action="opinsUsuario.php" method="post">
        <div class="input-field">
            <input type="text" name="nome" id="nome" required>
            <label for="nome">Nome</label>
        </div>

        <div class="input-field">
            <input type="email" name="email" id="email" required>
            <label for="email">E-mail</label>
        </div>

        <div class="input-field">
            <input type="password" name="senha" id="senha" required>
            <label for="senha">Senha</label>
        </div>

        <div class="input-field">
            <input type="text" name="perfil" id="perfil" required>
            <label for="perfil">Perfil</label>
        </div>

        <button class="btn green" type="submit">Salvar</button>
        <a class="btn grey" href="lstUsuario.php">Cancelar</a>
    </form>
        </div>
    </div>

<?php include __DIR__ . '/../../footer.php'; ?>
