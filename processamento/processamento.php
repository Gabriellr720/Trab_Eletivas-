<?php
    session_start();
    require_once "funcaoDB.php"; 

    if(!empty($_POST['email']) && !empty($_POST['password'])){
        $email = $_POST['email'];
        $senha = $_POST['password'];

        inserirCliente($email, $senha);
    
        header('location:../index.php');
        die(); 
    }
?>