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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
</head>

<body>
    <?php include_once 'api.php' ?>
    <div class="navbar bg-base-100">
        <div class="navbar-start">
            <div class="dropdown">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </div>
                <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a>Homepage</a></li>
                    <li><a>Portfolio</a></li>
                    <li><a>About</a></li>
                </ul>
            </div>
        </div>
        <div class="navbar-center">
            <a href="#" class="text-xl">Newspaper</a>
        </div>

        <div class="navbar-end">
            <div class="form-control">
                <input type="text" placeholder="Search" class="mr-6  input input-bordered w-24 md:w-auto" />
            </div>

            <div class="dropdown dropdown-end">
                <div tabindex="0" role="button" class="btn btn-ghost btn-circle avatar">
                    <div class="w-10 rounded-full">
                        <img class="w-full h-full object-cover" alt="Tailwind CSS Navbar component" src="../image/icon-home2.jpeg" />
                    </div>
                </div>

                <ul tabindex="0" class="mt-3 z-[1] p-2 shadow menu menu-sm dropdown-content bg-base-100 rounded-box w-52">
                    <li>
                        <a class="justify-between">
                            Profile
                        </a>
                    </li>
                    <li><a>Settings</a></li>
                    <li><a>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="min-h-screen flex items-center justify-center">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 p-4">
            <?php
            $maxNewsToShow = 5; // Defina o número máximo de notícias que você deseja mostrar
            $visibleNews = array_slice($top_headlines['articles'], 0, $maxNewsToShow);
            ?>

            <?php foreach ($visibleNews as $article) : ?>
                <div class="max-w-sm mx-auto bg-white rounded-md overflow-hidden shadow-lg transform hover:scale-105 transition-transform">
                    <img class="w-full h-40 object-cover" src="<?= $article['urlToImage'] ?>" alt="<?= $article['title'] ?>">
                    <div class="p-4">
                        <h2 class="text-xl font-bold mb-2"><?= $article['title'] ?></h2>
                        <p class="text-gray-700 text-sm"><?= $article['description'] ?></p>
                    </div>
                    <div class="p-4 flex justify-end">
                        <a href="<?= $article['url'] ?>" class="btn btn-primary text-sm" target="_blank">Read More</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


</body>

</html>