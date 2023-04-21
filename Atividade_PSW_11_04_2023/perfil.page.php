<?php

session_start();


$nome = $_SESSION['nome'];
$email = $_SESSION['email'];
$senha = $_SESSION['senha'];
$turma = $_SESSION['turma'];
$matricula = $_SESSION['matricula'];
$preferida = $_SESSION['preferida'];
$cpf = $_SESSION['cpf'];


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/perfil.edit.css">
    <title>Perfil de <?php echo $_SESSION['nome']; ?></title>
</head>

<body>

    <?php

    include "header.html";

    ?>


    <div class="container-principal">

        <div class='box-fundo'>
            <div class='wave -one'></div>
            <div class='wave -two'></div>
            <div class='wave -three'></div>
        </div>
        <div class="box">
            <div class="form-box">
                <div class="caixa_resutado">
                    <h2> Esses são os seus dados:</h2>
                    <p> Deseja editar seus dados? <a href="editar.page.php"> Editar dados </a> </p>
                    <div class="linhas-forms">
                        <div class="input-group">
                            <label for="nome"> Nome Completo</label>
                            <p class="paragrafos"><?php echo $_SESSION['nome']; ?></p>
                        </div>
                        <div class="input-group">
                            <label for="turma"> Turma</label>
                            <p class="paragrafos"><?php echo $_SESSION['turma']; ?></p>
                        </div>
                    </div>
                    <div class="linhas-forms">
                        <div class="input-group">
                            <label for="numero-matricula"> Matricula</label>
                            <p class="paragrafos"><?php echo $_SESSION['matricula']; ?></p>
                        </div>
                        <div class="input-group">
                            <label for="materia-preferida"> Materia preferida </label>
                            <p class="paragrafos"><?php echo $_SESSION['preferida']; ?></p>
                        </div>
                        <div class="input-group">
                            <label for="cpf"> CPF </label>
                            <p class="paragrafos"><?php echo $_SESSION['cpf']; ?></p>
                        </div>
                    </div>
                    <div class="linhas-forms">
                        <div class="input-group">
                            <label for="email">E-mail</label>
                            <p class="paragrafos"><?php echo $_SESSION['email']; ?></p> 
                        </div>
                        <div class="input-group w50">
                            <label for="senha">Senha</label>
                            <p class="paragrafos"><?php echo $_SESSION['senha']; ?></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>


    <?php

    include "footer.html";

    ?>

</body>

</html>