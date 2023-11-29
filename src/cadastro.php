<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newspaper</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
    <script src="../js/validarCadastro.js" defer></script>
    <script src="../js/main.js" defer></script>
</head>

<body class="bg-gray-800 min-h-screen flex items-center justify-center">
    <div class="bg-white p-8 rounded shadow-md sm:w-96 animate__animated animate__backInRight ">
        <h2 class="text-2xl font-bold mb-4 text-center">Cadastre-se</h2>
        <form id="formCadastro" action="processar_cadastro.php">
            <div class="mb-2">
                <label for="nome" class="block text-gray-700 text-sm font-semibold mb-2">Nome</label>
                <input type="text" id="nome" name="nomeCadastro" class="border rounded w-full py-2 px-3" placeholder="Digite seu nome">
                <p class="error-message text-red-700"></p>
            </div>
            <div class="mb-2">
                <label for="sobrenome" class="block text-gray-700 text-sm font-semibold mb-2">Sobrenome</label>
                <input type="text" id="sobrenome" name="sobrenomeCadastro" class="border rounded w-full py-2 px-3" placeholder="Digite seu sobrenome">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-semibold mb-2">Email</label>
                <input type="email" id="emailCadastro" name="emailCadastro" class="border rounded w-full py-2 px-3" placeholder="seuemail@exemplo.com">
                <p class="error-message text-red-700"></p>
            </div>
            <div class="relative rounded-md shadow-sm mb-6">
                <label for="senha" class="block text-gray-700 text-sm font-semibold mb-2">Senha</label>
                <input type="password" id="senhaCadastro" name="senhaCadastro" class="senha border rounded w-full py-2 px-3" placeholder="********">
                <div class="absolute inset-y-0 right-0 pr-3 flex items-center cursor-pointer mt-6">
                    <img class="hide-password" src="../images/icons8-hide-password-30.png" alt="hide-password">
                    <img class="show-password hidden" src="../images/icons8-show-password-30.png" alt="show-password">
                </div>
                <p class="error-message text-red-700"></p>

            </div>
            <button id="buttonCadastro" type="submit" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded w-full py-2">Cadastrar</button>
            <p class="cadastro-error text-red-700"></p>
        </form>
        <div class="mt-4">
            <p class="text-gray-600">Já possui uma conta? <a href="index.php" class="hover:underline text-blue-500">Fazer login</a></p>

        </div>
    </div>

    <h1 class="text-2xl text-white text-center absolute top-10 w-full animate__animated animate__backInRight ">Crie uma conta e comece agora mesmo a gerenciar suas finanças !</h1>
    <div id="alert"></div>
</body>

</html>
