<?php
require_once 'DatabaseConnexion.php';

class ArticleManager {
    private $pdo;

    public function __construct()
    {
        $this->pdo = getPdo();
    }
    public function find($id)
    {
    $query = $this->pdo->prepare("SELECT * FROM articles WHERE id = :article_id");
    // On exécute la requête en précisant le paramètre :article_id 
    $query->execute(['article_id' => $id]);
    /* On fouille le résultat pour en extraire les données réelles de l'article, qu'on stock ds variable
    $result et qu'on retourne (impératif) */
    $result = $query->fetch();
    return $result;
    //Création de l'instance Article
    $article = new Article;
    //hydratation de $article
    $article->setTitle ($result['title']);
    $article->setCategory ($result['category']);
    $article->setAuthor ($result['text']);
    return $article;

    }
    public function findAll()
    {
        $query = $pdo->prepare("SELECT * FROM articles" );
    // On exécute la requête en précisant le paramètre :article_id 
    $query->execute();
    // On fouille le résultat pour en extraire les données réelles de l'article
    $articles = $query->fetchAll();
    return $articles;
    }
}