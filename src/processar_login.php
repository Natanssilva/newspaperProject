<?php
session_start(); // Inicia a sessão
require_once 'bd.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    
  
    $query_usuarios = "SELECT * FROM usuarios";
    $resultado_query = $ligacao ->query($query_usuarios);

    $tabela_usuarios = $resultado_query ->fetchAll(); 

  

    $loginEfetuado = false; //inicializa a variavel fora do foreach pq se não causa erro
    //caso no looping nao encontro o login digitado, vai constar que a variavel nao foi declarada


    foreach ($tabela_usuarios as $info_usuario) {  //aqui vai mostrar tudo que tiver no db 
        // showArray($info_usuario);
        if ($info_usuario['email'] == $email && password_verify($senha,$info_usuario['senha'])) {

            $loginEfetuado = true;
            break;  //login efetuado, nao precisa continuar verificando
        }
    }

    if ($loginEfetuado) {

        $_SESSION['id_user'] = $info_usuario['id_user'];
        $_SESSION['nome'] = $info_usuario['nome'];
        $_SESSION['sobrenome'] = $info_usuario['sobrenome'];
        $_SESSION['email'] = $info_usuario['email'];




        $response = [
            'status' => 'true',
            'message' => 'login efetuado com sucesso',
            'redirect' => 'home.php'
        ];

        

    }else{
        $response = [
            'status' => 'false',
            'message' => 'login incorreto'
        ];
    }

    // showArray($senha);

    echo json_encode($response);

  
}