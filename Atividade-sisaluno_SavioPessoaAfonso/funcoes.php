<?php
require_once "conn.php";

// Verifica se o formulário de inserção foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["inserir"])) {
    $nome = $_POST["nome"];
    $disciplina = $_POST["disciplina"];

    // Insere o professor no banco de dados
    $sql = "INSERT INTO professores (nome, disciplina) VALUES (:nome, :disciplina)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':disciplina', $disciplina);
    if ($stmt->execute()) {
        echo "Professor inserido com sucesso.";
        header('Location: index.php');
    } else {
        echo "Erro ao inserir professor.";
        header('Location: index.php');
    }
}

// Verifica se o formulário de exclusão foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["excluir"])) {
    $id = $_POST["id"];

    // Exclui o professor do banco de dados
    $sql = "DELETE FROM professores WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        echo "Professor excluído com sucesso.";
        header('Location: index.php');
    } else {
        echo "Erro ao excluir professor.";
        header('Location: index.php');
    }
}

// Verifica se o formulário de alteração foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["alterar"])) {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $disciplina = $_POST["disciplina"];

    // Atualiza os dados do professor no banco de dados
    $sql = "UPDATE professores SET nome = :nome, disciplina = :disciplina WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':disciplina', $disciplina);
    $stmt->bindParam(':id', $id);
    if ($stmt->execute()) {
        echo "Professor alterado com sucesso.";
        header('Location: index.php');
    } else {
        echo "Erro ao alterar professor.";
        header('Location: index.php');
    }
}

// Obtém a lista de professores do banco de dados
$sql = "SELECT * FROM professores";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Verifica se o formulário de edição foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["editar"])) {
    $id = $_POST["id"];

    // Obtém os dados do professor selecionado
    $sql = "SELECT * FROM professores WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $professor = $stmt->fetch(PDO::FETCH_ASSOC);
    header('Location: index.php');
}
?>