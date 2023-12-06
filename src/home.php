<?php
    include_once '../biblioteca/funcoes.php';
    
    session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newspaper</title>
    <link rel="stylesheet" href="../dist/output.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.4.19/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="../js/loadAPI.js" defer></script>

</head>

<body>
    <?php include_once 'api.php' ?>
    <div class="navbar bg-base-100">
        <div class="navbar-start">
        </div>
        <div class="navbar-center">
            <a href="#" class="text-xl">Newspaper</a>
        </div>

        <div class="navbar-end">
            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img class="w-full h-full object-cover" alt="Tailwind CSS Navbar component" src="../image/icon-home2.jpeg" />
                    </div>
                </div>

                <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                    <li>
                        <a href="profile.php" target="_blank" class="justify-between">
                            Profile
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="min-h-screen flex items-center justify-center">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
            <?php
            $maxNewsToShow = 5; //número máximo de notícias 
            $visibleNews = array_slice($top_headlines['articles'], 0, $maxNewsToShow); 
            //array_ slice pega uma parte do array : 1 parametro é o array que quer ser dividido
            //  o parametro do meio é o indice q inicia a extração
            // terceiro parametro é o numero de elementos que deve ser retirado

            ?>

            <?php foreach ($visibleNews as $article) : ?>
                <div class="max-w-sm mx-auto bg-white rounded-md overflow-hidden shadow-lg transform hover:scale-105 transition-transform">
                    <img class="w-full h-32 object-cover" src="<?= $article['urlToImage'] ?>" alt="<?= $article['title'] ?>">
                    <div class="p-4">
                        <h2 class="text-md font-bold mb-2"><?= $article['title'] ?></h2>
                        <p class="text-gray-700 text-sm"><?= $article['description'] ?></p>
                    </div>
                    <div class="p-4 flex justify-end">
                        <a href="<?= $article['url'] ?>" class="btn btn-primary text-sm" target="_blank">Ler sobre</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div class=" flex items-center justify-center mb-4">
        <button id="load-more" class="btn btn-primary">Ver Mais</button>
    </div>

</body>

</html>