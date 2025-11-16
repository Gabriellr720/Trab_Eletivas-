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

        //echo "CPF". $cpf. "Nome". $nome."Sobrenome". $sobrenome."Telefone". $telefone. "Email". $email. "Senha". $senha. "Data de nascimento". $dataNasc; 

        inserirCliente($cpf, $nome, $sobrenome, $telefone, $email, $senha, $dataNasc);
    
        header('location:cadastroUsuario.php');
        die(); 
    }

    if(!empty($_POST['inputComentario'])){

        $comentario = $_POST['inputComentario']; 

        inserirComentario($comentario);
        header('location:cadastrarComentario.php');
        die(); 
    }


    if(isset($_POST['acaoAtualizar']) && $_POST['acaoAtualizar'] == 'sim')
    {
        if(!empty($_POST['cpfAntigo']) && !empty($_POST['inputCPF']) && !empty($_POST['inputNome']) 
        && !empty($_POST['inputSobrenome']) && !empty($_POST['inputTelefone']) && !empty($_POST['inputEmail']) 
        && !empty($_POST['inputSenha']) && !empty($_POST['inputDataNasc']))
        {
            $cpfAntigo = $_POST['cpfAntigo']; // CPF Original (para WHERE)
            $cpfNovo = $_POST['inputCPF'];    // Novo CPF (caso tenha mudado)
            $nome = $_POST['inputNome'];
            $sobrenome = $_POST['inputSobrenome'];
            $telefone = $_POST['inputTelefone'];
            $email = $_POST['inputEmail'];
            // Recomenda-se usar password_hash() para armazenar a senha de forma segura
            $senha = $_POST['inputSenha']; 
            $dataNasc = $_POST['inputDataNasc'];

            atualizarCliente($cpfAntigo, $cpfNovo, $nome, $sobrenome, $telefone, $email, $senha, $dataNasc);

            header('location:listarUsuario.php'); // Redireciona para a lista após a atualização
            die();
        } else {
            // Tratar campos vazios na atualização se necessário
            header('location:editarUsuario.php?cpf=' . $_POST['cpfAntigo'] . '&erro=camposVazios');
            die();
        }
    }
?>