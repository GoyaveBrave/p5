<?php

namespace App\entity;
require_once 'DatabaseConnexion.php';
$pdo = getPdo();
class Article 
{
    
    private $id, $img, $title, $category, $text, $author, $date;

    public $donnees = [];
    public function __construct($donnees = [])
    {
        if (!empty($donnees)) // Si on a spécifié des valeurs, alors on hydrate l'objet.
        {
            $this->hydrate($donnees);
        }
    }
    public function hydrate(array $donnees)
    {
        foreach ($donnees as $key => $value)
        {
            $method = 'set'. ucfirst($key);
            if(method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }
    //Setter /
    
    public function setId($id){
        $this->id = $id; 
    } 
    public function setImg($img){
        $this->img = $img; 
    }

    public function setTitle($title){
        $this->title = $title; 
    }

    public function setCategory($category){
        $this->category = $category; 
    }

    public function setText($text){
        $this->text = $text; 
    }

    public function setAuthor($author){
        $this->author = $author; 
    }
    public function setDate($date){
        $this->time = $date; 
    }
    

    //Getter/
    public function getId(){
        return $this->id;
    } 
    public function getImg(){
        return $this->img;
    }
    
    public function getTitle(){
        return $this->title;
    }

    public function getCategory(){
        return $this->category;
    }

    public function getText(){
        return $this->text;
    }

    public function getAuthor(){
        return $this->author;
    }
    public function getDate(){
        return $this->date;
    }
}
