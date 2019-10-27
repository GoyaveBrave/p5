<?php
namespace App\manager;

use App\entity\Database;
use App\entity\Article;
use App\entity\Comment;

class CommentManager
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = Database::getPdo();
    }

    //MANAGE COMMENTS

    public function commentView()
    {
        $query = $this->pdo->prepare("SELECT * FROM comments WHERE verify = 1");
        $query->execute();
        $comments = $query->fetchAll(\PDO::FETCH_CLASS, Comment::class);
        return $comments;
    }
    public function commentVerifyView()
    {
        $query = $this->pdo->prepare("SELECT * FROM comments WHERE verify = 0");
        $query->execute();
        $comments_verify = $query->fetchAll(\PDO::FETCH_CLASS, Comment::class);
        return $comments_verify;
    }
    public function commentVerify(Comment $comment)
    {
        $query = $this->pdo->prepare('UPDATE comments SET verify = 1 WHERE id = :id');
        $query->bindValue(':id', $comment->getId());
        $query->execute();
    }
    public function addComment(Comment $comment)
    {
        $query = $this->pdo->prepare('INSERT INTO comments(username, comments, date, articles_id, verify) VALUES (:username, :comments, NOW(), :articles_id, FALSE)');
        $query->bindValue(':username', $comment->getUsername(), \PDO::PARAM_STR);
        $query->bindValue(':comments', $comment->getComments(), \PDO::PARAM_STR);
        $query->bindValue(':articles_id', $comment->getArticles_Id(), \PDO::PARAM_INT);
        $query->execute();
    }

    public function findCommentsByArticleId($article_id)
    {
        $article_id = (int) $article_id;
        $query = $this->pdo->prepare('SELECT * FROM comments WHERE articles_id = :articles_id');
        $query->bindValue(':articles_id', $article_id, \PDO::PARAM_STR);
        $query->execute();
        $data = $query->fetchAll(\PDO::FETCH_CLASS, Comment::class);
        return $data;
    }

    public function deleteComment(Comment $comment)
    {
        $query = $this->pdo->prepare('DELETE FROM comments WHERE id = :id'); 
        $query->bindValue(':id', $comment->getId());
        $query->execute();
    }
}
