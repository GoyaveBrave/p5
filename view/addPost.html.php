<?php ob_start(); ?>
<div class="container-fluid bg-light mx-auto">
  <h1 class="d-flex justify-content-center pb-5 text-dark">Add your Post</h1>
</div>

<form class="container" action="index.php?action=addPost" method="POST"> 

        <?php
        echo $form->input('img');
        echo $form->input1('title');
        echo $form->input2('text');
        echo $form->input3('category');
        echo $form->input4('author');
        echo $form->submit();
        ?>
</form>
<?php $content = ob_get_clean(); ?>
<?php require 'view/layout.html.php'; ?>
