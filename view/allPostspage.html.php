<?php use App\entity\Text;

?>
<?php ob_start(); ?>
   
      <!--Section1-->
      <h2>All Posts</h2>
      <div class="container-fluid w-85">
      <div class="d-flex justify-content-around flex-wrap">
      <?php
      foreach ($articles as $article): ?>
      <div class="col-5 mt-5">
        <img src="view/img/<?= $article->getImg() ?>" class="img-thumbnail w-25">
        <p><?= $article->getCategory() ?></p>
        <p><?= $article->getTitle() ?></p>
        <p><?= nl2br(htmlentities(Text::excerpt($article->getText()))) ?></p>
        <p><?= $article->getDate() ?></p>
        <button onclick="location.href='index.php?action=viewId&amp;article=<?=$article->getId() ?>'" type="button" class="btn btn-success">More</button>
        <div class="art_bar"></div>
        </div>
        
      
      <?php endforeach; ?>
      </div>
      </div>
<?php $content = ob_get_clean(); ?>
<?php require 'view/layout.html.php'; ?>