<?php
include_once 'funcaoDB.php'; 

if (isset($_FILES["foto-receita"]) && !empty($_FILES["foto-receita"]["name"])) 
    {
        $nomeArquivoSeguro = basename($_FILES["foto-receita"]["name"]);
        $caminhoDestino = "../uploads/" . $nomeArquivoSeguro; 
        if (move_uploaded_file($_FILES["foto-receita"]["tmp_name"], $caminhoDestino)) {
            echo "Upload realizado com sucesso!";
        } else {
            echo "Erro no upload do arquivo.";
        }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nomeUsuario = $_POST['nomePessoa']; 
    $nomeReceita = $_POST['nomeReceita'];
    $dificuldadeReceita = $_POST['dificuldadeReceita'];
    $porcaoReceita = $_POST['porcaoReceita'];
    $ingredientes = $_POST['ingredientes'];
    $modoPreparo = $_POST['modoPreparo'];

    if (empty($nomeUsuario) || empty($nomeReceita)) {
        header("Location: ../view/enviarReceita.html?erro=dados_basicos_faltando");
        exit();
    }

    inserirReceita(
        $nomeUsuario, 
        $nomeReceita,
        $dificuldadeReceita,
        $porcaoReceita,
        $ingredientes,
        $modoPreparo,
        $caminhoDestino
    );

    header("Location: ../view/home.html?status=receita_enviada");
    exit();

} else {
    header("Location: ../view/enviarReceita.html");
    exit();
}
?>