<?php
// Verifica se o usuário está logado. Se não estiver, manda pro login.
// $caminhoRaiz precisa ser definido ANTES de incluir este arquivo,
// com o caminho relativo até a raiz do projeto (ex: '../../' dentro de VIEW/lote/)

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['usuario_id'])) {
    header("Location: " . ($caminhoRaiz ?? '') . "login.php");
    exit;
}
?>
