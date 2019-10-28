<?php use App\entity\Text;

?>
<?php ob_start(); ?>
<!--Section1-->
<div class="row justify-content-md-center mb-3 mx-auto">
  <div class="col-4">
    <h1>CODING.</h1>
  </div>
  <div class="col-4 d-none d-xl-block">
  <img src="view/img/Starting.PNG" class="img-fluid" alt="Responsive image">  
  </div>
</div>

<!--Section2-->
<h2 class="mb-4">Who am I ?</h2>

  <div class="row justify-content-md-around mx-auto">
  <div class="row-sm col-md">
    <img src="view/img/hipster.PNG" class="w-50" alt="Responsive image">
  </div>
  <div class="row-sm col-md">
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
<h2 class="mb-4">Recent Posts</h2>


  <div class="row justify-content-md-center w-75 mx-auto">
  <?php foreach ($articles as $article) : ?>    
      <div class="row-sm col-md">
        <img src="view/img/<?= $article->getImg() ?>" class="img-thumbnail">
        <p><?= $article->getCategory() ?></p>
        <p><?= $article->getTitle() ?></p>
        <p><?= nl2br(htmlentities(Text::excerpt($article->getText()))) ?></p>
        <p><?= $article->getDate() ?></p>
        <button onclick="location.href='index.php?action=viewId&amp;article=<?= $article->getId() ?>'" type="button" class="btn btn-success">More</button>
        <div class="art_bar"></div>
      </div>
      <?php endforeach; ?>  
    </div>
    <div class="text-center"><button onclick="location.href='index.php?action=viewAll'" type="button" class="btn btn-success">ALL MY POSTS</button></div> 

<?php $content = ob_get_clean(); ?>
<?php require 'view/layout.html.php'; ?>