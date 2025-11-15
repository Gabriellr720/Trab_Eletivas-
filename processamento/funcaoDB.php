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
    }

    function inserirComentario($comentario){

        $conexao = conectarBD(); 

        $consulta = "INSERT INTO inserecomentario (comentario) 
                    VALUES ('$comentario')";
        mysqli_query($conexao, $consulta); 
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

?>