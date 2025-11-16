<?php
        function conectarBD(){
        $conexao = mysqli_connect("localhost", "root", "", "trab_eletivas");
        return ($conexao); 
    }

    function inserirCliente($cpf, $nome, $sobrenome, $telefone, $email, $senha, $dataNasc){

        $conexao = conectarBD();
        
        $consulta = "INSERT INTO usuario (cpf, nome, sobrenome, telefone, email, senha, dataNasc)
                 VALUES ('$cpf', '$nome', '$sobrenome', '$telefone', '$email', '$senha', '$dataNasc')"; 
                 
                mysqli_query($conexao, $consulta); 
                mysqli_close($conexao); 
    }

    function inserirComentario($comentario){

        $conexao = conectarBD(); 

        $consulta = "INSERT INTO inserecomentario (comentario) 
                    VALUES ('$comentario')";
        mysqli_query($conexao, $consulta); 
        mysqli_close($conexao);
    }



    function retornarCliente(){

        $conexao = conectarBD();
        $consulta = "SELECT * FROM usuario"; 
        $listaCliente = mysqli_query($conexao, $consulta); 
        return $listaCliente; 
    }

    function retornarComentario(){

        $conexao = conectarBD();
        $consulta = "SELECT * FROM inserecomentario"; 
        $listaComentario = mysqli_query($conexao, $consulta); 
        return $listaComentario; 
    }

    function deletarCliente($cpf){
        $conexao = conectarBD();
        
        $consulta = "DELETE FROM usuario WHERE cpf = '$cpf'";
        mysqli_query($conexao, $consulta);
    }

    function retornarClientePorCpf($cpf) {
  
    $conexao = conectarBD(); 

   
    $consulta = "SELECT * FROM USUARIO WHERE cpf = '$cpf'";
    
   
    $resultado = mysqli_query($conexao, $consulta);
    
    if (mysqli_num_rows($resultado) > 0) {
        return mysqli_fetch_assoc($resultado);
    } else {
        return false; 
    }
    }


    
    function atualizarCliente($cpfAntigo, $cpfNovo, $nome, $sobrenome, $telefone, $email, $senha, $dataNasc){
        $conexao = conectarBD();

        $consulta = "UPDATE usuario SET 
                    cpf = '$cpfNovo', 
                    nome = '$nome', 
                    sobrenome = '$sobrenome', 
                    telefone = '$telefone', 
                    email = '$email', 
                    senha = '$senha', 
                    dataNasc = '$dataNasc'
                    WHERE cpf = '$cpfAntigo'";
        mysqli_query($conexao, $consulta); 
    }



    function inserirReceita($nomeUsuario, $nomeReceita, $dificuldade, $rendimento, $ingredientes, $modoPreparo, $caminhoDestino)
    {
        $conexao = conectarBD();

        $consulta = "INSERT INTO enviarreceita (nome_usuario, receita_nome, dificuldade, rendimento_porcoes, ingredientes, modo_preparo, foto_caminho)
        VALUES ('$nomeUsuario', '$nomeReceita', '$dificuldade', '$rendimento', '$ingredientes', '$modoPreparo', '$caminhoDestino')";
    
        $resultado = mysqli_query($conexao, $consulta);
    
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

function buscarUsuarioPorEmail($email){
    $conexao = conectarBD();

    $email_safe = mysqli_real_escape_string($conexao, $email);
    
    $consulta = "SELECT * FROM usuario WHERE email = '$email_safe'";
    
    $resultado = mysqli_query($conexao, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        $usuario = mysqli_fetch_assoc($resultado);
    } else {
        $usuario = false;
    }

    mysqli_close($conexao);
    return $usuario;
}

?>