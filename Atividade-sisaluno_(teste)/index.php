<?php

include_once "funcoes.php";

?>
<!DOCTYPE html>
<html>
<head>
    <title>Gestão de Professores</title>
    <!-- Inclui o arquivo CSS do Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Inclui o arquivo CSS do Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
    <div class="container shadow-lg">
        <h2 class="mt-4">Gestão de Professores</h2>

        <!-- Modal de Inserção -->
        <div class="modal fade" id="insertModal" tabindex="-1" aria-labelledby="insertModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content shadow-sm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="insertModalLabel">Inserir Professor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome:</label>
                                <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite o nome do professor" required>
                            </div>

                            <div class="mb-3">
                                <label for="disciplina" class="form-label">Disciplina:</label>
                                <input type="text" class="form-control" id="disciplina" name="disciplina" placeholder="Digite a disciplina" required>
                            </div>

                            <button type="submit" class="btn btn-primary" name="inserir"><i class="bi bi-plus"></i> Inserir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de Edição -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content shadow-sm">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Editar Professor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="funcoes.php">
                            <input type="hidden" name="id" id="editId">
                            <div class="mb-3">
                                <label for="editNome" class="form-label">Nome:</label>
                                <input type="text" class="form-control" id="editNome" name="nome" placeholder="Digite o nome do professor" required>
                            </div>

                            <div class="mb-3">
                                <label for="editDisciplina" class="form-label">Disciplina:</label>
                                <input type="text" class="form-control" id="editDisciplina" name="disciplina" placeholder="Digite a disciplina" required>
                            </div>

                            <button type="submit" class="btn btn-primary" name="alterar"><i class="bi bi-check"></i> Salvar Alterações</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary mt-3 mb-4" data-bs-toggle="modal" data-bs-target="#insertModal"><i class="bi bi-plus"></i> Inserir Professor</button>

        <h3>Lista de Professores</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Disciplina</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($result) > 0) {
                    foreach ($result as $row) {
                        $id = $row["id"];
                        $nome = $row["nome"];
                        $disciplina = $row["disciplina"];
                        echo "<tr>";
                        echo "<td>$nome</td>";
                        echo "<td>$disciplina</td>";
                        echo "<td>";
                        echo "<button type='button' class='btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#editModal' data-id='$id' data-nome='$nome' data-disciplina='$disciplina'><i class='bi bi-pencil-fill'></i> Editar</button>";
                        echo "<form method='POST' style='display: inline;'>";
                        echo "<input type='hidden' name='id' value='$id'>";
                        echo "<button type='submit' class='btn btn-sm btn-danger' name='excluir'><i class='bi bi-trash-fill'></i> Excluir</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>Nenhum professor encontrado.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- Inclui o arquivo JavaScript do Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Popula os dados do professor no modal de edição
        var editModal = document.getElementById('editModal');
        editModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var nome = button.getAttribute('data-nome');
            var disciplina = button.getAttribute('data-disciplina');

            var modalId = editModal.querySelector('#editId');
            var modalNome = editModal.querySelector('#editNome');
            var modalDisciplina = editModal.querySelector('#editDisciplina');

            modalId.value = id;
            modalNome.value = nome;
            modalDisciplina.value = disciplina;
        });
    </script>
</body>
</html>

<?php
// Fecha a conexão com o banco de dados
$conn = null;
?>