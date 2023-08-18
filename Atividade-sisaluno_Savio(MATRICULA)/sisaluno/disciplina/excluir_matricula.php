<?php
require_once "../conn.php";

if (isset($_GET['aluno_id']) && isset($_GET['disciplina_id'])) {
    $alunoId = $_GET['aluno_id'];
    $disciplinaId = $_GET['disciplina_id'];

    $stmt = $conn->prepare("DELETE FROM matricula WHERE idAluno = :alunoId AND idDisciplina = :disciplinaId");
    $stmt->bindParam(':alunoId', $alunoId, PDO::PARAM_INT);
    $stmt->bindParam(':disciplinaId', $disciplinaId, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: lista_alunos_disciplina.php?disciplina_id=" . $disciplinaId);
    exit();
}
?>
