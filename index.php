<?php
$caminhoRaiz = '';
require_once __DIR__ . '/seguranca.php';
$tituloPagina = 'Menu Principal';
include __DIR__ . '/header.php';
?>

<h3 class="green-text text-darken-3">Menu Principal</h3>
<p class="grey-text">Bem-vindo(a), <?php echo htmlspecialchars($_SESSION['usuario_nome'] ?? ''); ?>.</p>

<div class="row" style="margin-top: 20px;">

    <div class="col s12 m6 l3">
        <a href="VIEW/insumo/lstInsumo.php" class="white-text">
            <div class="card teal darken-1 hoverable center-align z-depth-2">
                <div class="card-content">
                    <i class="material-icons" style="font-size: 3rem;">inventory_2</i>
                    <h5>Insumos</h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col s12 m6 l3">
        <a href="VIEW/lote/lstLote.php" class="white-text">
            <div class="card light-green darken-1 hoverable center-align z-depth-2">
                <div class="card-content">
                    <i class="material-icons" style="font-size: 3rem;">grass</i>
                    <h5>Lotes</h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col s12 m6 l3">
        <a href="VIEW/aplicacao/lstAplicacao.php" class="white-text">
            <div class="card green darken-3 hoverable center-align z-depth-2">
                <div class="card-content">
                    <i class="material-icons" style="font-size: 3rem;">science</i>
                    <h5>Aplicações</h5>
                </div>
            </div>
        </a>
    </div>

    <div class="col s12 m6 l3">
        <a href="VIEW/usuario/lstUsuario.php" class="white-text">
            <div class="card blue-grey darken-1 hoverable center-align z-depth-2">
                <div class="card-content">
                    <i class="material-icons" style="font-size: 3rem;">people</i>
                    <h5>Usuários</h5>
                </div>
            </div>
        </a>
    </div>

</div>

<?php include __DIR__ . '/footer.php'; ?>
