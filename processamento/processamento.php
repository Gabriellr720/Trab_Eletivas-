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

    if(isset($_GET['acao']) && $_GET['acao'] == 'deletarCliente' && isset($_GET['cpf'])) {
        $cpf = $_GET['cpf'];
        deletarCliente($cpf);
        header('location:listarUsuario.php?status=deletado'); // Redireciona de volta para a lista
        die();
    }


    // ----------------------------------------------------------------------
    // --- UPDATE: COMENTÁRIO ---
    // ----------------------------------------------------------------------
    if(isset($_POST['acaoComentarioUpdate']) && $_POST['acaoComentarioUpdate'] == 'sim' && !empty($_POST['idComentario']) && !empty($_POST['inputComentario'])) {
        $idComentario = $_POST['idComentario']; // Campo oculto no formulário de edição
        $novoComentario = $_POST['inputComentario'];
        
        atualizarComentario($idComentario, $novoComentario);
        header('location:listarComentario.php?status=atualizado'); // Redireciona para a lista
        die();
    }

    // ----------------------------------------------------------------------
    // --- DELETE: COMENTÁRIO ---
    // ----------------------------------------------------------------------
    if(isset($_GET['acao']) && $_GET['acao'] == 'deletarComentario' && isset($_GET['id'])) {
        $idComentario = $_GET['id'];
        deletarComentario($idComentario);
        header('location:listarComentario.php?status=deletado'); 
        die();
    }

    // ----------------------------------------------------------------------
    // --- DELETE: RECEITA ---
    // ----------------------------------------------------------------------
    if(isset($_GET['acao']) && $_GET['acao'] == 'deletarReceita' && isset($_GET['id'])) {
        $idReceita = $_GET['id'];
        deletarReceita($idReceita);
        header('location:listarReceita.php?status=deletado'); 
        die();
    }

    // ----------------------------------------------------------------------
    // --- DELETE: INGREDIENTES INSPIRAÇÃO ---
    // ----------------------------------------------------------------------
    if(isset($_GET['acao']) && $_GET['acao'] == 'deletarIngredientes' && isset($_GET['id'])) {
        $id = $_GET['id'];
        deletarIngredientesInspiracao($id);
        header('location:listarIngredientes.php?status=deletado'); 
        die();
    }

?>