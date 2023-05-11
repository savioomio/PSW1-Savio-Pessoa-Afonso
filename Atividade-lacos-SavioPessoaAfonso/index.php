<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laços_Sávio</title>
    <style>
        body {
            background-color: #f2f2f2;
        }

        pre {
            background-color:#16524E   ;
            color: #fff;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            font-size: 14px;
            line-height: 1.5;
        }
    </style>
</head>

<body>
    <?php
    $Array = [
        "cursos" => [
            [
                "nome_curso" => "Ciência da Computação",
                "alunos" => [
                    [
                        "nome" => "Sávio",
                        "disciplinas" => [
                            [
                                "nome_disciplina" => "PSW1",
                                "notas" => [8, 7]
                            ],
                            [
                                "nome_disciplina" => "ASW",
                                "notas" => [9, 6]
                            ],
                            [
                                "nome_disciplina" => "PI1",
                                "notas" => [10, 8]
                            ]
                        ]
                    ],
                    [
                        "nome" => "Afonso",
                        "disciplinas" => [
                            [
                                "nome_disciplina" => "PSW1",
                                "notas" => [7, 9]
                            ],
                            [
                                "nome_disciplina" => "ASW",
                                "notas" => [8, 5]
                            ],
                            [
                                "nome_disciplina" => "PI1",
                                "notas" => [9, 7]
                            ]
                        ]
                    ],
                    [
                        "nome" => "Pessôa",
                        "disciplinas" => [
                            [
                                "nome_disciplina" => "PSW1",
                                "notas" => [6, 5]
                            ],
                            [
                                "nome_disciplina" => "ASW",
                                "notas" => [8, 7]
                            ],
                            [
                                "nome_disciplina" => "PI1",
                                "notas" => [9, 8]
                            ]
                        ]
                    ],
                    [
                        "nome" => "Irrinel",
                        "disciplinas" => [
                            [
                                "nome_disciplina" => "PSW1",
                                "notas" => [9, 8]
                            ],
                            [
                                "nome_disciplina" => "ASW",
                                "notas" => [7, 5]
                            ],
                            [
                                "nome_disciplina" => "PI1",
                                "notas" => [8, 7]
                            ]
                        ]
                    ]
                ]
            ],
            [
                "nome_curso" => "Engenharia de Software",
                "alunos" => [
                    [
                        "nome" => "Cimas",
                        "disciplinas" => [
                            [
                                "nome_disciplina" => "PSW1",
                                "notas" => [9, 7]
                            ],
                            [
                                "nome_disciplina" => "ASW",
                                "notas" => [10, 9]
                            ],
                            [
                                "nome_disciplina" => "PI1",
                                "notas" => [8, 6]
                            ]
                        ]
                    ],
                    [
                        "nome" => "Turbano",
                        "disciplinas" => [
                            [
                                "nome_disciplina" => "PSW1",
                                "notas" => [7, 8]
                            ],
                            [
                                "nome_disciplina" => "ASW",
                                "notas" => [9, 5]
                            ],
                            [
                                "nome_disciplina" => "PI11",
                                "notas" => [6, 7]
                            ],
                            [
                                "nome_disciplina" => "ASW",
                                "notas" => [8, 6]
                            ],
                            [
                                "nome_disciplina" => "PI1",
                                "notas" => [9, 7]
                            ]
                        ]
                    ],
                    [
                        "nome" => "Leite",
                        "disciplinas" => [
                            [
                                "nome_disciplina" => "PSW1",
                                "notas" => [8, 9]
                            ],
                            [
                                "nome_disciplina" => "ASW",
                                "notas" => [7, 5]
                            ],
                            [
                                "nome_disciplina" => "PI1",
                                "notas" => [9, 8]
                            ]
                        ]
                    ]
                ]
            ]
        ]
    ];

    // impressão do array
    echo "<pre>";
    foreach ($Array['cursos'] as $curso) {
        echo "<h2>{$curso['nome_curso']}</h2>";
    
        foreach ($curso['alunos'] as $aluno) {
            echo "<h3>Aluno: {$aluno['nome']}</h3>";
    
            foreach ($aluno['disciplinas'] as $disciplina) {
                echo "<h4>Disciplina: {$disciplina['nome_disciplina']}</h4>";
    
                echo "Notas: ";
                foreach ($disciplina['notas'] as $nota) {
                    echo "$nota ";
                }
                echo "<br>";
            }
        }
    }
    echo "</pre>";
    ?>


</body>

</html>