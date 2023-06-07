<?php

$username = 'root';
$password = '';

try {
    $conx = new PDO('mysql:host=localhost;dbname=teste_da_aula_30052023', $username, $password);
    $conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

?>
