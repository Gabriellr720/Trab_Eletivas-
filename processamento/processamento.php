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
        exit(); 
    }


    if (isset($_POST['acao']) && $_POST['acao'] == 'login' && isset($_POST['cpf_email']) && isset($_POST['senha'])) {
        
        $cpfOuEmail = $_POST['cpf_email'];
        $senha = $_POST['senha'];
        
        $usuario = verificarLogin($cpfOuEmail, $senha);
        
        if ($usuario) {
            // Login bem-sucedido
            $_SESSION['usuario_cpf'] = $usuario['cpf'];
            $_SESSION['usuario_nome'] = $usuario['nome'];
            $_SESSION['login_sucesso'] = '✅ Login realizado com sucesso! Bem-vindo(a), ' . $usuario['nome'] . '!';
            
            // Redireciona para a home page (ajuste o caminho se necessário)
            header('location: view/home.php'); 
            exit(); 
        } else {
            // Login falhou
            $_SESSION['login_erro'] = '❌ CPF/Email ou Senha inválidos. Tente novamente.';
            // Redireciona de volta para a página de login (ajustado para subir um diretório)
            header('location: view/index.php'); 
            exit();
        }
    }

    // --- LÓGICA DE LOGOUT ---
    if (isset($_POST['acao']) && $_POST['acao'] == 'logout') {
        // Você precisa definir uma função fazerLogout() ou usar session_destroy()
        session_destroy();
        // Redireciona para a página de login com mensagem de sucesso
        $_SESSION['login_sucesso'] = '✅ Logout realizado com sucesso!';
        header('location: ../index.php'); // Ajustado para subir um diretório
        exit();
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
            // ALTERADO: A senha é usada em texto puro
            $senha = $_POST['inputSenha']; 
            $dataNasc = $_POST['inputDataNasc'];

            atualizarCliente($cpfAntigo, $cpfNovo, $nome, $sobrenome, $telefone, $email, $senha, $dataNasc);

            header('location:listarUsuario.php'); // Redireciona para a lista após a atualização
            exit();
        } else {
            // Tratar campos vazios na atualização se necessário
            header('location:editarUsuario.php?cpf=' . $_POST['cpfAntigo'] . '&erro=camposVazios');
            exit();
        }
    }

    if(isset($_GET['acao']) && $_GET['acao'] == 'deletarCliente' && isset($_GET['cpf'])) {
        $cpf = $_GET['cpf'];
        deletarCliente($cpf);
        header('location:listarUsuario.php?status=deletado'); // Redireciona de volta para a lista
        exit();
    }


    // ----------------------------------------------------------------------
    // --- UPDATE: COMENTÁRIO ---
    // ----------------------------------------------------------------------
    if(isset($_POST['acaoComentarioUpdate']) && $_POST['acaoComentarioUpdate'] == 'sim' && !empty($_POST['idComentario']) && !empty($_POST['inputComentario'])) {
        $idComentario = $_POST['idComentario']; // Campo oculto no formulário de edição
        $novoComentario = $_POST['inputComentario'];
        
        atualizarComentario($idComentario, $novoComentario);
        header('location:listarComentario.php?status=atualizado'); // Redireciona para a lista
        exit();
    }

    // ----------------------------------------------------------------------
    // --- DELETE: COMENTÁRIO ---
    // ----------------------------------------------------------------------
    if(isset($_GET['acao']) && $_GET['acao'] == 'deletarComentario' && isset($_GET['id'])) {
        $idComentario = $_GET['id'];
        deletarComentario($idComentario);
        header('location:listarComentario.php?status=deletado'); 
        exit();
    }

    // ----------------------------------------------------------------------
    // --- DELETE: RECEITA ---
    // ----------------------------------------------------------------------
    if(isset($_GET['acao']) && $_GET['acao'] == 'deletarReceita' && isset($_GET['id'])) {
        $idReceita = $_GET['id'];
        deletarReceita($idReceita);
        header('location:listarReceita.php?status=deletado'); 
        exit();
    }

    // ----------------------------------------------------------------------
    // --- DELETE: INGREDIENTES INSPIRAÇÃO ---
    // ----------------------------------------------------------------------
    if(isset($_GET['acao']) && $_GET['acao'] == 'deletarIngredientes' && isset($_GET['id'])) {
        $id = $_GET['id'];
        deletarIngredientesInspiracao($id);
        header('location:listarIngredientes.php?status=deletado'); 
        exit();
    }

?>