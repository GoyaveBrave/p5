<?php 
require 'view/layout.html.php';
require_once 'model/form.html.php';
require_once 'model/Admin.php';
require_once 'model/Comments.php';
$form = new Form($_POST);
?>

<!-- Title and img--> 
<div class="container-fluid bg-light mx-auto">
  <h1 class="d-flex justify-content-center pb-5 text-dark"><?= $article['title']; ?></h1>
</div>

<div class="container w-50 bg-light pb-3">
  <p class="text-left text-success"><?= $article['img'];//modifier en Set?></p>
  <p class="lead text-black-50">"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p>
  <p class="text-dark text-justify"><?= $article['text']; ?></p>
      <h2 class="text-success "><?= $article['author']; ?></h2>

</div>

<form class="container form-group" action="index.php?action=addComment" method="POST">
  <label for="comment">Comment :</label>
  <?php
  echo $form->inputco3('comment');
  echo $form->inputco('username');
  echo $form->submit();
  ?>
</form>

<?php foreach ($comments as $comment):  ?>
<div class="container card w-50 bg-light pb-3">
  <p class="text-dark text-justify"><?= $comment->getComments(); ?></p>
      <p class="text-success text-right "><?= $comment->getUsername();?></p>
</div>
<?php endforeach; ?>