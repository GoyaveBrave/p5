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

    public function inputco($username) {
        echo '<input class="form-control" type="text" name="' . $username . '" placeholder="username">';
        }

    public function inputco1($mail) {
        
          echo '<input type="email" id="inputEmail" class="form-control" name="' . $mail . '" placeholder="Email address" required autofocus>';
          }

    public function inputco2($password) {
           echo '<label for="inputPassword" class="sr-only" >Password</label>
           <input type="password" id="inputPassword" class="form-control" name="' . $password . '" placeholder="Password" required>';
           }
    public function inputco22($password2) {
            echo '<input type="password" id="inputPassword" class="form-control" name="' . $password2 . '" placeholder="Repeat Password" required>';
            }
    public function submit1(){
        echo '<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>';
    }
}