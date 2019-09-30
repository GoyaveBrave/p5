<?php 
require 'view/layout.html.php';
require_once 'model/form.html.php';
require_once 'model/Article.php';
require_once 'model/Admin.php';
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

<form class="container" action="index?action=editPost" method="POST">
<textarea class="form-control" name="id"><?= $article['id']; ?></textarea>
<textarea class="form-control" name="img"><?= $article['img']; ?></textarea>
<textarea class="form-control" name="title"><?= $article['title']; ?></textarea>
<textarea class="form-control" name="category"><?= $article['category']; ?></textarea>
<textarea class="form-control" name="text"><?= $article['text']; ?></textarea>
<textarea class="form-control" name="author"><?= $article['author']; ?></textarea>
<?= $form->submit(); ?>
</form>