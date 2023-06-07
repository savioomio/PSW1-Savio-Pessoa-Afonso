<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Verifica se o formulário foi submetido via método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cpf = $_POST['cpf'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    gravarAluno($cpf, $nome, $endereco, $telefone);
}

function gravarAluno($cpf, $nome, $endereco, $telefone)
{
    $aluno = array(
        $cpf => array(
            'nome' => $nome,
            'endereco' => $endereco,
            'telefone' => $telefone
        )
    );

    $aluno_json = json_encode($aluno);

    $nomeArquivo = 'alunos.txt';

    file_put_contents($nomeArquivo, $aluno_json, FILE_APPEND);

    echo "Aluno gravado com sucesso!";
}

$nomeArquivo = 'alunos.txt';

if (isset($_POST['download=1'])) {
    if (file_exists($nomeArquivo)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($nomeArquivo));
        header('Content-Length: ' . filesize($nomeArquivo));
        readfile($nomeArquivo);
        exit;
    } else {
        echo "O arquivo não existe.";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Salvar e Visualizar Arquivo de Texto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        h1 {
            text-align: center;
            color: #333;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }

        form {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            border-radius: 4px;
            width: 30%;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .forms {
            width: 95%;
            height: 3vh;
            padding: 10px;
            box-shadow: 0px 0px 5px 0px;
            border-radius: 6px;
            outline: none;
            border: 0px solid transparent;
            transition: all 0.4s ease;
        }

        .forms:focus {
            box-shadow: 0px 0px 40px -10px;
            transition: all 0.4s ease;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        input[type="reset"] {
            background-color: #4CAF50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin-top: 10px;
            cursor: pointer;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        input[type="reset"]:hover {
            background-color: #45a049;
        }

        a {
            display: inline-block;
            margin-top: 10px;
            color: #333;
            text-decoration: none;
            padding: 10px 20px;
            background-color: #f2f2f2;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #ddd;
        }
    </style>
</head>

<body>
    <h1>Salvar e Visualizar Arquivo de Texto</h1>
    <form method="POST" action="">
        <label for="cpf">CPF:</label><br>
        <input type="text" name="cpf" id="cpf" class="forms" required><br><br>

        <label for="nome">Nome:</label><br>
        <input type="text" name="nome" id="nome" class="forms" required><br><br>

        <label for="endereco">Endereço:</label><br>
        <input type="text" name="endereco" id="endereco" class="forms" required><br><br>

        <label for="telefone">Telefone:</label><br>
        <input type="text" name="telefone" id="telefone" class="forms" required><br><br>

        <input type="submit" name="salvar" value="Salvar">
        <input type="reset" name="limpar" class="limpa" value="Limpar">
    </form>

    <br>

    <a href="?download=1">Download do Arquivo</a>
    <a href="alunos.txt" target="_blank">Visualizar o Arquivo</a>
</body>

</html>
