<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Verifica se o formulário foi submetido via método POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $texto = $_POST['texto'];
    limparArquivoTexto(); // Limpa o conteúdo do arquivo de texto
    escreverArquivoTexto($texto); // Escreve o novo texto no arquivo
}

// Função para limpar o conteúdo do arquivo de texto
function limparArquivoTexto() {
    $nomeArquivo = 'escrito_por_min.txt';
    if (file_exists($nomeArquivo)) {
        $fp = fopen($nomeArquivo, 'w');
        if ($fp) {
            fclose($fp);
        }
    }
}

// Função para escrever o texto no arquivo de texto
function escreverArquivoTexto($texto) {
    $nomeArquivo = 'escrito_por_min.txt';
    $fp = fopen($nomeArquivo, 'a+');
    if ($fp) {
        fputs($fp, "$texto\n");
        fclose($fp);
    }
    echo "[OK] Texto escrito com sucesso!";
}

$nomeArquivo = 'escrito_por_min.txt';

// Verifica se o parâmetro "download" está presente na URL
if (isset($_GET['download'])) {
    if (file_exists($nomeArquivo)) {
        // Configura os cabeçalhos para fazer o download do arquivo
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
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
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
        <label for="texto">Texto:</label><br>
        <textarea name="texto" id="texto" rows="5" cols="40"></textarea><br><br>
        <input type="submit" name="salvar" value="Salvar">
        <input type="submit" name="limpar" class="limpa" value="Limpar">
    </form>

    <br>

    <a href="?download=1">Download do Arquivo</a>
    <a href="escrito_por_min.txt" target="_blank">Visualizar o Arquivo</a>
</body>
</html>
