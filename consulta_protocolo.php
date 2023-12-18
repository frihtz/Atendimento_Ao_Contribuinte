<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Consulta de Protocolos</title>
    <style>
        body {
            background-color: #343a40;
            color: #fff;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-top: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            color: #495057;
        }
        h2 {
            color: #000;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Consulta de Protocolos</h2>

    <?php
    $servername = "localhost";
    $username = "admin";
    $password = "guaxi";
    $dbname = "sistema";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }

    $sql = "SELECT protocolos.id as protocolo_id, protocolos.descricao, protocolos.data, protocolos.prazo, pessoas.nome as contribuinte_nome
            FROM protocolos
            JOIN pessoas ON protocolos.contribuinte_id = pessoas.id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Protocolo #' . $row['protocolo_id'] . '</h5>
                        <p class="card-text">Descrição: ' . $row['descricao'] . '</p>
                        <p class="card-text">Data de Abertura: ' . $row['data'] . '</p>
                        <p class="card-text">Prazo: ' . $row['prazo'] . ' dias</p>
                        <p class="card-text">Contribuinte: ' . $row['contribuinte_nome'] . '</p>
                        
                        <button class="btn btn-primary" onclick="mostrarFormulario(' . $row['protocolo_id'] . ')">Editar</button>
                        
                        <form class="edit-form" id="editForm' . $row['protocolo_id'] . '" action="editar_protocolo.php" method="post">
                            <input type="hidden" name="protocolo_id" value="' . $row['protocolo_id'] . '">
                            <div class="form-group">
                                <label for="editDescricao">Nova Descrição:</label>
                                <textarea class="form-control" id="editDescricao" name="editDescricao" rows="3" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="editData">Nova Data de Abertura:</label>
                                <input type="date" class="form-control" id="editData" name="editData" required>
                            </div>
                            <div class="form-group">
                                <label for="editPrazo">Novo Prazo (em dias):</label>
                                <input type="number" class="form-control" id="editPrazo" name="editPrazo" required>
                            </div>
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </form>
                    </div>
                </div>';
        }
    } else {
        echo '<p>Nenhum protocolo encontrado.</p>';
    }

    $conn->close();
    ?>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function mostrarFormulario(id) {
        document.querySelectorAll('.edit-form').forEach(function (form) {
            form.style.display = 'none';
        });

        document.getElementById('editForm' + id).style.display = 'block';
    }
</script>

</body>
</html>
