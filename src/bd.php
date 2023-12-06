<?php

require __DIR__ . '/../vendor/autoload.php';

include_once '../biblioteca/funcoes.php';


$host = "localhost";
$db = "newspaperproject";
$usuario = "root";
$senha = "";

 try {

    if (strlen($host) == 0) {
        die();
    }else{
        $ligacao = new PDO("mysql:dbname=$db; host=$host", $usuario, $senha);
        $statusDB = $ligacao -> getAttribute(PDO::ATTR_CONNECTION_STATUS);

    }
    
    

} catch (PDOException $statusDB) {
    die();
}