<?php
require_once 'DatabaseConnexion.php';
require_once 'Article.php';
require_once 'Admin.php';
require_once 'Comments.php';

class ArticleManager {
    private $pdo;

    public function __construct()
    {
        $this->pdo = getPdo();
    }
    


    //FIND ARTICLES

    public function find($id)
    {
    $id = (int) $id;
    $query = $this->pdo->prepare('SELECT * FROM articles WHERE id=:id');
    $query->bindValue(':id', $id, PDO::PARAM_STR);
    $query->setFetchMode(PDO::FETCH_CLASS, 'Article');
    $query->execute();
    $article = $query->fetch(PDO::FETCH_CLASS);

    return $article;
    }


    public function findAll()
    {
    $query = $this->pdo->prepare("SELECT * FROM articles");
    $query->execute();
    $articles = $query->fetchAll(PDO::FETCH_CLASS, Article::class);

    return $articles;
    }

    public function findFour()
    {
    $query = $this->pdo->query("SELECT * FROM articles ORDER BY id DESC LIMIT 4");
    // On exécute la requête en précisant le paramètre :article_id 
    $query->execute();
    // On fouille le résultat pour en extraire les données réelles de l'article
    $articles = $query->fetchAll(PDO::FETCH_CLASS, Article::class);

    return $articles;
    }
    


    //MANAGE ARTICLES
    

    public function addPost(Article $article)
    {
        $query = $this->pdo->prepare('INSERT INTO articles(img, title, category, text, author) VALUES (:img, :title, :category, :text, :author)');
        $query->bindValue(':img', $article->getImg(), PDO::PARAM_STR);
        $query->bindValue(':title', $article->getTitle(), PDO::PARAM_STR);
		$query->bindValue(':category', $article->getCategory(), PDO::PARAM_STR);
        $query->bindValue(':text', $article->getText(), PDO::PARAM_STR);
        $query->bindValue(':author', $article->getAuthor(), PDO::PARAM_STR);
        $query->execute();
    }

    public function editPost(Article $article)
    {
        $query = $this->pdo->prepare('UPDATE articles SET img = :img, title = :title, category = :category, text = :text, author = :author, date = NOW() WHERE id = :id');
        $query->bindValue(':id', $article->getId(), PDO::PARAM_STR);
        $query->bindValue(':img', $article->getImg(), PDO::PARAM_STR);
        $query->bindValue(':title', $article->getTitle(), PDO::PARAM_STR);
		$query->bindValue(':category', $article->getCategory(), PDO::PARAM_STR);
        $query->bindValue(':text', $article->getText(), PDO::PARAM_STR);
        $query->bindValue(':author', $article->getAuthor(), PDO::PARAM_STR);
        $query->execute();
    }

    public function deleteid(Article $article)
    {
        $this->pdo->exec('DELETE FROM articles WHERE id = '.$article->getId());
    }
    






    //MANAGE COMMENTS
    
    public function commentView()
    {
    $query = $this->pdo->prepare("SELECT * FROM comments WHERE verify = 1" );
    $query->execute();
    $comments = $query->fetchAll(PDO::FETCH_CLASS, Comment::class);
    return $comments;
    }
    public function commentVerifyView()
    {
    $query = $this->pdo->prepare("SELECT * FROM comments WHERE verify = 0");
    $query->execute();
    $comments_verify = $query->fetchAll(PDO::FETCH_CLASS, Comment::class);
    return $comments_verify;
    }
    public function commentVerify(Comment $comment)
    {
        $this->pdo->exec('UPDATE comments SET verify = 1 WHERE id = '.$comment->getId());
    }
    public function addComment(Comment $comment, $article_id)
    {
        $article_id = (int) $article_id;
        $query = $this->pdo->prepare('INSERT INTO comments(username, comments, date, articles_id, verify) VALUES (:username, :comments, NOW(), :$article_id, FALSE)');
        $query->bindValue(':username', $comment->getUsername(), PDO::PARAM_STR);
        $query->bindValue(':comments', $comment->getComments(), PDO::PARAM_STR);
        $query->bindValue(':article_id', $article_id, PDO::PARAM_INT);
        $query->execute();
    }

    public function findCommentsByArticleId($article_id)
    {
    $article_id = (int) $article_id;
    $query = $this->pdo->prepare('SELECT * FROM comments WHERE articles_id='.$article_id);
    $query->bindValue(':id', $article_id, PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetchAll(PDO::FETCH_CLASS , Comment::class);
    return $data;
    }
}
