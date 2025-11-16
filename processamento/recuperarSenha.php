<!DOCTYbuttonE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.png">
    <link rel="stylesheet" href="../assets/css/recuperarSenha.css">
     
    <title>Recuperar Senha</title>
</head>
<body>
    <header>
        <section class="logo">
            <img src="../assets/img/logo.png" alt="">
            <img src="../assets/img/fonteLogo.png" alt="">
        </section>
    </header>

    <main>
        <section class="login-container">
            <h2>Recuperar Senha</h2>
            <form  method="POST" action = "/processamento/processamento.php">  
                <p>E-mail</p>
                <input type="password" id="password" placeholder="" name="password">
            </form>
           <section class="btn">
                <button type="submit" id="cuzao"><a href="processamento/listarUsuario.php">CONTINUAR</a></button>
           </section>
        </section>
    </main>
    
</body>
</html>