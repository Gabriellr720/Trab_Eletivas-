<?php
    require_once "funcaoDB.php"; 

    // Verifica se um CPF foi passado via URL
    if(!isset($_GET['cpf']) || empty($_GET['cpf'])){
        header('location:listarUsuario.php'); // Redireciona se não tiver CPF
        die();
    }

    $cpf = $_GET['cpf'];
    $cliente = retornarClientePorCpf($cpf); // Nova função criada em funcaoDB.php

    if(!$cliente){
        echo "Usuário não encontrado!";
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <form method="POST" action="processamento.php">
        <label> Editar Usuário: <?php echo $cliente['nome'] . ' ' . $cliente['sobrenome']; ?> </label>
        
        <input type="hidden" name="cpfAntigo" value="<?php echo $cliente['cpf']; ?>">
        <input type="hidden" name="acaoAtualizar" value="sim"> 

        <input type="text" placeholder="CPF" name="inputCPF" value="<?php echo $cliente['cpf']; ?>" required>
        <input type="text" placeholder="Nome" name="inputNome" value="<?php echo $cliente['nome']; ?>" required>
        <input type="text" placeholder="Sobrenome" name="inputSobrenome" value="<?php echo $cliente['sobrenome']; ?>" required>
        <input type="text" placeholder="Telefone" name="inputTelefone" value="<?php echo $cliente['telefone']; ?>" required>
        <input type="text" placeholder="Email" name="inputEmail" value="<?php echo $cliente['email']; ?>" required>
        <input type="password" placeholder="Nova Senha (ou a mesma)" name="inputSenha" value="<?php echo $cliente['senha']; ?>" required>
        <input type="date" placeholder="" name="inputDataNasc" value="<?php echo $cliente['dataNasc']; ?>" required>
        
        <button type="submit">Salvar Edições</button>
        <a href="listarUsuario.php">Cancelar</a>
    </form>
</body>
</html>