<?php
    require_once "funcaoDB.php"; 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/listarComentario.css"> 
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png">
    <title>Document</title>
</head>
<body>
     <div class="header">
        <a href="../view/meuUsuario.html">Voltar</a>
        <h1>Comentário</h1>
    </div>

    <?php
    $listaComentario = retornarComentario();
    while($comentario = mysqli_fetch_assoc($listaComentario)){
        echo "<section>";
        echo "<h2> Comentário </h2>"; 
        echo "<p>" .$comentario["comentario"] ."</p>";
        echo "</section>"; 
        }
    ?> 
</body>
</html>