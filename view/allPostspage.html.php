<?php require_once 'model/Text.php';
      require_once 'model/Article.php';
      require 'view/layout.html.php'; ?>
   
      <!--Section1-->
      <h2>All Posts</h2>
      <?php 
      foreach ($articles as $article): ?>
      <div class="section3">
        <div class="posts_prev">
          <img src="view/img/blanc.jpg" alt="">
        <p><?= $article->getCategory() ?></p>
        <p><?= $article->getTitle() ?></p>
        <p><?= nl2br(htmlentities(Text::excerpt($article->getText()))) ?></p>
        <button onclick="location.href='index.php?action=viewId&amp;article=<?=$article->getId() ?>'" type="button" class="btn btn-success">More</button>
        <div class="art_bar"></div>
        </div>
        </div>
      </div>
      <?php endforeach; ?>

      
    
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Portfolio</a>
        </li>
        <li class="nav-item">
          <button type="button" class="btn btn-sucess">SignIn</button>
        </li>
      </ul>
      </div>
      </nav>
  <? require '../index.php'; ?>
</head>
<body>
    
</body>
</html>