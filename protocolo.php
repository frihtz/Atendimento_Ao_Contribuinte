<?php
    include "conexao.php";

    function cadastrarProtocolo($descricao, $dataAbertura, $prazo, $contribuinteId) {
        global $conn;
        $sql = "INSERT INTO protocolo (descricao, data_abertura, prazo, contribuinte_id) 
                VALUES ('$descricao', '$dataAbertura', '$prazo', '$contribuinteId')";
    
        return $conn->query($sql);
    }
    
    function alterarProtocolo($id, $descricao, $dataAbertura, $prazo, $contribuinteId) {
        global $conn;
        $sql = "UPDATE protocolo 
                SET descricao='$descricao', data_abertura='$dataAbertura', prazo='$prazo', contribuinte_id='$contribuinteId' 
                WHERE id=$id";
    
        return $conn->query($sql);
    }
    
    function excluirProtocolo($id) {
        global $conn;
        $sql = "DELETE FROM protocolo WHERE id=$id";
    
        return $conn->query($sql);
    }
    
    function consultarProtocolos() {
        global $conn;
        $sql = "SELECT * FROM protocolo";
        $result = $conn->query($sql);
    
        $protocolos = [];
        while ($row = $result->fetch_assoc()) {
            $protocolos[] = $row;
        }
    
        return $protocolos;
    }
?>