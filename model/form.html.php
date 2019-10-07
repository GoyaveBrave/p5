<?php 


class Form{

    private $data;
    public function __construct($data) {
       $this->data = $data;
    }

    //ARTICLES AJOUT
    public function input($img) {
        echo '<input class="form-control" type="file" name="' . $img . '" placeholder="Img">';
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
   
    //ADMIN
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
    public function inputco3($comments) {
        echo '<textarea class="form-control" rows="5" name="' . $comments . '"></textarea>';
    }
    public function submit1(){
        echo '<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>';
    }

    //CONTACT FORM

    public function inputfo($name) {
        echo '<input type="text"  name="' . $name . '" >';
        }
    public function inputfo1($email) {
        echo '<input type="email" name="' . $email . '">';
    }
    public function inputfo2($subject) {
        echo '<span>Subject</span>
        <select name="' . $subject . '" class="custom-select">
            <option value="" disabled>Choose option</option>
            <option value="FEEDBACK" selected>Feedback</option>
            <option value="PRO CONTACT">Professional contact</option>
            <option value="OTHER">Other</option>
        </select>';
    }
    public function inputfo3($message) {
        echo '<textarea name="' . $message . '" id="materialContactFormMessage" class="form-control md-textarea" rows="3"></textarea>
             ';
    }
    public function submit2(){
        echo '<button class="btn btn-outline-success btn-rounded btn-block z-depth-0 my-4 waves-effect" type="submit">Send</button>';
    }

}