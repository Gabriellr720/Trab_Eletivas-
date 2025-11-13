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
    ?> 
</body>
</html>