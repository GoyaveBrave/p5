<?php 


class Form{

    private $data;
    public function __construct($data) {
       $this->data = $data;
    }
    public function input($img) {
        echo '<input class="form-control" type="text" name="' . $img . '" placeholder="Img">';
        }

    public function input1($title) {
          echo '<input class="form-control" type="text" name="' . $title . '" placeholder="Title">';
          }

    public function input2($text) {
           echo '<textarea class="form-control" name="' . $text . '">Text</textarea>';
           }

    public function input3($category) {
            echo '<input class="form-control" type="text" name="' . $category . '" placeholder="category">';
            }
    public function input4($author) {
            echo '<input class="form-control" type="text" name="' . $author . '" placeholder="author">';
            }
    public function submit(){
        echo '<button type="submit" class="btn btn-success mb-2">Submit</button>';
    }
}