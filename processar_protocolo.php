<?php
include "protocolo.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $descricao = $_POST["descricao"];
    $dataAbertura = $_POST["data_abertura"];
    $prazo = $_POST["prazo"];
    $contribuinteId = $_POST["contribuinte_id"];

    $resultado = cadastrarProtocolo($descricao, $dataAbertura, $prazo, $contribuinteId);

    if ($resultado) {
        header("Location: consulta_protocolo.html");
    } else {
        echo "Erro ao cadastrar protocolo.";
    }
}
?>
