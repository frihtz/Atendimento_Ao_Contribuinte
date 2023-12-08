<?php
include "protocolo.php";  // Inclua o arquivo com as funções relacionadas a protocolos

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera os dados do formulário
    $descricao = $_POST["descricao"];
    $dataAbertura = $_POST["data_abertura"];
    $prazo = $_POST["prazo"];
    $contribuinteId = $_POST["contribuinte_id"];

    // Chama a função de cadastro de protocolo
    $resultado = cadastrarProtocolo($descricao, $dataAbertura, $prazo, $contribuinteId);

    // Verifica o resultado e redirecione conforme necessário
    if ($resultado) {
        header("Location: consulta_protocolo.html");  // Redireciona para a página de consulta de protocolos
    } else {
        echo "Erro ao cadastrar protocolo.";
    }
}
?>
