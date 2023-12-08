<?php
    include "pessoa.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $dataNascimento = $_POST["data_nascimento"];
        $cpf = $_POST["cpf"];
        $sexo = $_POST["sexo"];
        $cidade = $_POST["cidade"];
        $bairro = $_POST["bairro"];
        $rua = $_POST["rua"];
        $numero = $_POST["numero"];
        $complemento = $_POST["complemento"];
    
        $resultado = cadastrarPessoa($nome, $dataNascimento, $cpf, $sexo, $cidade, $bairro, $rua, $numero, $complemento);
    
        if ($resultado) {
            header("Location: consulta_pessoa.html");
        } else {
            echo "Erro ao cadastrar pessoa.";
        }
    }
?>
