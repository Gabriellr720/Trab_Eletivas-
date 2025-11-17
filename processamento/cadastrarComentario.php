<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="../assets/css/cadastrarComentario.css">
    <title>Cadastrar Comentário </title>
</head>
<body>
     <header>
        <section class="logo">
            <a href="../view/meuUsuario.html" class="btn1"><b>VOLTAR</b></a>
            <img src="../assets/img/logo.png" alt="">
            <img src="../assets/img/fonteLogo.png" alt="">
            <article id="article-login">
                <a href="../view/MeuUsuario.html">
                    <img src="../assets/img/loginIcon.png">
                </a>
            </article>
        </section>
    </header>
    <main>
        <div class="cadastro-receita">
        <form method="POST" action="processamento.php">
            <label for="idComentario">Digite seu Comentário:</label>
            <textarea name="inputComentario" id="idComentario" cols="90" rows="10"></textarea>
            <button type="submit" class="bnt-cadastro">ENVIAR</button>
        </form>    
    </div>
    </main>
</body>
</html>