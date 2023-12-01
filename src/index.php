<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newspaper</title>
    <link rel="stylesheet" href="../dist/output.css">
    <script src="../js/login.js" defer></script>
</head>

<body class="bg-black-800 min-h-screen flex items-center justify-center">

    <h1 x-data="{ show: true }" x-show="show" x-transition:enter="animate__animated animate__backInRight" class="text-2xl text-white text-center absolute top-10 w-full">Seja Bem vindo ao Newspaper !</h1>

    <div x-data="{ show: true }" x-show="show" x-transition:enter="animate__animated animate__backInRight" class="bg-white p-8 rounded shadow-md sm:w-96 animate__animated animate__backInRight mx-auto">
        <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>
        <form id="form" action="processar_login.php" method="post">
            <div class="relative mb-4">
                <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email</label>

                <input type="email" id="email" name="email" class="input w-full bg-white" placeholder="seuemail@exemplo.com">


            </div>
            <div class="mb-6 relative">
                <label for="senha" class="block text-gray-700 text-sm font-semibold mb-2">Senha</label>

                <div class="relative rounded-md shadow-sm">
                    <div class="flex items-center w-full">
                        <input type="password" id="senha" name="senha" class="input w-full bg-white" placeholder="********">

                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer">
                            <div class="flex items-center h-full"> <!-- Altura fixa para o contêiner -->
                                <img class="hide-password" src="../image/icons8-hide-password-30.png" alt="hide-password">
                                <img class="show-password hidden" src="../image/icons8-hide-password-30.png" alt="show-password">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-center">
                <button id="button-submit" type="submit" class="btn bg-black hover:bg-white text-white hover:text-black font-bold py-1 px-4 border-b-4 border-black  rounded w-full py-1">Entrar</button>
            </div>
            <div class="text-center mt-4">
                <a id="button-google" href="<?= 'api_google.php' ?>" class="btn bg-black hover:bg-white text-white hover:text-black font-bold py-1 px-4 border-b-4 border-black  rounded w-full py-1 flex items-center justify-center">
                    <img src="../image/google-icon-2048x2048-czn3g8x8.png" alt="Google Logo" class="w-6 h-6 mr-2">
                    Entrar com Google
                    
                </a>
            </div>
        </form>
        <div class="container mx-auto px-2 mt-2">
            <a class="hover:underline text-black-500" href="recuperar_senha.php">Esqueceu a senha?</a>
        </div>
        <div class="mt-4">
            <p class="text-gray-600 px-2 ">Novo por aqui? <a href="cadastro.php" class="hover:underline text-black-500">Crie uma conta agora</a></p>
        </div>
        <div class=" right-2 top-0 mt-2">
            <p id="error-email" class="error-message text-red-700"></p>
        </div>

</body>

</html>