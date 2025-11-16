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
        
        <form method="POST" action="processamento/login.php"> 
            <p>Email</p>
            <input type="text" id="email" placeholder="Seu Email" name="inputEmail">
            <p>Senha</p>
            <input type="password" id="password" placeholder="" name="inputSenha">
            <a href="processamento/recuperarSenha.php">Esqueci minha senha</a>
            <section class="btn2">
                <button type="submit" class="bnt-login">ENTRE</button>
            </section>
        </form>
        <section class="btn">
            <button><a href="processamento/cadastroUsuario.php">CADASTRO</a></button>
        </section>
    </section>
</main>
    
</body>
</html>