<!DOCTYPE html>
<html>

<head>
    <title>Alunos Matriculados na Disciplina</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h1>Alunos Matriculados na Disciplina</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome do Aluno</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once "../conn.php";

                if (isset($_GET['disciplina_id'])) {
                    $disciplinaId = $_GET['disciplina_id'];

                    $stmt = $conn->prepare("SELECT aluno.id, aluno.nome FROM aluno
                                            INNER JOIN matricula ON aluno.id = matricula.idAluno
                                            WHERE matricula.idDisciplina = :disciplinaId");
                    $stmt->bindParam(':disciplinaId', $disciplinaId, PDO::PARAM_INT);
                    $stmt->execute();
                    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    foreach ($alunos as $aluno) {
                        echo '<tr>';
                        echo '<td>' . $aluno['nome'] . '</td>';
                        echo '<td><a class="btn btn-danger" href="excluir_matricula.php?aluno_id=' . $aluno['id'] . '&disciplina_id=' . $disciplinaId . '">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="bi bi-backspace-reverse" viewBox="0 0 16 18">
  <path d="M9.854 5.146a.5.5 0 0 1 0 .708L7.707 8l2.147 2.146a.5.5 0 0 1-.708.708L7 8.707l-2.146 2.147a.5.5 0 0 1-.708-.708L6.293 8 4.146 5.854a.5.5 0 1 1 .708-.708L7 7.293l2.146-2.147a.5.5 0 0 1 .708 0z"/>
  <path d="M2 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h7.08a2 2 0 0 0 1.519-.698l4.843-5.651a1 1 0 0 0 0-1.302L10.6 1.7A2 2 0 0 0 9.08 1H2zm7.08 1a1 1 0 0 1 .76.35L14.682 8l-4.844 5.65a1 1 0 0 1-.759.35H2a1 1 0 0 1-1-1V3a1 1 0 0 1 1-1h7.08z"/>
</svg>
                        Desmatricular</a></td>';
                        echo '</tr>';
                    }
                }
                ?>
            </tbody>
        </table>
        <a href="cadastro_matricula.php" class="btn btn-primary">Nova matricula</a>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>