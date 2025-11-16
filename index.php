<?php

?>

<!DOCTYbuttonE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="style.css">
     
    <title>Cadastro</title>
</head>
<body>
    <header>
        <section class="logo">
            <img src="assets/img/logo.png" alt="">
            <img src="assets/img/fonteLogo.png" alt="">
        </section>
    </header>

    <main>
        <section class="login-container">
            <h2>Login</h2>
            
            <form  method="POST" action = "/processamento/processamento.php">  
                <p>Nome de Usuário</p>
                <input type="text" id="name" placeholder="" name="username">
                <p>Senha</p>
                <input type="password" id="password" placeholder="" name="password">
                <a href="view/redefinir.html">Esqueci minha senha</a>
            </form>
           <section class="btn">
                <button type="submit" id="cuzao"><a href="view/home.html">ENTRE</a></button>
                <button><a href="processamento/cadastroUsuario.php">CADASTRO</a></button>
           </section>
        </section>
    </main>
    
</body>
</html>