<?php
// Requer o arquivo de conexão com o banco de dados
require_once "../conn.php";

// Verifica se o formulário de adição foi enviado
if (isset($_POST['adicionar'])) {
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $idade = $_POST['idade'];
    $dataNascimento = $_POST['datanascimento'];
    $endereco = $_POST['endereco'];
    $status = $_POST['status'];

    // Prepara e executa a query para adicionar o professor
    $stmt = $conn->prepare("INSERT INTO professor (nome, cpf, idade, datanascimento, endereco, estatus) VALUES (:nome, :cpf, :idade, :datanascimento, :endereco, :estatus)");
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':cpf', $cpf, PDO::PARAM_INT);
    $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
    $stmt->bindParam(':datanascimento', $dataNascimento);
    $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
    $stmt->bindParam(':estatus', $status, PDO::PARAM_STR);
    $stmt->execute();

    // Redireciona de volta para a página atual após a adição
    header("Location: index.php");
    exit();
}

// Verifica se o formulário de alteração foi enviado
if (isset($_POST['alterar']) && isset($_GET['id'])) {
    $idProfessor = $_GET['id'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $idade = $_POST['idade'];
    $dataNascimento = $_POST['datanascimento'];
    $endereco = $_POST['endereco'];
    $status = $_POST['status'];

    // Prepara e executa a query para atualizar os dados do professor
    $stmt = $conn->prepare("UPDATE professor SET nome = :nome, cpf = :cpf, idade = :idade, datanascimento = :datanascimento, endereco = :endereco, estatus = :estatus WHERE id = :id");
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
    $stmt->bindParam(':idade', $idade, PDO::PARAM_INT);
    $stmt->bindParam(':datanascimento', $dataNascimento);
    $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
    $stmt->bindParam(':estatus', $status, PDO::PARAM_STR);
    $stmt->bindParam(':id', $idProfessor, PDO::PARAM_INT);
    $stmt->execute();

    // Redireciona de volta para a página atual após a atualização
    header("Location: index.php");
    exit();
}

// Verifica se o formulário de exclusão foi enviado
if (isset($_POST['excluir']) && isset($_GET['id'])) {
    $idProfessor = $_GET['id'];

    // Prepara e executa a query para excluir o professor
    $stmt = $conn->prepare("DELETE FROM professor WHERE id = :id");
    $stmt->bindParam(':id', $idProfessor, PDO::PARAM_INT);
    $stmt->execute();

    // Redireciona de volta para a página atual após a exclusão
    header("Location: index.php");
    exit();
}

// Prepara e executa a query para selecionar todos os professores
$stmt = $conn->prepare("SELECT * FROM professor");
$stmt->execute();
$professores = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>

<head>
    <title>Professores</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
    <br>
    <br>  
    <h1>Lista de Professores</h1>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#adicionarModal"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-person-plus-fill" viewBox="0 0 20 20">
                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
            </svg>Adicionar Professor</button>
            <a href="../index.php">
            <button class="btn btn-secondary mb-3">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-database-fill-gear" viewBox="0 0 16 17">
                    <path d="M8 1c-1.573 0-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4s.875 1.755 1.904 2.223C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777C13.125 5.755 14 5.007 14 4s-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1Z" />
                    <path d="M2 7v-.839c.457.432 1.004.751 1.49.972C4.722 7.693 6.318 8 8 8s3.278-.307 4.51-.867c.486-.22 1.033-.54 1.49-.972V7c0 .424-.155.802-.411 1.133a4.51 4.51 0 0 0-4.815 1.843A12.31 12.31 0 0 1 8 10c-1.573 0-3.022-.289-4.096-.777C2.875 8.755 2 8.007 2 7Zm6.257 3.998L8 11c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V10c0 1.007.875 1.755 1.904 2.223C4.978 12.711 6.427 13 8 13h.027a4.552 4.552 0 0 1 .23-2.002Zm-.002 3L8 14c-1.682 0-3.278-.307-4.51-.867-.486-.22-1.033-.54-1.49-.972V13c0 1.007.875 1.755 1.904 2.223C4.978 15.711 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.507 4.507 0 0 1-1.3-1.905Zm3.631-4.538c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                </svg>
                </svg>Gerenciar SISALUNO</button>
        </a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Idade</th>
                    <th>Data de Nascimento</th>
                    <th>Endereço</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($professores as $professor) { ?>
                    <tr>
                        <td><?php echo $professor['id']; ?></td>
                        <td><?php echo $professor['nome']; ?></td>
                        <td><?php echo $professor['cpf']; ?></td>
                        <td><?php echo $professor['idade']; ?></td>
                        <td><?php echo $professor['datanascimento']; ?></td>
                        <td><?php echo $professor['endereco']; ?></td>
                        <td><?php echo $professor['estatus']; ?></td>
                        <td>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editarModal<?php echo $professor['id']; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 20 17">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                </svg>
                                Editar</a>
                            <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#excluirModal<?php echo $professor['id']; ?>">
                            
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 17">
                                    <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z" />
                                </svg> Excluir</a>
                        </td>
                    </tr>
                    <!-- Modal de edição -->
                    <div class="modal fade" id="editarModal<?php echo $professor['id']; ?>" tabindex="-1" aria-labelledby="editarModalLabel<?php echo $professor['id']; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editarModalLabel<?php echo $professor['id']; ?>">Editar Professor</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="index.php?id=<?php echo $professor['id']; ?>">
                                        <div class="mb-3">
                                            <label for="nome" class="form-label">Nome:</label>
                                            <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $professor['nome']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="cpf" class="form-label">CPF:</label>
                                            <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo $professor['cpf']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="idade" class="form-label">Idade:</label>
                                            <input type="number" class="form-control" id="idade" name="idade" value="<?php echo $professor['idade']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="datanascimento" class="form-label">Data de Nascimento:</label>
                                            <input type="date" class="form-control" id="datanascimento" name="datanascimento" value="<?php echo $professor['datanascimento']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="endereco" class="form-label">Endereço:</label>
                                            <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $professor['endereco']; ?>" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="status" class="form-label">Status:</label>
                                            <select class="form-select" id="status" name="status" required>
                                                <option value="Ativo" <?php if ($professor['estatus'] == 'Ativo') echo 'selected'; ?>>Ativo</option>
                                                <option value="Desativado" <?php if ($professor['estatus'] == 'Desativado') echo 'selected'; ?>>Desativado</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                            <button type="submit" class="btn btn-primary" name="alterar">Salvar Alterações</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal de exclusão -->
                    <div class="modal fade" id="excluirModal<?php echo $professor['id']; ?>" tabindex="-1" aria-labelledby="excluirModalLabel<?php echo $professor['id']; ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="excluirModalLabel<?php echo $professor['id']; ?>">Excluir Professor</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p>Você tem certeza que deseja excluir o professor com ID <?php echo $professor['id']; ?>?</p>
                                    <form method="POST" action="index.php?id=<?php echo $professor['id']; ?>">
                                        <div class="mb-3">
                                            <label for="confirmacao">Digite o ID do professor para confirmar:</label>
                                            <input type="text" class="form-control" id="confirmacao" name="confirmacao" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-danger" name="excluir">Excluir</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- Modal de adição -->
    <div class="modal fade" id="adicionarModal" tabindex="-1" aria-labelledby="adicionarModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adicionarModalLabel">Adicionar Professor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="index.php">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="cpf" class="form-label">CPF:</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" required>
                        </div>
                        <div class="mb-3">
                            <label for="idade" class="form-label">Idade:</label>
                            <input type="number" class="form-control" id="idade" name="idade" required>
                        </div>
                        <div class="mb-3">
                            <label for="datanascimento" class="form-label">Data de Nascimento:</label>
                            <input type="date" class="form-control" id="datanascimento" name="datanascimento" required>
                        </div>
                        <div class="mb-3">
                            <label for="endereco" class="form-label">Endereço:</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status:</label>
                            <select class="form-select" id="status" name="status" required>
                                <option value="Ativo">Ativo</option>
                                <option value="Desativado">Desativado</option>
                            </select>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-primary" name="adicionar">Adicionar Professor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>