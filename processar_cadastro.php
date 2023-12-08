<?php
    include "pessoa.php";  // Inclui o arquivo com as funções relacionadas a pessoas

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recupera os dados do formulário
        $nome = $_POST["nome"];
        $dataNascimento = $_POST["data_nascimento"];
        $cpf = $_POST["cpf"];
        $sexo = $_POST["sexo"];
        $cidade = $_POST["cidade"];
        $bairro = $_POST["bairro"];
        $rua = $_POST["rua"];
        $numero = $_POST["numero"];
        $complemento = $_POST["complemento"];
    
        // Chama a função de cadastro de pessoa
        $resultado = cadastrarPessoa($nome, $dataNascimento, $cpf, $sexo, $cidade, $bairro, $rua, $numero, $complemento);
    
        // Verifica o resultado e redireciona conforme necessário
        if ($resultado) {
            header("Location: consulta_pessoa.html");  // Redireciona para a página de consulta de pessoas
        } else {
            echo "Erro ao cadastrar pessoa.";
        }
    }
?>
