<?php
    require_once "funcaoDB.php"; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/listarUsuario.css"> 
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png">
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
            echo "</section>";
             

            echo "<div class='container-botoes'>"; 
            echo "<a href='editarUsuario.php?cpf=" . $cliente["cpf"] . "' class='btn-acao'>[Editar]</a> "; 
            echo "<a href='deletarUsuario.php?cpf=" . $cliente["cpf"] . "' class='btn-acao' onclick=\"return confirm('Tem certeza que deseja deletar o usuário " . $cliente["nome"] . "?');\">[Deletar]</a>";
            echo "</div>";
        }
    ?>
    <a href="cadastroUsuario.php" class="btn">Cadastrar Novo Usuário</a>



</body>
</html>