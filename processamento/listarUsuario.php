<?php
    require_once "funcaoDB.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /*
        $listaCliente = retornarCliente();
        while($cliente = mysqli_fetch_assoc($listaCliente)){
            echo "<section>";
            echo "<h2>" .$cliente["nome"] ."". $cliente["sobrenome"]."</h2>";
            echo "<p>CPF: ". $cliente["cpf"] . "</p>";
            echo "<p> Data Nascimento: ". $cliente["dataNasc"] . "</p>"; 
            echo "<p> Telefone: ". $cliente["telefone"] . "</p>";
            echo "<p> E-mail: ". $cliente["email"]. "</p>";
            echo "</section>"; 
        }
    */
    ?> 

    <h1>Lista de Usuários</h1>
    <a href="cadastroUsuario.php">Cadastrar Novo Usuário</a>
    <hr>
    <?php
        $listaCliente = retornarCliente();
        while($cliente = mysqli_fetch_assoc($listaCliente)){
            echo "<section style='border: 1px solid #ccc; padding: 10px; margin-bottom: 10px;'>";
            echo "<h2>" .$cliente["nome"] ." ". $cliente["sobrenome"]."</h2>";
            echo "<p>CPF: ". $cliente["cpf"] . "</p>";
            echo "<p> Data Nascimento: ". $cliente["dataNasc"] . "</p>"; 
            echo "<p> Telefone: ". $cliente["telefone"] . "</p>";
            echo "<p> E-mail: ". $cliente["email"]. "</p>";

            // --- BOTÕES DE AÇÃO ---
            // Link para Edição, passando o CPF na URL (GET)
            echo "<a href='editarUsuario.php?cpf=" . $cliente["cpf"] . "'>[Editar]</a> ";
            
            // Link para Deletar, passando o CPF na URL (GET)
            // É ALTAMENTE recomendado adicionar uma confirmação em JavaScript antes de deletar!
            echo "<a href='deletarUsuario.php?cpf=" . $cliente["cpf"] . "' onclick=\"return confirm('Tem certeza que deseja deletar o usuário " . $cliente["nome"] . "?');\">[Deletar]</a>";
            
            echo "</section>"; 
        }
    ?>


</body>
</html>