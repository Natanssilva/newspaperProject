<?php
require_once 'bd.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') { //verifica se a solicitação http pra esse script foi realizada via post
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $senha_segura = password_hash($senha,PASSWORD_DEFAULT); //criando hash da senha para manter segurança ao inserir no banco de dados

    $query_ultimo_id = "SELECT MAX(id_user)  as max_id FROM usuarios;";
    $resultado_max_id = $ligacao ->query($query_ultimo_id);
    $proximo_id_user = $resultado_max_id -> fetch();

    $novo_codigo = $proximo_id_user['max_id'] + 1;
    
    $query_cadastrar_usuario = "INSERT INTO usuarios (id_user, nome, sobrenome, email, senha) VALUES 
                            ('$novo_codigo', '$nome', '$sobrenome', '$email', '$senha_segura');";


    $resultado_cadastrar_usuario = $ligacao -> query($query_cadastrar_usuario);

    if ($resultado_cadastrar_usuario) {
        $response = [
            'status' => 'true',
            'message' => 'usuario cadastrado',
            'redirect' => 'home.php'
        ];

    }else{
        $response = [
            'status' => 'false',
            'message' => 'erro ao cadastrar usuário'
        
        ];
    }
   

    echo json_encode($response);

}