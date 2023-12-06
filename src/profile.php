<?php session_start();?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center">

    <div class="bg-white p-8 rounded shadow-md sm:w-96 mx-auto">
        <h2 class="text-2xl font-bold mb-4 text-center">Seu Perfil</h2>

        <div class="mb-4">
            <label for="nome" class="block text-gray-700 text-sm font-semibold mb-2">ID:</label>
            <p id="nome" class="text-gray-800 font-medium"><?= $_SESSION['id_user'] ?></p>
        </div>

     
        <div class="mb-4">
            <label for="nome" class="block text-gray-700 text-sm font-semibold mb-2">Nome:</label>
            <p id="nome" class="text-gray-800 font-medium"><?= $_SESSION['nome'] ?></p>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Sobrenome</label>
            <p id="email" class="text-gray-800 font-medium"><?= $_SESSION['sobrenome'] ?></p>
        </div>

        <div class="mb-6">
            <label for="telefone" class="block text-gray-700 text-sm font-semibold mb-2">Email:</label>
            <p id="telefone" class="text-gray-800 font-medium"><?= $_SESSION['email'] ?></p>
        </div>

       
        <div class="text-center">
            <button id="button-logout" class="btn bg-black hover:bg-white text-white hover:text-black font-bold py-1 px-4 border-b-4 border-black rounded w-full">Sair</button>
        </div>
    </div>

</body>

</html>
