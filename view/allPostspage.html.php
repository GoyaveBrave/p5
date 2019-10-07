<?php require_once 'model/Text.php';
      require_once 'model/Article.php';
      $titlee = 'All Posts';      
    ?>
<?php ob_start(); ?>
   
      <!--Section1-->
      <h2>All Posts</h2>
      <?php 
      foreach ($articles as $article): ?>
      <div class="section3">
        <div class="posts_prev">
        <img src="view/img/<?= $article->getImg() ?>" class="img-thumbnail">
        <p><?= $article->getCategory() ?></p>
        <p><?= $article->getTitle() ?></p>
        <p><?= nl2br(htmlentities(Text::excerpt($article->getText()))) ?></p>
        <p><?= $article->getDate() ?></p>
        <button onclick="location.href='index.php?action=viewId&amp;article=<?=$article->getId() ?>'" type="button" class="btn btn-success">More</button>
        <div class="art_bar"></div>
        </div>
        </div>
      </div>
      <?php endforeach; ?>
<?php $content = ob_get_clean(); ?>
<?php require 'view/layout.html.php'; ?>