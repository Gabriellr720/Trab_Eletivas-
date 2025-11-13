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
?>