<?php
    require_once "funcaoDB.php"; 


    if(!isset($_GET['cpf']) || empty($_GET['cpf'])){
        header('location:listarUsuario.php'); 
        die();
    }

    $cpf = $_GET['cpf'];
    
    deletarCliente($cpf);

    header('location:listarUsuario.php');
    die(); 
?>