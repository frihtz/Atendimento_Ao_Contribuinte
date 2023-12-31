<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Consulta de Pessoas</title>
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
        .edit-form {
            display: none;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Consulta de Pessoas</h2>

    <?php
    include "pessoa.php";

    $pessoas = consultarPessoas();

    if (!empty($pessoas)) {
        foreach ($pessoas as $pessoa) {
            echo '<div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">' . $pessoa['nome'] . '</h5>
                        <p class="card-text">ID: ' . $pessoa['id'] . '</p>
                        <p class="card-text">Data de Nascimento: ' . $pessoa['data_nascimento'] . '</p>
                        <p class="card-text">CPF: ' . $pessoa['cpf'] . '</p>
                        <p class="card-text">Sexo: ' . $pessoa['sexo'] . '</p>
                        <p class="card-text">Cidade: ' . $pessoa['cidade'] . '</p>
                        
                        <button class="btn btn-primary" onclick="mostrarFormulario(' . $pessoa['id'] . ')">Editar</button>
                        
                        <form class="edit-form" id="editForm' . $pessoa['id'] . '" action="editar_pessoa.php" method="post">
                            <input type="hidden" name="id" value="' . $pessoa['id'] . '">
                            <div class="form-group">
                                <label for="editNome">Novo Nome:</label>
                                <input type="text" class="form-control" id="editNome" name="editNome" required>
                            </div>
                            <div class="form-group">
                                <label for="editDataNascimento">Nova Data de Nascimento:</label>
                                <input type="date" class="form-control" id="editDataNascimento" name="editDataNascimento" required>
                            </div>
                            <div class="form-group">
                                <label for="editCpf">Novo CPF:</label>
                                <input type="text" class="form-control" id="editCpf" name="editCpf" required>
                            </div>
                            <button type="submit" class="btn btn-success">Salvar</button>
                        </form>
                        
                    </div>
                </div>';
        }
    } else {
        echo '<p>Nenhuma pessoa cadastrada.</p>';
    }
    ?>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function mostrarFormulario(id) {
        document.querySelectorAll('.edit-form').forEach(function(form) {
            form.style.display = 'none';
        });

        document.getElementById('editForm' + id).style.display = 'block';
    }
</script>

</body>
</html>