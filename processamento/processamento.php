<?php
    session_start();
    require_once "funcaoDB.php"; 

    if(!empty($_POST['inputCPF']) && !empty($_POST['inputNome']) && !empty($_POST['inputSobrenome']) 
    && !empty($_POST['inputTelefone']) && !empty($_POST['inputEmail']) && !empty($_POST['inputSenha']) 
    && !empty($_POST['inputDataNasc']))
    {
        $cpf = $_POST['inputCPF'];    
        $nome = $_POST['inputNome'];
        $sobrenome = $_POST['inputSobrenome'];
        $telefone = $_POST['inputTelefone'];
        $email = $_POST['inputEmail'];
        $senha = $_POST['inputSenha'];
        $dataNasc = $_POST['inputDataNasc'];

        echo "CPF". $cpf. "Nome". $nome."Sobrenome". $sobrenome."Telefone". $telefone. "Email". $email. "Senha". $senha. "Data de nascimento". $dataNasc; 

        inserirCliente($cpf, $nome, $sobrenome, $telefone, $email, $senha, $dataNasc);
    
        header('location:cadastroUsuario.php');
        die(); 
    }
?>