<?php
    function conectarBD(){
        $conexao = mysqli_connect("localhost", "root", "", "trab_eletivas");
        return ($conexao); 
    }

 function inserirCliente($cpf, $nome, $sobrenome, $telefone, $email, $senha, $dataNasc){
        $conexao = conectarBD();
        // ALTERADO: A senha é inserida em texto puro.
        $stmt = mysqli_prepare($conexao, "INSERT INTO usuario (cpf, nome, sobrenome, telefone, email, senha, dataNasc)
                                        VALUES (?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($stmt, "sssssss", $cpf, $nome, $sobrenome, $telefone, $email, $senha, $dataNasc);
        mysqli_stmt_execute($stmt); 
        mysqli_stmt_close($stmt);
        mysqli_close($conexao);
    }

    // NOVA FUNÇÃO: Verifica as credenciais de login
    function verificarLogin($cpfOuEmail, $senha){
        $conexao = conectarBD();
        
        // Tenta encontrar o usuário pelo CPF ou Email, e verifica se a senha é IGUAL.
        // A consulta já inclui a senha para comparação direta no SQL.
        $stmt = mysqli_prepare($conexao, "SELECT cpf, nome FROM usuario WHERE (cpf = ? OR email = ?) AND senha = ?");
        mysqli_stmt_bind_param($stmt, "sss", $cpfOuEmail, $cpfOuEmail, $senha);
        mysqli_stmt_execute($stmt);
        $resultado = mysqli_stmt_get_result($stmt);
        $usuario = mysqli_fetch_assoc($resultado);
        
        mysqli_stmt_close($stmt);
        mysqli_close($conexao);
        
        if ($usuario) {
            // Login bem-sucedido: retorna os dados essenciais do usuário
            return [
                'cpf' => $usuario['cpf'],
                'nome' => $usuario['nome']
            ];
        }
        // Login falhou
        return false;
    }


   

    function retornarComentario(){

        $conexao = conectarBD();
        $consulta = "SELECT * FROM inserecomentario"; 
        $listaComentario = mysqli_query($conexao, $consulta); 
        return $listaComentario; 
    }


    function retornarCliente(){

        $conexao = conectarBD();
        $consulta = "SELECT * FROM usuario"; 
        $listaCliente = mysqli_query($conexao, $consulta); 
        return $listaCliente; 
    }

    function deletarCliente($cpf){
        $conexao = conectarBD();
        // Deleta o usuário baseado no CPF
        $consulta = "DELETE FROM usuario WHERE cpf = '$cpf'";
        mysqli_query($conexao, $consulta);
    }

    function retornarClientePorCpf($cpf) {
    // 1. Conexão com o Banco de Dados
    $conexao = conectarBD(); 

    // 2. Consulta SQL
    $consulta = "SELECT * FROM USUARIO WHERE cpf = '$cpf'";
    
    // 3. Execução da Consulta
    $resultado = mysqli_query($conexao, $consulta);
    
    // 4. Retorno dos Dados (como array associativo)
    // Geralmente retorna apenas uma linha para busca por CPF
    if (mysqli_num_rows($resultado) > 0) {
        return mysqli_fetch_assoc($resultado);
    } else {
        return false; // Retorna falso se não encontrar
    }
    }


    function atualizarCliente($cpfAntigo, $cpfNovo, $nome, $sobrenome, $telefone, $email, $senha, $dataNasc){
    $conexao = conectarBD();
    // ALTERADO: Recebe a senha em texto puro ($senha)
    // Usando Prepared Statement para segurança (mantendo o básico)
    $stmt = mysqli_prepare($conexao, "UPDATE usuario SET 
                                      cpf = ?, 
                                      nome = ?, 
                                      sobrenome = ?, 
                                      telefone = ?, 
                                      email = ?, 
                                      senha = ?, 
                                      dataNasc = ?
                                      WHERE cpf = ?");
    
    // ALTERADO: A senha é passada em texto puro para o DB
    mysqli_stmt_bind_param($stmt, "ssssssss", $cpfNovo, $nome, $sobrenome, $telefone, $email, $senha, $dataNasc, $cpfAntigo);
    mysqli_stmt_execute($stmt); 
    mysqli_stmt_close($stmt);
    mysqli_close($conexao);
}



    function inserirReceita($nomeUsuario, $nomeReceita, $dificuldade, $rendimento, $ingredientes, $modoPreparo, $caminhoDestino)
    {
        $conexao = conectarBD();

        $consulta = "INSERT INTO enviarreceita (nome_usuario, receita_nome, dificuldade, rendimento_porcoes, ingredientes, modo_preparo, foto_caminho)
        VALUES ('$nomeUsuario', '$nomeReceita', '$dificuldade', '$rendimento', '$ingredientes', '$modoPreparo', '$caminhoDestino')";
    
        $resultado = mysqli_query($conexao, $consulta);
    
        // Aqui se a query falhar, mostrará erro.
        if (!$resultado)
            {
                die("Erro ao inserir receita: " . mysqli_error($conexao));
            }
    }

    function listarTodasReceitas() {
    $conn = conectarBD(); 
    $receitas = [];
    
    $sql = "SELECT 
                nome_usuario,        
                receita_nome,        
                dificuldade,         
                rendimento_porcoes,  
                ingredientes, 
                modo_preparo, 
                foto_caminho AS caminhoFoto 
            FROM 
                enviarreceita 
            ORDER BY 
                receita_nome ASC"; 
    
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $receitas[] = $row;
        }
    }
    
    $conn->close();
    return $receitas;
}

function inserirIngredientesInspiracao($ing1, $ing2, $ing3, $ing4, $ing5, $ing6) {
    $conexao = conectarBD();

    $consulta = "INSERT INTO ingredientes_inspiracao (ingrediente1, ingrediente2, ingrediente3, ingrediente4, ingrediente5, ingrediente6)
                 VALUES ('$ing1', '$ing2', '$ing3', '$ing4', '$ing5', '$ing6')";

    $resultado = mysqli_query($conexao, $consulta);

    if (!$resultado) {
        die("Erro ao inserir ingredientes: " . mysqli_error($conexao));
    }

    mysqli_close($conexao);
}

function listarIngredientesInspiracao() {
    $conn = conectarBD(); 
    $ingredientes = [];
    
    $sql = "SELECT 
                id, 
                ingrediente1, 
                ingrediente2, 
                ingrediente3, 
                ingrediente4, 
                ingrediente5, 
                ingrediente6 
            FROM 
                ingredientes_inspiracao 
            ORDER BY 
                id DESC"; 
    
    $result = $conn->query($sql);
    
    if ($result && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $ingredientes[] = $row;
        }
    }
    $conn->close(); 
    return $ingredientes;
}

function inserirComentario($comentario){
        $conexao = conectarBD(); 
        // Supondo que 'inserecomentario' tem um ID de chave primária auto-incrementável (ex: id_comentario)
        $consulta = "INSERT INTO inserecomentario (comentario) 
                    VALUES ('$comentario')";
        mysqli_query($conexao, $consulta); 
    }

    

    // U - Atualizar Comentário (Requer o ID do comentário)
    function atualizarComentario($idComentario, $novoComentario){
        $conexao = conectarBD(); 
        $consulta = "UPDATE inserecomentario SET comentario = '$novoComentario' WHERE id = '$idComentario'"; // Assumindo que a PK é 'id'
        mysqli_query($conexao, $consulta); 
    }

    // D - Deletar Comentário (Requer o ID do comentário)
    function deletarComentario($idComentario){
        $conexao = conectarBD(); 
        $consulta = "DELETE FROM inserecomentario WHERE id = '$idComentario'"; // Assumindo que a PK é 'id'
        mysqli_query($conexao, $consulta); 
    }

    // ----------------------------------------------------------------------
    // --- FUNÇÕES CRUD DE RECEITA ---
    // ----------------------------------------------------------------------
    // A função 'inserirReceita' já existe

    // U - Atualizar Receita (Requer o ID da Receita)
    function atualizarReceita($idReceita, $nomeUsuario, $nomeReceita, $dificuldade, $rendimento, $ingredientes, $modoPreparo, $caminhoDestino)
    {
        $conexao = conectarBD();
        $consulta = "UPDATE enviarreceita SET 
                    nome_usuario = '$nomeUsuario', 
                    receita_nome = '$nomeReceita', 
                    dificuldade = '$dificuldade', 
                    rendimento_porcoes = '$rendimento', 
                    ingredientes = '$ingredientes', 
                    modo_preparo = '$modoPreparo', 
                    foto_caminho = '$caminhoDestino'
                    WHERE id_receita = '$idReceita'"; // Assumindo que a PK é 'id_receita'
        mysqli_query($conexao, $consulta);
    }
    
    // D - Deletar Receita (Requer o ID da Receita)
    function deletarReceita($idReceita){
        $conexao = conectarBD();
        $consulta = "DELETE FROM enviarreceita WHERE id_receita = '$idReceita'"; // Assumindo que a PK é 'id_receita'
        mysqli_query($conexao, $consulta);
    }

    // ----------------------------------------------------------------------
    // --- FUNÇÕES CRUD DE INGREDIENTES DE INSPIRAÇÃO ---
    // ----------------------------------------------------------------------
    // A função 'inserirIngredientesInspiracao' já existe

    // U - Atualizar Ingredientes de Inspiração
    function atualizarIngredientesInspiracao($id, $ing1, $ing2, $ing3, $ing4, $ing5, $ing6) {
        $conexao = conectarBD();
        $consulta = "UPDATE ingredientes_inspiracao SET
                     ingrediente1 = '$ing1', 
                     ingrediente2 = '$ing2', 
                     ingrediente3 = '$ing3', 
                     ingrediente4 = '$ing4', 
                     ingrediente5 = '$ing5', 
                     ingrediente6 = '$ing6'
                     WHERE id = '$id'";
        mysqli_query($conexao, $consulta);
    }

    // D - Deletar Ingredientes de Inspiração
    function deletarIngredientesInspiracao($id) {
        $conexao = conectarBD();
        $consulta = "DELETE FROM ingredientes_inspiracao WHERE id = '$id'";
        mysqli_query($conexao, $consulta);
    }

?>