<?php

use App\entity\Text;
use App\entity\Article;

$titlee = 'Accueil - PHP/Symfony developer';
?>
<?php ob_start(); ?>
<!--Section1-->
<div class="section1">

  <div class="container">
    <h1>CODING.</h1>
  </div>
  <div class="container">
    <img src="view/img/Starting.PNG" class="img-fluid" alt="Responsive image">
  </div>
</div>

<!--Section2-->
<h2>Who am I ?</h2>
<div class="section2">
  <div class="container">
    <img src="view/img/hipster.PNG" class="img-fluid" alt="Responsive image">
  </div>
  <div class="container">
    <p>BENEDDINE Majid, &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp 21 years old <br>

      <br> PHP/SYMFONY Developer.
    </p>
    <h4>HTML/CSS</h4>
    <div class="progress">
      <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <h4>PHP/SYMFONY</h4>
    <div class="progress">
      <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <h4>JAVASCRIPT</h4>
    <div class="progress">
      <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <h4>SQL</h4>
    <div class="progress">
      <div class="progress-bar bg-success" role="progressbar" style="width: 75%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
</div>
</div>


</div>
<!--Section3-->
<h2>Recent Posts</h2>

<div class="container-fluid w-85">
  <div class="d-flex justify-content-around flex-wrap">
    <?php

    foreach ($articles as $article) : ?>
      <div class=" col-5 mt-5">
        <img src="view/img/<?= $article->getImg() ?>" class="img-thumbnail w-25">
        <p><?= $article->getCategory() ?></p>
        <p><?= $article->getTitle() ?></p>
        <p><?= nl2br(htmlentities(Text::excerpt($article->getText()))) ?></p>
        <p><?= $article->getDate() ?></p>
        <button onclick="location.href='index.php?action=viewId&amp;article=<?= $article->getId() ?>'" type="button" class="btn btn-success">More</button>
        <div class="art_bar"></div>
      </div>
    <?php endforeach; ?>
  </div>
</div>


<div class="container"><button onclick="location.href='index.php?action=viewAll'" type="button" class="btn btn-success mx-auto">ALL MY POSTS</button></div>

<?php $content = ob_get_clean(); ?>
<?php require 'view/layout.html.php'; ?>