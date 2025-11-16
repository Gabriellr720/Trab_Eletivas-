<?php
session_start();

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    header("Location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <link rel="stylesheet" href="../assets/css/areaLogada.css">
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.png">
    </head>
<body>
    <br>
    <br>
    <h1>Bem-vindo, Mestre(a) <?php echo $_SESSION['usuario_nome']; ?>!</h1>
    <br>
    <br>
    <section class="escolha">
        <a href="../view/home.html">Ir para HOME</a>
        <a href="../processamento/sair.php">Sair (Logout)</a>
    </section>
</body>
</html>