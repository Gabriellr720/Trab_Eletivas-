<?php
include_once 'funcaoDB.php'; 

$receitas = listarTodasReceitas(); 

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/listarReceita.css">
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png">
    <title>Receitas Cadastradas</title>
    </head>
<body>
    <div class="header">
        <a href="../view/meuUsuario.html">Voltar</a>
        <h1>📋 Receitas Cadastradas</h1>
    </div>
    <?php if (empty($receitas)): ?>
        <p>Ainda não há receitas cadastradas.</p>
    <?php else: ?>
    
        <table border="1" class="receitas-tabela">
    <thead>
        <tr>
            <th>Nome da Receita</th>
            <th>Dificuldade</th>
            <th>Porções</th>
            <th>Ingredientes</th>
            <th>Modo de Preparo</th>
            <th>Foto</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach ($receitas as $receita): 
        ?>
        <tr>
            <td><?php echo htmlspecialchars($receita['receita_nome']); ?></td>
            <td><?php echo htmlspecialchars($receita['dificuldade']); ?></td>
            <td><?php echo htmlspecialchars($receita['rendimento_porcoes']); ?></td>
            <td><?php echo nl2br(htmlspecialchars($receita['ingredientes'])); ?></td>
            <td><?php echo nl2br(htmlspecialchars($receita['modo_preparo'])); ?></td>
            <td>
                <?php if (!empty($receita['caminhoFoto'])): ?>
                    <img src="<?php echo htmlspecialchars($receita['caminhoFoto']); ?>" alt="Foto da Receita" style="width: 100px;">
                <?php else: ?>
                    Sem foto
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
    <p class="aviso"> Em processo de análise. Após a validação, enviaremos um e-mail para você.</p>
    <?php endif; ?>
</body>
</html>