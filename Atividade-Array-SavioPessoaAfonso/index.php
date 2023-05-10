<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Arrays-Exercicios</title>
</head>

<style>
        body {
            background-color: #f2f2f2;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        h1 {
            text-align: center;
            color: #333;
            text-shadow: 1px 1px #999;
        }
        h2 {
            color: #333;
            text-shadow: 1px 1px #999;
        }
        p {
            background-color: #fff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px #999;
            margin-bottom: 10px;
        }
    </style>


<body>

    <h1>Arrays-Exercicios</h1>

    <?php

    echo '<h2> Exercicios de arrays - Sávio Pessôa Afonso</h2>';

    echo '<hr>';

    $notas_alunos = array(
        '<b>PSW1</b>' => array(
            'Avaliação' => 6,
            'Teste' => 7
        ),
        '<b>BD</b>' => array(
            'Avaliação' => 5,
            'Teste' => 9
        ),
        '<b>Redes</b>' => array(
            'Avaliação' => 10,
            'Teste' => 10
        ),
        '<b>ASW1</b>' => array(
            'Avaliação' => 4,
            'Teste' => 2
        ),
        '<b>PI1</b>' => array(
            'Avaliação' => 8,
            'Teste' => 9
        )
    );


    foreach ($notas_alunos as $disciplina => $notas) {
        $media = ($notas['Avaliação'] + $notas['Teste']) / 2;
        echo '<p>'.$disciplina.': ';
        foreach ($notas as $tipo => $nota) {
            echo '<br>'.$tipo.'='.$nota.' ';
        }
        echo '<br>'.'Média='.$media.'</p>';
    }
   
    echo '<hr>';

    ?>


</body>

</html>
