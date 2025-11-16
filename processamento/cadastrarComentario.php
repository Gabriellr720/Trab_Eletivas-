<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png">
    <!--<link rel="stylesheet" href="../assets/css/cadastrarComentario.css">-->
    <link rel="stylesheet" href="./assets/css/cadastrarComentarios.css">
    <title>Cadastrar Comentário </title>
</head>
<body>
     <header>
        <section class="logo">
            <a href="enviarReceita.html" class="btn1">Enviar Receita</a>
            <img src="../assets/img/logo.png" alt="">
            <img src="../assets/img/fonteLogo.png" alt="">
            <article id="article-login">
                <a href="MeuUsuario.html">
                    <img src="../assets/img/loginIcon.png">
                </a>
            </article>
        </section>
    </header>
    <h2>Cadastro Comentário</h2>
    <main>
        <div class="cadastro-receita">
        <form method="POST" action="processamento.php">
            <label for="idComentario">Comentário do Usuário</label>
            <textarea name="inputComentario" id="idComentario" cols="90" rows="10"></textarea>
            <button type="submit" class="bnt-cadastro">Cadastrar</button>
        </form>    
    </div>
    </main>
        <!--<main>
        <form action="" method="post">
        <div class="cadastro-receita">
            <form method="POST" action="processamento.php">
                <label> Comentário do Usuário</label>
                <textarea name="" id="" cols="90" rows="20" name="inputComentario"></textarea>
                <button type="submit">Cadastrar</button>
            </form>  
        </div>
        </form>
        </main>-->
</body>
</html>