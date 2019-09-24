<?php 
require 'view/layout.html.php';
require_once 'model/form.html.php';
$form = new Form($_POST);
//$pageTitle = "Accueil"; ?>

<body>

<!--<form action="index.php?action=addPost" method="POST">
    <p>
        <label>Img</label> <input class="formLoginInput" type="text" name="img"/>
	    </br>
        <label>Titre</label> <input class="formLoginInput" type="text" name="title"/>
        </br>
        <label>category</label> <input class="formLoginInput" type="text" name="category"/>
        </br>
	    <label>text</label> <input class="formLoginInput" type="text" name="text"/>
	    </br>
        <label>author</label> <input class="formLoginInput" type="text" name="author"/>
	    </br>
	    <input type="submit" name="valide">
	</p>
</form> -->

<div class="container-fluid bg-light mx-auto">
  <h1 class="d-flex justify-content-center pb-5 text-dark">Add your Post</h1>
</div>

<form class="col-sm" action="index.php?action=addPost" method="POST"> 

        <?php
        echo $form->input('img');
        echo $form->input1('title');
        echo $form->input2('text');
        echo $form->input3('category');
        echo $form->input4('author');
        echo $form->submit();
        //var_dump($form); die; */
        ?>
</form>
</body>

</html>