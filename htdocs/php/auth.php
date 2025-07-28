<?php
// auth.php - Verificador de sessão para páginas protegidas
session_start();
if (!isset($_SESSION['ID_ALUNO'])) {
    header('Location: /login');
    exit();
}
?>
