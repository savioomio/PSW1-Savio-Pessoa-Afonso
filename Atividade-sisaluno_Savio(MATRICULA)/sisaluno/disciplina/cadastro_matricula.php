<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Matrícula</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Cadastrar Aluno em Disciplina</h1>
        <form method="POST" action="processar_matricula.php">
            <div class="mb-3">
                <label for="aluno">Selecione o Aluno:</label>
                <select class="form-select" id="aluno" name="aluno" required>
                    <!-- Carregar opções do banco de dados -->
                    <?php
                        require_once "../conn.php";

                        $stmt = $conn->prepare("SELECT id, nome FROM aluno");
                        $stmt->execute();
                        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($alunos as $aluno) {
                            echo '<option value="' . $aluno['id'] . '">' . $aluno['nome'] . '</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="disciplina">Selecione a Disciplina:</label>
                <select class="form-select" id="disciplina" name="disciplina" required>
                    <!-- Carregar opções do banco de dados -->
                    <?php
                        $stmt = $conn->prepare("SELECT id, nomedisciplina FROM disciplina");
                        $stmt->execute();
                        $disciplinas = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($disciplinas as $disciplina) {
                            echo '<option value="' . $disciplina['id'] . '">' . $disciplina['nomedisciplina'] . '</option>';
                        }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="cadastrar_matricula">Matrícula aluno</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
