<?php
require_once 'model/Article.php';
require_once 'model/Text.php';
require_once 'model/Admin.php';
require_once 'model/form.html.php';
$form = new Form($_POST);
$titlee = 'Edit Post';      
?>
<?php ob_start(); ?>

<!-- Title and img--> 

<div class="container-fluid bg-light mx-auto">
  <h1 class="d-flex justify-content-center pb-5 text-dark"><?= $article->getTitle() ?></h1>
</div>

<div class="container w-50 bg-light pb-3">
  <p class="text-left text-success"><?= $article->getImg() ?></p>
  <p class="lead text-black-50">"<?= nl2br(htmlentities(Text::excerpt($article->getText()))) ?>"</p>
  <p class="text-dark text-justify"><?= $article->getText() ?></p>
      <h2 class="text-success "><?= $article->getAuthor() ?></h2>

</div>

<form class="container" action="index?action=editPost" method="POST">
<textarea class="form-control" name="id"><?=$article->getId() ?></textarea>
<textarea class="form-control" name="img"><?= $article->getImg() ?></textarea>
<textarea class="form-control" name="title"><?= $article->getTitle() ?></textarea>
<textarea class="form-control" name="category"><?= $article->getCategory() ?></textarea>
<textarea class="form-control" name="text"><?= $article->getText() ?></textarea>
<textarea class="form-control" name="author"><?= $article->getAuthor() ?></textarea>
<?= $form->submit(); ?>
</form>

<?php $content = ob_get_clean(); ?>
<?php require 'view/layout.html.php'; ?>