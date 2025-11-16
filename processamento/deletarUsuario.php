<?php
    require_once "funcaoDB.php"; 

    // Verifica se um CPF foi passado via URL
    if(!isset($_GET['cpf']) || empty($_GET['cpf'])){
        header('location:listarUsuario.php'); // Redireciona se não tiver CPF
        die();
    }

    $cpf = $_GET['cpf'];
    
    // Chama a função de exclusão
    deletarCliente($cpf);

    // Redireciona de volta para a lista após a exclusão
    header('location:listarUsuario.php');
    die(); 
?>