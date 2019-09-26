<?php 
require 'view/layout.html.php';
require_once 'model/form.html.php';
$form = new Form($_POST);
?>

<body>
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