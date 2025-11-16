<?php

session_start();

include_once "funcaoDB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST['inputEmail'] ?? '';
    $senha_digitada = $_POST['inputSenha'] ?? ''; 
    $usuario = buscarUsuarioPorEmail($email);

    if ($usuario && $usuario['senha'] === $senha_digitada) {
        $_SESSION['logado'] = true;
        $_SESSION['usuario_id'] = $usuario['cpf']; 
        $_SESSION['usuario_nome'] = $usuario['nome'];
        header("Location: areaLogada.php");
        exit();

    } else {
        $_SESSION['erro_login'] = "Email ou senha incorretos.";
        
        header("Location: ../index.php?login=erro");
        exit();
    }

} else {
    header("Location: ../index.php");
    exit();
}
?>