<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laços(2)_SávioPessôaAfonso</title>
</head>
<style>
    body{
        background-color: rgb(240, 240, 240);
        font-family: 'Courier New', Courier, monospace;
    }
    .red {
        color: red;
    }

    .green {
        color: green;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th:first-child,
    td:first-child {
        border-left: none;
    }

    th:last-child,
    td:last-child {
        border-right: none;
    }

    th {
        background-color: #f2f2f2;
        font-weight: bold;
    }

    h2 {
        margin-top: 30px;
    }

    .chart-container {
        width: 50%;
        height: 20vh;
    }
</style>

<body>
    <?php
    $array = [
        'Curso_Informática' => [
            'Jasinto' => [
                'PSW' => [
                    'Teste' => 4.7,
                    'Prova' => 5.0
                ],
                'ASW' => [
                    'Teste' => 2.0,
                    'Prova' => 9.5
                ],
                'BD' => [
                    'Teste' => 0.0,
                    'Prova' => 8.0
                ]
            ],
            'Leite' => [
                'PSW' => [
                    'Teste' => 3.0,
                    'Prova' => 0.0
                ],
                'ASW' => [
                    'Teste' => 8.0,
                    'Prova' => 9.0
                ],
                'BD' => [
                    'Teste' => 7.0,
                    'Prova' => 4.0
                ]
            ],
            'Quente' => [
                'PSW' => [
                    'Teste' => 7.5,
                    'Prova' => 9.0
                ],
                'ASW' => [
                    'Teste' => 9.0,
                    'Prova' => 9.0
                ],
                'BD' => [
                    'Teste' => 9.0,
                    'Prova' => 4.5
                ]
            ],
            'Sávio' => [
                'PSW' => [
                    'Teste' => 10.0,
                    'Prova' => 10.0
                ],
                'ASW' => [
                    'Teste' => 9.0,
                    'Prova' => 10.0
                ],
                'BD' => [
                    'Teste' => 1.5,
                    'Prova' => 10.0
                ]
            ]
        ],
        'Ciencia_da_computação' => [
            'Cimas' => [
                'PSW' => [
                    'Teste' => 1.0,
                    'Prova' => 2.0
                ],
                'ASW' => [
                    'Teste' => 0.0,
                    'Prova' => 3.0
                ],
                'BD' => [
                    'Teste' => 5.3,
                    'Prova' => 7.0
                ]
            ],
            'Turbo' => [
                'PSW' => [
                    'Teste' => 7.0,
                    'Prova' => 6.0
                ],
                'ASW' => [
                    'Teste' => 7.0,
                    'Prova' => 7.3
                ],
                'BD' => [
                    'Teste' => 0.0,
                    'Prova' => 8.3
                ]
            ],
            'Tomas' => [
                'PSW' => [
                    'Teste' => 3.2,
                    'Prova' => 8.5
                ],
                'ASW' => [
                    'Avaliação 1' => 1.5,
                    'Prova' => 7.0
                ],
                'BD' => [
                    'Avaliação 1' => 8.0,
                    'Prova' => 7.0
                ]
            ],
            'Turbando' => [
                'PSW' => [
                    'Avaliação 1' => 6.0,
                    'Prova' => 1.0
                ],
                'ASW' => [
                    'Avaliação 1' => 2.0,
                    'Prova' => 2.0
                ],
                'BD' => [
                    'Avaliação 1' => 3.5,
                    'Prova' => 4.0
                ]
            ]
        ]
    ];
    ?>

    <h2>Impressão Cursos</h2>
    <table>
        <tr>
            <th>Cursos</th>
        </tr>
        <?php foreach ($array as $curso => $alunos) { ?>
            <tr>
                <td><?php echo $curso; ?></td>
            </tr>
        <?php } ?>
    </table>

    <h2>Impressão Alunos</h2>
    <table>
        <tr>
            <th>Alunos</th>
        </tr>
        <?php foreach ($array as $curso => $alunos) {
            foreach ($alunos as $aluno => $disciplinas) { ?>
                <tr>
                    <td><?php echo $aluno; ?></td>
                </tr>
        <?php }
        } ?>
    </table>

    <h2>Impressão Notas</h2>
    <?php foreach ($array as $curso => $alunos) {
        foreach ($alunos as $aluno => $disciplinas) { ?>
            <br>
            <h3>Aluno(a) = <?php echo $aluno; ?></h3>
            <table>
                <tr>
                    <th>Disciplinas</th>
                    <th>Notas</th>
                </tr>
                <?php foreach ($disciplinas as $disciplina => $avaliacao) { ?>
                    <tr>
                        <td><?php echo $disciplina; ?></td>
                        <td>
                            <?php
                            $notas = array_values($avaliacao);
                            $media = array_sum($notas) / count($notas);
                            if ($media < 5) {
                                echo '<span class="red">' . $media . '</span>';
                            } else {
                                echo '<span class="green">' . $media . '</span>';
                            }
                            ?>
                        </td>
                    </tr>
                <?php } ?>
            </table>
            <div class="chart-container">
                <canvas id="<?php echo $aluno; ?>"></canvas>
            </div>


            <!-- Taquei a biblioteca chart.JS para imprimir a media dos alunos em um grafico -->

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                
                var ctx = document.getElementById("<?php echo $aluno; ?>").getContext('2d');
                var chart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Média'],
                        datasets: [{
                            label: 'Média das Notas',
                            data: [<?php echo $media; ?>],
                            backgroundColor: [<?php echo ($media < 5) ? "'rgba(255, 0, 0, 0.5)'" : "'rgba(0, 255, 0, 0.5)'"; ?>],
                            borderColor: [<?php echo ($media < 5) ? "'rgba(255, 0, 0, 1)'" : "'rgba(0, 255, 0, 1)'"; ?>],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
            
    <?php }
    } ?>
</body>

</html>