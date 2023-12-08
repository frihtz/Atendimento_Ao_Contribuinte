<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Cadastro de Protocolo</title>
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
    <h2 class="mb-4">Cadastro de Protocolo</h2>

    <form action="processar_cadastro_protocolo.php" method="post">
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea class="form-control" id="descricao" name="descricao" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label for="data">Data:</label>
            <input type="date" class="form-control" id="data" name="data" required>
        </div>
        <div class="form-group">
            <label for="prazo">Prazo (em dias):</label>
            <input type="number" class="form-control" id="prazo" name="prazo" required>
        </div>
        <div class="form-group">
            <label for="contribuinte">Contribuinte:</label>
            <select class="form-control" id="contribuinte" name="contribuinte" required>
                <?php
                $servername = "localhost";
                $username = "admin";
                $password = "guaxi";
                $dbname = "sistema";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Conexão falhou: " . $conn->connect_error);
                }

                $sql = "SELECT id, nome FROM contribuintes";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo '<option value="' . $row['id'] . '">' . $row['nome'] . '</option>';
                    }
                } else {
                    echo '<option value="">Nenhum contribuinte encontrado</option>';
                }

                $conn->close();
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar Protocolo</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
