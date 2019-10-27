<?php
namespace App\entity;

use App\entity\Database;

$pdo = Database::getPdo();
class Comment
{
    private $id;
    
    private $username;
    
    private $comments;
    
    private $date;
    
    private $articles_id;

    public $donnees = [];
    public function __construct($donnees = [])
    {
        if (!empty($donnees)) { // Si on a spécifié des valeurs, alors on hydrate l'objet.
            $this->hydrate($donnees);
        }
    }
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value) {
            $method = 'set'. ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }
    //SETTER
    public function setId($id)
    {
        $this->id = $id;
    }

    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function setComments($comments)
    {
        $this->comments = $comments;
    }
    public function setDate($date)
    {
        $this->date = $date;
    }
    public function setArticles_id($articles_id)
    {
        $this->articles_id = $articles_id;
    }
    //GETTER
    
    public function getId()
    {
        return $this->id;
    }
    public function getComments()
    {
        return $this->comments;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getDate()
    {
        return $this->date;
    }
    public function getArticles_id()
    {
        return $this->articles_id;
    }
}
