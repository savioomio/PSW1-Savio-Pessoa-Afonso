<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lacos_Sávio</title>
</head>

<body>
    <?php
    $alunos = [
        [
            'nome' => 'Sávio',
            'matricula' => '20211GBI29I',
            'cpf' => 06411242526,
            'rg' => null
        ],
        [
            'nome' => 'Pessôa',
            'matricula' => '20211GBI29I',
            'cpf' => 06411242526,
            'rg' => null
        ],
        [
            'nome' => 'Afonso',
            'matricula' => '20211GBI29I',
            'cpf' => 06411242526,
            'rg' => null
        ]

    ];
    uasort($alunos, function ($a, $b) {
        if ($a['nome'] == $b['nome']) return 0;
        return $a['nome'] < $b['nome'] ? -1 : 1;
    });
    echo '<pre>';
    print_r(array_values($alunos));
    echo '</pre>';

    echo '<hr>';

    echo '<h2>Forech</h2>';

    foreach ($alunos as $key => $value) {
        echo $key;
        echo '<pre>';
        print_r($alunos);
        echo '</pre>';
    }
    echo '<h2>Forech Aninhado</h2>';

    foreach ($alunos as $key => $value) {
        foreach ($value as $Nkey => $Nvalue) {
            echo $Nkey;
            echo '<pre>';
            echo $Nvalue;
            echo '<br>';
            echo '</pre>';
        }
    }

    ?>
</body>

</html>