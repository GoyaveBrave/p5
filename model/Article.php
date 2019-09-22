<?php
require_once 'DatabaseConnexion.php';
$pdo = getPdo();
class Article 
{
    private $img, $titre, $category, $text, $author;

    //Setter /
    
    public function setTitle($titre){
        $this->titre = $titre; 
    }

    public function setImg($img){
        $this->img = $img; 
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

    //Getter/

    public function getTitle(){
        return $this->titre;
    }

    public function getImg(){
        return $this->img;
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
}
