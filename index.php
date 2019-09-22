<?php

require 'model/Article.php';
require_once 'model/DatabaseConnexion.php';
require_once 'model/utils.php';
require_once 'model/ArticleManager.php';

$pdo = getPdo();
$articleManager = new ArticleManager;
if (isset($_GET['article'])) {
    $article = $articleManager->find($_GET['article']);
    include 'view/postpage.html.php';
} else  {
    $query = $pdo->prepare("SELECT * FROM articles");
    // On exécute la requête 
    $query->execute();
    // On fouille le résultat pour tout extraire 
    $articles = $query->fetchAll();
    //var_dump($articles);
    //var_dump($articles[1]); die;
    /*foreach ($articles as $article){
        echo $article['id'];
        echo "\n";

    } die; */
    include 'view/allPostspage.html.php';
}

/**
 * 5. On affiche 
 */
// render('view/postpage', ['article' => $article, 'article_id' => $article_id]);