<?php

require '../vendor/autoload.php';
require_once '../vendor/jcobhams/newsapi/src/NewsApi.php'; 
require_once '../vendor/jcobhams/newsapi/src/NewsApiAuth.php';  // Adicione esta linha

include_once '../biblioteca/funcoes.php';

use jcobhams\NewsApi\NewsApi;

$key = 'd2fe47092e4344a88acacc97cfb3bf04';

$newsapi = new NewsApi($key);

# /v2/everything
$all_articles = $newsapi->getEverything($q, $sources, $domains, $exclude_domains, $from, $to, $language, $sort_by,  $page_size, $page);

# /v2/top-headlines
$top_headlines = $newsapi->getTopHeadlines($q, $sources, $country, $category, $page_size, $page);

# /v2/top-headlines/sources
$sources = $newsapi->getSources($category, $language, $country);

