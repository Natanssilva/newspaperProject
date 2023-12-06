<?php

require_once 'bd.php';
include_once '../biblioteca/funcoes.php';

$link_url = filter_input(INPUT_GET, 'chave', FILTER_DEFAULT);  //armazenando valor da url no indice chave

if (empty($link_url)) {
    echo "<h1>ERRO: Chave não foi fornecida na URL.";
    die();
}
$query_verificar_chave_recuperacao = "SELECT id_user FROM usuarios 
                                                    WHERE chave_recuperar_senha = :chave LIMIT 1;";

$stmt = $ligacao->prepare($query_verificar_chave_recuperacao);
$stmt->bindParam(':chave', $link_url);
$stmt->execute();

if ($stmt->rowCount() === 0) { //validando caso usuario digite algo no link, terá um erro
    echo "<h1>ERRO! LINK ALTERADO";
    header('refresh:3;url=index.php'); //atrasa o redirecionamento para que o erro seja lido
    // die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newspaper</title>
    <link rel="stylesheet" href="../dist/output.css">
    <script src="../js/password.js" defer></script>

    <script src="../js/atualizar_senha.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="bg-black-800 min-h-screen flex items-center justify-center">
    <div x-data="{ show: true }" x-show="show" x-transition:enter="animate__animated animate__backInRight" class="bg-white p-8 rounded shadow-md sm:w-96 animate__animated animate__backInRight mx-auto">
        <h2 class="text-2xl font-bold mb-4 text-center">Atualizar Senha</h2>
        <form id="formAtualizar" action="processar_login.php" method="post">
            <div class="mb-6 relative">
                <label for="senha" class="block text-gray-700 text-sm font-semibold mb-2">Senha</label>

                <div class="relative rounded-md shadow-sm">
                    <div class="flex items-center w-full">
                        <input type="password" id="senha" name="senha" class="input w-full bg-white" placeholder="********">

                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                            <div class="flex items-center h-full">
                                <img class="hide-password" src="../image/icons8-hide-password-30.png" alt="hide-password">
                                <img class="show-password hidden" src="../image/icons8-show-password-30.png" alt="show-password">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <button id="buttonAtualizaSenha" type="submit" class="btn bg-black hover:bg-white text-white hover:text-black font-bold py-1 px-4 border-b-4 border-black  rounded w-full py-1">Atualizar</button>
            </div>
            <div class="mt-4">
                <p class="text-gray-600 px-2 ">Lembrou a senha? <a href="index.php" class="hover:underline text-black-500">Faça Login</a></p>
            </div>
        </form>
        <div class=" right-2 top-0 mt-2">
            <p id="error-div"></p>
        </div>

</body>

</html>