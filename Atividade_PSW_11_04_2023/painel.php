<?php

session_start();

$_SESSION['nome'] = $_POST['nome'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['senha'] = $_POST['password'];
$_SESSION['turma'] = $_POST['turma'];
$_SESSION['matricula'] = $_POST['numero-matricula'];
$_SESSION['preferida'] = $_POST['materia-preferida'];
$_SESSION['cpf'] = $_POST['cpf'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/stylea.css">
    <title>Painel de administrativo</title>
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
                <h2>Painel de acesso</h2>
                <br>
                <p> Bem vindo: <?php echo $_SESSION['nome']; ?> </p>
                <div class="input-group">
                    <a href="index.php"><button class="sair">Sair</button></a>
                </div>
            </div>
        </div>
    </div>

    <?php

    include "footer.html";

    ?>

</body>

</html>