<?php use App\entity\Text;

?>
<?php ob_start(); ?>
   
      <!--Section1-->
      <h2>All Posts</h2>
      <div class="row justify-content-md-center mx-auto">
      <?php
      foreach ($articles as $article): ?>
      <div class="row-sm col-md">
        <img src="view/img/<?= $article->getImg() ?>" class="img-thumbnail">
        <p><?= $article->getCategory() ?></p>
        <p><?= $article->getTitle() ?></p>
        <p><?= nl2br(htmlentities(Text::excerpt($article->getText()))) ?></p>
        <p><?= $article->getDate() ?></p>
        <button onclick="location.href='index.php?action=viewId&amp;article=<?=$article->getId() ?>'" type="button" class="btn btn-success">More</button>
        <div class="art_bar"></div>
        </div>
      <?php endforeach; ?>
      </div>
<?php $content = ob_get_clean(); ?>
<?php require 'view/layout.html.php'; ?>