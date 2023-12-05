<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newspaper</title>
    <link rel="stylesheet" href="../dist/output.css">
    <script src="../js/recuperar_senha.js" defer></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="bg-black-800 min-h-screen flex items-center justify-center">
    <div x-data="{ show: true }" x-show="show" x-transition:enter="animate__animated animate__backInRight" class="bg-white p-8 rounded shadow-md sm:w-96 animate__animated animate__backInRight mx-auto">
        <h2 class="text-2xl font-bold mb-4 text-center">Recuperar Senha</h2>
        <form id="form" action="processar_login.php" method="post">
            <div class="relative mb-4">
                <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email</label>

                <input type="email" id="email" name="email" class="input w-full bg-white" placeholder="seuemail@exemplo.com">
            </div>
            <div class="text-center">
                <button id="button-submit" type="submit" class="btn bg-black hover:bg-white text-white hover:text-black font-bold py-1 px-4 border-b-4 border-black  rounded w-full py-1">Enviar</button>
            </div>
        </form>
        <div class="container mx-auto px-2 mt-2">
            Já possui login?
            <a class="hover:underline text-black-500" href="index.php">Entre agora</a>
        </div>

        <div class=" right-2 top-0 mt-2">
            <p id="error-email" class="error-message text-red-700"></p>
        </div>
        <div class=" right-2 top-0 mt-2">
            <p id="sucess-div" class="error-message text-red-700"></p>
        </div>

</body>

</html>