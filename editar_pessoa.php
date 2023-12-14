<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"];
    $novoNome = $_POST["novoNome"];
    $novaDataNascimento = $_POST["novaDataNascimento"];
    $novoCPF = $_POST["novoCPF"];
    $novoSexo = $_POST["novoSexo"];

    $sql = "UPDATE pessoas SET nome = '$novoNome', data_nascimento = '$novaDataNascimento', cpf = '$novoCPF', sexo = '$novoSexo' WHERE id = $id";

    $servername = "localhost";
    $username = "admin";
    $password = "guaxi";
    $dbname = "sistema";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    if ($conn->query($sql) === TRUE) {
        echo "Registro atualizado com sucesso";
    } else {
        echo "Erro ao atualizar o registro: " . $conn->error;
    }

    $conn->close();
} else {
    header("Location: consulta_pessoa.php");
    exit();
}
?>
