<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newspaper</title>
    <link rel="stylesheet" href="../dist/output.css">
    <script src="../js/cadastro.js" defer></script>

    <script src="../js/password.js" defer></script>

</head>

<body class="bg-black-800 min-h-screen flex items-center justify-center">

    <div x-data="{ show: true }" x-show="show" x-transition:enter="animate__animated animate__backInRight" class="bg-white p-8 rounded shadow-md sm:w-96 animate__animated animate__backInRight mx-auto">
        <h2 class="text-2xl font-bold mb-4 text-center">Cadastro</h2>
        <form id="form" action="processar_login.php" method="post">
            <div class="mb-4">
                <label for="nome" class="block text-gray-700 text-sm font-semibold mb-2">Nome</label>

                <input type="text" id="nome" name="nome" class="input w-full bg-white" placeholder="nome">

                <p class="error-message text-red-700"></p>
            </div>
            <div class="mb-4">
                <label for="sobrenome" class="block text-gray-700 text-sm font-semibold mb-2">Sobrenome</label>

                <input type="text" id="sobrenome" name="sobrenome" class="input w-full bg-white" placeholder="sobrenome">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email</label>

                <input type="email" id="email" name="email" class="input w-full bg-white" placeholder="seuemail@exemplo.com">

                <p class="error-message text-red-700"></p>
            </div>
            <div class="mb-6 relative">
                <label for="senha" class="block text-gray-700 text-sm font-semibold mb-2">Senha</label>

                <div class="relative rounded-md shadow-sm">
                    <input type="password" id="senha" name="senha" class="input w-full bg-white" placeholder="********">
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                        <img class="hide-password" src="../image/icons8-hide-password-30.png" alt="hide-password">
                        <img class="show-password hidden" src="../image/icons8-show-password-30.png" alt="show-password">
                    </div>
                    <p class="erro-login text-red-700"></p>
                </div>
            </div>
            <div class="text-center">
                <button id="button-submit" type="submit" class="btn bg-black hover:bg-white text-white hover:text-black font-bold py-1 px-4 border-b-4 border-black  rounded w-full py-1">Cadastre-se</button>
            </div>
        </form>
        <div class="mt-4">
            <p class="text-gray-600 px-2 ">Já possui login? <a href="index.php" class="hover:underline text-black-500">Faça Login agora mesmo</a></p>
        </div>
        <div class=" right-2 top-0 mt-2">
            <p id="error-email" class="error-message text-red-700"></p>
        </div>

</body>

</html>