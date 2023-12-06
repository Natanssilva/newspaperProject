<?php

require_once 'bd.php';
include_once '../biblioteca/funcoes.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $dadosAtualizarSenha = filter_input_array(INPUT_POST, FILTER_DEFAULT); //recebendo os dados de envio do formulario via post
    $senhaAtualizada = $dadosAtualizarSenha['senha'];



    //receber a chave de recuperação via post pelo AJAX
    if (isset($dadosAtualizarSenha['chave'])) {
        $chave_recuperacao = $dadosAtualizarSenha['chave'];


        if (!empty($chave_recuperacao)) {
            $query_verificar_chave_recuperacao = "SELECT id_user FROM usuarios 
            WHERE chave_recuperar_senha = :chave LIMIT 1";


            $stmt = $ligacao->prepare($query_verificar_chave_recuperacao);
            $stmt->bindParam(':chave', $chave_recuperacao);
            $stmt->execute();

            $resultado_verificar_chave = $stmt->fetch();

            if ($dadosAtualizarSenha) {
                $senhaAtualizada = password_hash($dadosAtualizarSenha['senha'], PASSWORD_DEFAULT);
                $id_usuario = $resultado_verificar_chave['id_user'];
                $chave_recuperar_senha = 'NULL'; //para que nao fique a chave passada e nao possa recuperar

                $query_update_senha = "UPDATE usuarios 
                                        SET senha = :senha_usuario, 
                                            chave_recuperar_senha = :chave_recuperar_senha
                                        WHERE id_user = :id_user; LIMIT 1";

                $preparedStmt = $ligacao->prepare($query_update_senha);
                $preparedStmt->bindParam(':senha_usuario', $senhaAtualizada);
                $preparedStmt->bindParam(':chave_recuperar_senha', $chave_recuperar_senha);
                $preparedStmt->bindParam(':id_user', $id_usuario);

                if ($preparedStmt->execute()) {
                    //response pra retornar pro ajax q a senha foi alterada
                    $response = [
                        'status' => 'true',
                        'message' => 'senha alterada com sucesso',
                        'redirect' => 'index.php'
                    ];
                } else {
                    $response = [
                        'status' => 'erro',
                        'message' => 'Erro ao alterar a senha'

                    ];
                }
            }
        }
    }
    echo json_encode($response);
}
