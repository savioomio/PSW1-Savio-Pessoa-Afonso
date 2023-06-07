<?php

require_once 'conx.php';

$nome = $_POST['nome'];
$turma = $_POST['turma'];
$numero_matricula = $_POST['numero_matricula'];
$materia_preferida = $_POST['materia_preferida'];
$cpf = $_POST['cpf'];
$email = $_POST['email'];
$senha = $_POST['senha'];

//salva em variaveis super globais;
$_SESSION['nome'] = $nome;
$_SESSION['turma'] = $turma;
$_SESSION['numero_matricula'] = $numero_matricula;
$_SESSION['materia_preferida'] = $materia_preferida;
$_SESSION['cpf'] = $cpf;
$_SESSION['email'] = $email;
$_SESSION['senha'] = $senha;

$cadrastro = $conx->prepare("INSERT INTO atividade (nome, turma, numero_matricula, materia_preferida, cpf, email, senha) VALUES ('$nome', '$turma', '$numero_matricula', '$materia_preferida', '$cpf', '$email', '$senha')");

$cadrastro->execute();

