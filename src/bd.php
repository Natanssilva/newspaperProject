<?php

require __DIR__ . '/../vendor/autoload.php';
include_once '../biblioteca/funcoes.php';


$host = "localhost";
$db = "newspaperproject";
$usuario = "root";
$senha = "";

try {
    $ligacao = new PDO("mysql:dbname=$db; host=$host", $usuario, $senha);
    $statusDB = $ligacao -> getAttribute(PDO::ATTR_CONNECTION_STATUS);
    showArray($statusDB);
    echo "conexão bem sucedida";
} catch (\Throwable $th) {
    echo "deu ruim";
}