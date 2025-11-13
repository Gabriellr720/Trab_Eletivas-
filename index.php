<?php

?>

<!DOCTYbuttonE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css?v=<?php echo time(); ?>">
     
    <title>Cadastro</title>
</head>
<body>

    <main>
        <p class ="p01">The Gastroner</p>
        <section class="login-container">
            <h2>Login da Conta</h2>
            
            <form  method="POST" action = "/processamento/processamento.php">  
                <p>Nome de Usuário</p>
                <input type="text" id="name" placeholder="" name="username">
                <p>Senha</p>
                <input type="password" id="password" placeholder="" name="password">
                <button class="btn-login" type="submit"><a href="processamento/listarUsuario.php">ENTRE</a></button>
            </form>
    
            <div class="login-options">
                <a href="view/redefinir.html">Esqueci minha senha</a>
                <span>Não tem cadastro? </span>
                <a href="#">Cadastrar</a>
                <ul class="cadastro">
            </ul>
            </div>
          
            
        </section>
    </main>
    
</body>
</html>