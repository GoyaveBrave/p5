<?php
require_once 'DatabaseConnexion.php';
$pdo = getPdo();
class Article 
{
    public function __construct(array $data)
	{
		$this->hydrate($data);
	}
	public function hydrate(array $data)
	{
		foreach ($data as $key => $value) 
		{
			$method = 'set' . ucfirst($key);
			if (method_exists($this, $method)) 
			{
				$this->$method($value);
			}
		}
    }
    
    private $img, $title, $category, $text, $author;

    //Setter /
    
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

    //Getter/

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
}
