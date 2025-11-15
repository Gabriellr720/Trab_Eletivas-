<?php
    include_once 'funcaoDB.php'; 
    $mensagem = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ingredientes = [];
        $conexao = conectarBD(); 
        
        for ($i = 1; $i <= 6; $i++) {
            $ing = "ingrediente" . $i;
            $valor = isset($_POST[$ing]) ? trim($_POST[$ing]) : '';
            $ingredientes[] = mysqli_real_escape_string($conexao, $valor);
        }

        mysqli_close($conexao); 
        call_user_func_array('inserirIngredientesInspiracao', $ingredientes);
        $mensagem = "✅ Ingredientes cadastrados com sucesso!";
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Ingredientes para Inspiração</title>
    <link rel="stylesheet" href="../assets/css/cadastrarIngredientes.css"> 
</head>
<body>

    <div class="container">
        <h1>Inspiração para Receitas</h1>

        <?php if (!empty($mensagem)): ?>
            <div class="alert alert-success">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>

        <p>
            Cadastre até <strong>6 ingredientes</strong> que servirão de inspiração para receitas diferentes. Os campos não são obrigatórios, então sinta-se à vontade para registrar apenas alguns, se preferir.
        </p>
        
        <hr>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <?php for ($i = 1; $i <= 6; $i++): ?>
                <label for="ingrediente<?php echo $i; ?>">Ingrediente <?php echo $i; ?> (Opcional):</label>
                <input type="text" id="ingrediente<?php echo $i; ?>" name="ingrediente<?php echo $i; ?>" placeholder="Ex: Frango, Arroz, Pimentão, etc.">
            <?php endfor; ?>
            <button class="btn-submit" type="submit">Cadastrar Ingredientes</button>
            <a href="../view/meuUsuario.html" class="btn-back">Voltar</a>
        </form>
    </div>
</body>
</html>