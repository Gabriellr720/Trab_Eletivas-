<?php
include_once 'funcaoDB.php'; 

$listaIngredientes = listarIngredientesInspiracao(); 

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/listarIngredientes.css"> 
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png">
    <title>Ingredientes Cadastrados</title>
</head>
<body>
    <div class="header">
        <a href="../view/meuUsuario.html">VOLTAR</a>
        <h1>🥕 Ingredientes de Inspiração</h1>
    </div>
    
    <?php if (empty($listaIngredientes)): ?>
        <p>Ainda não há ingredientes de inspiração cadastrados.</p>
    <?php else: ?>
    
        <table border="1" class="ingredientes-tabela">
            <thead>
                <tr>
                    <th>Ingrediente 1</th>
                    <th>Ingrediente 2</th>
                    <th>Ingrediente 3</th>
                    <th>Ingrediente 4</th>
                    <th>Ingrediente 5</th>
                    <th>Ingrediente 6</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                foreach ($listaIngredientes as $ingrediente): 
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($ingrediente['ingrediente1']); ?></td>
                    <td><?php echo htmlspecialchars($ingrediente['ingrediente2']); ?></td>
                    <td><?php echo htmlspecialchars($ingrediente['ingrediente3']); ?></td>
                    <td><?php echo htmlspecialchars($ingrediente['ingrediente4']); ?></td>
                    <td><?php echo htmlspecialchars($ingrediente['ingrediente5']); ?></td>
                    <td><?php echo htmlspecialchars($ingrediente['ingrediente6']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        
    <?php endif; ?>
</body>
</html>