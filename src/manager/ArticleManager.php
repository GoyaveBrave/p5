<?php
namespace App\manager;

use App\entity\Database;
use App\entity\Article;
use App\entity\Comment;

class ArticleManager
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getPdo();
    }
    


    //FIND ARTICLES

    public function find($id)
    {
        $id = (int) $id;
        $query = $this->pdo->prepare('SELECT * FROM articles WHERE id=:id');
        $query->bindValue(':id', $id, \PDO::PARAM_STR);
        $query->setFetchMode(\PDO::FETCH_CLASS, Article::class);
        $query->execute();
        $article = $query->fetch(\PDO::FETCH_CLASS);
        return $article;
    }


    public function findAll()
    {
        $query = $this->pdo->prepare("SELECT * FROM articles");
        $query->execute();
        $articles = $query->fetchAll(\PDO::FETCH_CLASS, Article::class);

        return $articles;
    }

    public function findFour()
    {
        $query = $this->pdo->query("SELECT * FROM articles ORDER BY id DESC LIMIT 4");
        // On exécute la requête en précisant le paramètre :article_id
        $query->execute();
        // On fouille le résultat pour en extraire les données réelles de l'article
        $articles = $query->fetchAll(\PDO::FETCH_CLASS, Article::class);

        return $articles;
    }
    


    //MANAGE ARTICLES
    

    public function addPost(Article $article)
    {
        $query = $this->pdo->prepare('INSERT INTO articles(img, title, category, text, author) VALUES (:img, :title, :category, :text, :author)');
        $query->bindValue(':img', $article->getImg(), \PDO::PARAM_STR);
        $query->bindValue(':title', $article->getTitle(), \PDO::PARAM_STR);
        $query->bindValue(':category', $article->getCategory(), \PDO::PARAM_STR);
        $query->bindValue(':text', $article->getText(), \PDO::PARAM_STR);
        $query->bindValue(':author', $article->getAuthor(), \PDO::PARAM_STR);
        $query->execute();
    }

    public function editPost(Article $article)
    {
        $query = $this->pdo->prepare('UPDATE articles SET img = :img, title = :title, category = :category, text = :text, author = :author, date = NOW() WHERE id = :id');
        $query->bindValue(':id', $article->getId(), \PDO::PARAM_STR);
        $query->bindValue(':img', $article->getImg(), \PDO::PARAM_STR);
        $query->bindValue(':title', $article->getTitle(), \PDO::PARAM_STR);
        $query->bindValue(':category', $article->getCategory(), \PDO::PARAM_STR);
        $query->bindValue(':text', $article->getText(), \PDO::PARAM_STR);
        $query->bindValue(':author', $article->getAuthor(), \PDO::PARAM_STR);
        $query->execute();
    }

    public function deleteid(Article $article)
    {
        $query = $this->pdo->prepare('DELETE FROM articles WHERE id = :id');
        $query->bindValue(':id', $article->getId());
        $query->execute();
    }
}
