<?php
    funtion conectarBD(){
        $conexao = mysqli_connect("localhost", "root", "", "Trab-Eletivas-");
        return ($conexao); 
    }

    function inserirCliente($email, $senha){

        $conexao = conectarBD();
        $consulta = "INSERT INTO usuario(email, senha) VALUES ('$email', '$senha')"; 

        mysqli_query($conexao, $consulta); 
    }
   
?>