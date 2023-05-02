<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Arrays-Exercicios</title>
</head>

<body>
    <h1>arrays-Exercicios</h1>

    <?php

    echo '<h2> Exercicios de arrays - Sávio Pessôa Afonso</h2>';

    echo '<hr>';


    $notas_alunos = array(
        'PSW1' => array(
            'avaliação' => 6,
            'teste' => 7
        ),
        'BD' => array(
            'avaliação' => 5,
            'teste' => 9
        ),
        'Redes' => array(
            'avaliação' => 10,
            'teste' => 10
        ),
        'ASW1' => array(
            'avaliação' => 4,
            'teste' => 2
        ),
        'PI1' => array(
            'avaliação' => 8,
            'teste' => 9
        )
    );


    foreach ($notas_alunos as $disciplina => $notas) {
        echo '<p>'.$disciplina.': ';
        foreach ($notas as $tipo => $nota) {
            echo $tipo.'='.$nota.' ';
        }
        echo '</p>';
    }
    

    echo '<hr>';

    ?>

</body>

</html>