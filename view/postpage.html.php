<?php use App\entity\Text;

?>
<?php ob_start(); ?>
<!-- Title and img--> 
<div class="container-fluid bg-light mx-auto">
  <h1 class="d-flex justify-content-center pb-5 text-dark"><?= $article->getTitle(); ?></h1>
</div>

<div class="container w-75 bg-light pb-3">
  <img src="view/img/<?= $article->getImg() ?>" class="w-50">
  <p class="lead text-black-50">"<?= nl2br(htmlentities(Text::excerpt($article->getText()))) ?>"</p>
  <p class="text-dark text-justify"><?= $article->getText(); ?></p>
  <p class="text-secondary"><?= $article->getCategory(); ?></p>
      <h2 class="text-success "><?= $article->getAuthor(); ?></h2>
  <p class="text-secondary">Date de modification : <?= $article->getDate() ?></p>

</div>
<?php if (isset($_SESSION['mail'])): ?>
                <form class="w-50 mx-auto form-group" action="index.php?action=addComment&amp;article=<?=$article->getId() ?>" method="POST">
                <label for="comment">Comment :</label>
                <?php
                echo $form->inputco3('comment');
                echo $form->inputco('username');
                echo $form->submit();
                ?>
              </form>
  <?php endif; ?>

<?php foreach ($comments as $comment):  ?>
<div class="container card w-50 bg-light pb-3">
  <p class="text-dark text-justify"><?= $comment->getComments(); ?></p>
      <p class="text-success text-right "><?= $comment->getUsername();?></p>
</div>
<?php endforeach; ?>
<?php $content = ob_get_clean(); ?>
<?php require 'view/layout.html.php'; ?>