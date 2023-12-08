<?php
   include "conexao.php"

   function cadastrarPessoa($nome, $dataNascimento, $cpf, $sexo, $cidade, $bairro, $rua, $numero, $complemento) {
       global $conn;
       $sql = "INSERT INTO pessoa (nome, data_nascimento, cpf, sexo, cidade, bairro, rua, numero, complemento) 
               VALUES ('$nome', '$dataNascimento', '$cpf', '$sexo', '$cidade', '$bairro', '$rua', '$numero', '$complemento')";
   
       return $conn->query($sql);
   }
   
   function alterarPessoa($id, $nome, $dataNascimento, $cpf, $sexo, $cidade, $bairro, $rua, $numero, $complemento) {
       global $conn;
       $sql = "UPDATE pessoa 
               SET nome='$nome', data_nascimento='$dataNascimento', cpf='$cpf', sexo='$sexo', 
                   cidade='$cidade', bairro='$bairro', rua='$rua', numero='$numero', complemento='$complemento' 
               WHERE id=$id";
   
       return $conn->query($sql);
   }
   
   function excluirPessoa($id) {
       global $conn;
       $sql = "DELETE FROM pessoa WHERE id=$id";
   
       return $conn->query($sql);
   }
   
   function consultarPessoas() {
       global $conn;
       $sql = "SELECT * FROM pessoa";
       $result = $conn->query($sql);
   
       $pessoas = [];
       while ($row = $result->fetch_assoc()) {
           $pessoas[] = $row;
       }
   
       return $pessoas;
?>