<?php
require_once 'DatabaseConnexion.php';
require_once 'Article.php';

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
    /*$article = new Article;
    //hydratation de $article
    $article->setTitle ($result['title']);
    $article->setCategory ($result['category']);
    $article->setAuthor ($result['text']);
    return $article; */

    }
    public function findAll()
    {
    $query = $this->pdo->prepare("SELECT * FROM articles" );
    // On exécute la requête en précisant le paramètre :article_id 
    $query->execute();
    // On fouille le résultat pour en extraire les données réelles de l'article
    $articles = $query->fetchAll();
    return $articles;
    }

    public function findFour()
    {
    $query = $this->pdo->prepare("SELECT * FROM articles ORDER BY id DESC LIMIT 4");
    // On exécute la requête en précisant le paramètre :article_id 
    $query->execute();
    // On fouille le résultat pour en extraire les données réelles de l'article
    $articles = $query->fetchAll();
    return $articles;
    }

    public function addPost(Article $article)
    {
        $query = $this->pdo->prepare('INSERT INTO articles(img, title, category, text, author) VALUES(:img, :title, :category, :text, :author)');
        $query->bindValue(':img', $article->getImg(), PDO::PARAM_STR);
        $query->bindValue(':title', $article->getTitle(), PDO::PARAM_STR);
		$query->bindValue(':category', $article->getCategory(), PDO::PARAM_STR);
        $query->bindValue(':text', $article->getText(), PDO::PARAM_STR);
        $query->bindValue(':author', $article->getAuthor(), PDO::PARAM_STR);
        $query->execute();
        
        //$req->execute(array($_POST['title'], $_POST['category'],  $_POST['author'],  $_POST['text']));
    }
}
//var_dump($_POST); die;
