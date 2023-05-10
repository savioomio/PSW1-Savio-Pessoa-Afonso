<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funções_Sávio</title>
    <style>
        body {
            background-color: #f7f7f7;
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.1);
        }

        pre {
            background-color: #eee;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0px 0px 6px rgba(0, 0, 0);
            font-size: 14px;
        }

        hr {
            border: none;
            height: 1px;
            background-color: #ddd;
            margin: 20px 0;
        }

        h2 {
            color: #666;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1);
            margin: 30px 0 10px;
        }
    </style>
</head>

<body>
    <h1>Funções</h1>
    <?php
    // Definindo dois arrays
    $pets = [
        'borboleta',
        'cobra',
        'caranguejeira'
    ];
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

    // Exibindo os arrays com a função print_r()
    echo '<pre>';
    print_r(array_values($alunos));
    echo '</pre>';

    echo '<pre>';
    print_r(array_values($pets));
    echo '</pre>';

    // Verificando se "Sávio" está presente no array $alunos usando um loop foreach
    $found = false;
    foreach ($alunos as $aluno) {
        if ($aluno['nome'] === 'Sávio') {
            $found = true;
            break;
        }
    }
    print_r($found);
    echo '</br>';

    // Verificando se "caranguejeira" está presente no array $pets
    print_r(in_array('caranguejeira', $pets));
    echo '<br></br>';

    // Verificando se "cobra" está presente no array $pets usando a função var_dump() para exibir o resultado bool
    var_dump(in_array('cobra', $pets));
    echo '</br>';

    // Encontrando a chave do elemento "cobra" no array $pets usando a função array_search()
    var_dump(array_search('cobra', $pets));
    echo '<br></br>';

    // Verificando se o índice 'rg' existe no primeiro elemento do array $alunos usando a função isset() e var_dump()
    var_dump(isset($alunos[0]['rg']));
    echo '<br></br>';

    // Separando a string "Sávio Pessôa Afonso " em um array usando a função explode() e exibindo o resultado com print_r()
    print_r(explode(' ', 'Sávio Pessôa Afonso'));
    echo '<br></br>';

    // Ordenando o array $pets em ordem alfabética usando a função sort() e exibindo o resultado com print_r()
    sort($pets);
    print_r($pets);
    echo '<hr>';

    // Ordenando o array $alunos em ordem alfabética pelo nome usando a função uasort() e exibindo o resultado com print_r()
    uasort($alunos, function ($a, $b) {
        if ($a['nome'] == $b['nome']) return 0;
        return $a['nome'] < $b['nome'] ? -1 : 1;
    });
    echo '<pre>';
    print_r($alunos);
    echo '</pre>';

    echo '<hr>';

    echo '<h2>Foreach</h2>';

    // Iterando sobre o array $alunos usando foreach e exibindo a chave e o valor
    foreach ($alunos as $key => $value) {
        echo "Chave: $key";
        echo '<pre>';
        print_r($value);
        echo '</pre>';
    }

    echo '<h2>Foreach Aninhado</h2>';

    // Iterando sobre o array $alunos usando foreach aninhado e exibindo a chave e o valor de cada elemento interno
    foreach ($alunos as $key => $value) {
        foreach ($value as $Nkey => $Nvalue) {
            echo "Chave: $Nkey";
            echo '<pre>';
            echo $Nvalue;
            echo '<br>';
            echo '</pre>';
        }
    }
    ?>
</body>

</html>