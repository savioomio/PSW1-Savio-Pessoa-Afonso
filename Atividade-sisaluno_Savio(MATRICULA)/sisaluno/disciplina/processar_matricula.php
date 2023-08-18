<?php
require_once "../conn.php";

if (isset($_POST['cadastrar_matricula'])) {
    $alunoId = $_POST['aluno'];
    $disciplinaId = $_POST['disciplina'];

    $stmt = $conn->prepare("INSERT INTO matricula (idAluno, idDisciplina) VALUES (:alunoId, :disciplinaId)");
    $stmt->bindParam(':alunoId', $alunoId, PDO::PARAM_INT);
    $stmt->bindParam(':disciplinaId', $disciplinaId, PDO::PARAM_INT);
    $stmt->execute();

    header("Location: lista_alunos_disciplina.php?disciplina_id=" . $disciplinaId);
    exit();
}
?>
