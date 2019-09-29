<?php
require_once 'DatabaseConnexion.php';
require_once 'Article.php';
require_once 'Admin.php';

class ArticleManager {
    private $pdo;

    public function __construct()
    {
        $this->pdo = getPdo();
    }

    public function deleteid($id)
    {
        $this->pdo->exec('DELETE FROM articles WHERE id = '.$id);
    }

    public function find($id)
    {
    $id = (int) $id;
    $query = $this->pdo->query('SELECT * FROM articles WHERE id='.$id);
    // On exécute la requête en précisant le paramètre :article_id 
    $query->execute();
    $data = $query->fetch(PDO::FETCH_ASSOC);
    /* On fouille le résultat pour en extraire les données réelles de l'article, qu'on stock ds variable
    $result et qu'on retourne (impératif) */
    return $data;

    }
    public function findAll()
    {
    $query = $this->pdo->prepare("SELECT * FROM articles" );
    // On exécute la requête en précisant le paramètre :article_id 
    $query->execute();
    // On fouille le résultat pour en extraire les données réelles de l'article
    $articles = $query->fetchAll(PDO::FETCH_CLASS, Article::class);
    return $articles;
    }

    public function findFour()
    {
    $query = $this->pdo->prepare("SELECT * FROM articles ORDER BY id DESC LIMIT 4");
    // On exécute la requête en précisant le paramètre :article_id 
    $query->execute();
    // On fouille le résultat pour en extraire les données réelles de l'article
    $articles = $query->fetchAll(PDO::FETCH_CLASS, Article::class);
    return $articles;
    }

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

    public function signUp(Admin $admin)
    {
        $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $query = $this->pdo->prepare('INSERT INTO admin(username, mail, password) VALUES(:username, :mail, :password)');
        $query->bindValue(':username', $admin->getUsername(), PDO::PARAM_STR);
        $query->bindValue(':mail', $admin->getMail(), PDO::PARAM_STR);
		$query->bindValue(':password', $pass_hache, PDO::PARAM_STR);
        $query->execute();
    }

    public function signIn()
    {
        $query = $this->pdo->prepare('SELECT mail, password FROM admin WHERE mail = :mail');
		$query->execute(array('mail' => $_POST['mail']));
		$result = $query->fetch();
		return;
    }

}
//var_dump($_POST); die;
