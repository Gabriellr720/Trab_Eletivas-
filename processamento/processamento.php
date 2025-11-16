<?php
    session_start();
    include_once "funcaoDB.php";

// Verifique se o método de envio é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // 1. Coleta os dados do formulário usando os 'name' dos inputs
    // É altamente recomendável usar mysqli_real_escape_string() para sanitização básica (prevenção de SQL Injection)
    $cpf = $_POST['inputCPF'] ?? '';
    $nome = $_POST['inputNome'] ?? '';
    $sobrenome = $_POST['inputSobrenome'] ?? '';
    $telefone = $_POST['inputTelefone'] ?? '';
    $email = $_POST['inputEmail'] ?? '';
    $senha = $_POST['inputSenha'] ?? ''; // Lembre-se de criptografar a senha!
    $dataNasc = $_POST['inputDataNasc'] ?? '';

    // --- SEGURANÇA BÁSICA: TRATAMENTO DA SENHA ---
    // Em um ambiente de produção, NUNCA armazene senhas em texto puro. 
    // Use password_hash() para criptografar. 
    // Para o seu trabalho acadêmico, o código abaixo insere a senha em texto puro, 
    // mas **recomendo fortemente** usar o HASH:
    // $senha_hashed = password_hash($senha, PASSWORD_DEFAULT);
    
    // O seu arquivo de funções já recebe a senha na função `inserirCliente()`.
    
    // 2. Chama a função de inserção
    // NOTA: É preciso passar o objeto de conexão ($conexao) para a sanitização ser eficiente.
    // Como você já definiu os 7 parâmetros na sua função, vamos chamá-la.

    // A função conectarBD() é chamada dentro do inserirCliente(), vamos usá-la.
    inserirCliente($cpf, $nome, $sobrenome, $telefone, $email, $senha, $dataNasc);
    
    // 3. Redireciona o usuário após o cadastro
    // Se a inserção foi bem-sucedida, você pode redirecionar para uma página de sucesso ou login.
    header("Location: ../index.php?cadastro=sucesso");
    exit();

} else {
    // Se a página foi acessada diretamente, redireciona para o formulário
    header("Location: cadastroUsuario.php");
    exit();
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