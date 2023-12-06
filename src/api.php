<?php

require '../vendor/autoload.php'; //é gerado automaticamente pelo Composer e contém as informações de carregamento automático das classes necessárias para o projeto. 

//Essas linhas estão incluindo os arquivos NewsApi.php e NewsApiAuth.php da biblioteca jcobhams/newsapi. 
// Esses arquivos contêm as definições de classes e funcionalidades necessárias para interagir com a API de notícias.
require_once '../vendor/jcobhams/newsapi/src/NewsApi.php';
require_once '../vendor/jcobhams/newsapi/src/NewsApiAuth.php';

include_once '../biblioteca/funcoes.php';

use jcobhams\NewsApi\NewsApi;
use GuzzleHttp\Client;

$key = 'd2fe47092e4344a88acacc97cfb3bf04';

$newsapi = new NewsApi($key); //Essa linha cria uma instância da classe NewsApi, passando a chave de API como argumento. 
// A instância criada ($newsapi) será usada para fazer chamadas à API de notícias.



$page = isset($_GET['page']) ? $_GET['page'] : 1;
$apiUrl = "https://newsapi.org/v2/everything?q=apple&from=2023-12-05&to=2023-12-05&sortBy=popularity&page={$page}&apiKey=d2fe47092e4344a88acacc97cfb3bf04";


// Configurar o cliente Guzzle
$client = new Client();  

// Cria uma instância do cliente Guzzle. O Guzzle é uma biblioteca para fazer requisições HTTP de maneira eficiente em PHP.

// Fazer a requisição HTTP
$response = $client->get($apiUrl);
// arequisição HTTP GET à API usando o cliente Guzzle. A resposta da API é armazenada na variável $response.

// Obter o conteúdo da resposta
$body = $response->getBody()->getContents();
// pega o conteúdo da resposta (o corpo da resposta HTTP) como uma string. O corpo geralmente contém dados no formato JSON.

// Converter o JSON para um array associativo
$top_headlines = json_decode($body, true);

