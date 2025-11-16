<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.png">
    <link rel="stylesheet" href="../assets/css/cadastroUsuario.css">
    <title>Cadastro Usuário</title>
</head>
<body>
   <header>
        <section class="logo">
            <a href="../index.php" class="btn1"><b>VOLTAR</b></a>
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
        <section class="cadastro">
                <section class="cadastro1"> 
                    <form>
                    <h3>Cadastro</h3>
                    <form method="POST" action="processamento.php">
                    <input type="text" placeholder="CPF" name="inputCPF">
                    <input type="text" placeholder="Nome" name="inputNome">
                    <input type="text" placeholder="Sobrenome" name="inputSobrenome">
                    <input type="text" placeholder="Telefone" name="inputTelefone">
                    <input type="text" placeholder="Email" name="inputEmail">
                    <input type="password" placeholder="Senha" name="inputSenha">
                    <input type="date" placeholder="" name="inputDataNasc">
                    <div id="Style-center">
                        <button type="submit" class="bnt-cadastro">Cadastrar</button>
                    </div>
                    </form> 
                </section>
        </section>
    </main>
</body>
</html>