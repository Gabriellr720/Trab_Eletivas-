<?php
    require_once "funcaoDB.php"; 

    if(!isset($_GET['cpf']) || empty($_GET['cpf'])){
        header('location:listarUsuario.php'); 
        die();
    }

    $cpf = $_GET['cpf'];
    $cliente = retornarClientePorCpf($cpf); 

    if(!$cliente){
        echo "Usuário não encontrado!";
        die();
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="../assets/css/editarUsuario.css">
    <title>Editar Usuário</title>
</head>
<body>

    <header>
        <section class="logo">
            <img src="../assets/img/logo.png" alt="">
            <img src="../assets/img/fonteLogo.png" alt="">
            <article id="article-login">
                <a href="MeuUsuario.html">
                    <img src="../assets/img/loginIcon.png">
                </a>
            </article>
        </section>
    </header>

    <section class="cadastro">
        <section class="cadastro1">
             <form method="POST" action="processamento.php">
                <label class="edit"> Editar Usuário: <?php echo $cliente['nome'] . ' ' . $cliente['sobrenome']; ?> </label>
        
                <input type="hidden" name="cpfAntigo" value="<?php echo $cliente['cpf']; ?>">
                <input type="hidden" name="acaoAtualizar" value="sim"> 

                <input type="text" placeholder="CPF" name="inputCPF" value="<?php echo $cliente['cpf']; ?>" required>
                <input type="text" placeholder="Nome" name="inputNome" value="<?php echo $cliente['nome']; ?>" required>
                <input type="text" placeholder="Sobrenome" name="inputSobrenome" value="<?php echo $cliente['sobrenome']; ?>" required>
                <input type="text" placeholder="Telefone" name="inputTelefone" value="<?php echo $cliente['telefone']; ?>" required>
                <input type="text" placeholder="Email" name="inputEmail" value="<?php echo $cliente['email']; ?>" required>
                <input type="password" placeholder="Nova Senha (ou a mesma)" name="inputSenha" value="<?php echo $cliente['senha']; ?>" required>
                <input type="date" placeholder="" name="inputDataNasc" value="<?php echo $cliente['dataNasc']; ?>" required>
                <button type="submit" class="btn1">Salvar Edições</button>
                <a href="listarUsuario.php" class="btn">Cancelar</a>
            </form>
        </section>
    </section>
</body>
</html>