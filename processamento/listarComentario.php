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
    $listaComentario = retornarComentario();
    while($comentario = mysqli_fetch_assoc($listaComentario)){
        echo "<section>";
        echo "<h2>" .$comentario["comentario"] ."</h2>";
        echo "</section>"; 
        }
    ?> 
</body>
</html>