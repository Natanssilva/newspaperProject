<?php

require __DIR__ . '/../vendor/autoload.php';
include_once '../biblioteca/funcoes.php';


$host = "localhost";
$db = "newspaperproject";
$usuario = "root";
$senha = "";

try {

    if (strlen($host) == 0 || strlen($senha) != "") {
        echo "Erro ao conectar com banco de dados";
        die();
    }else{
        $ligacao = new PDO("mysql:dbname=$db; host=$host", $usuario, $senha);
        $statusDB = $ligacao -> getAttribute(PDO::ATTR_CONNECTION_STATUS);
        echo "Conexão efetuada com sucesso";

    }
    
    

} catch (PDOException $statusDB) {
    echo "Erro ao conectar com banco de dados";
    die();
}