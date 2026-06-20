<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Lote</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>
<body class="green lighten-5">

<div class="container">
    <h3>Cadastrar Lote</h3>

    <form action="opinsLote.php" method="post">
        <div class="input-field">
            <input type="text" name="nome" id="nome" required>
            <label for="nome">Nome do lote</label>
        </div>

        <div class="input-field">
            <input type="text" name="cultura" id="cultura" required>
            <label for="cultura">Cultura</label>
        </div>

        <div class="input-field">
            <input type="number" step="0.01" min="0" name="area_hectares" id="area_hectares" required>
            <label for="area_hectares">Área em hectares</label>
        </div>

        <div class="input-field">
            <input type="text" name="localizacao" id="localizacao">
            <label for="localizacao">Localização</label>
        </div>

        <button class="btn green" type="submit">Salvar</button>
        <a class="btn grey" href="lstLote.php">Cancelar</a>
    </form>
</div>

</body>
</html>