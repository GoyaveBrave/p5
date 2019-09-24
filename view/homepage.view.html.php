<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="view/css/bootstrap.css">
    <link rel="stylesheet" href="view/css/style.css">
    <title>Homepage</title>
    <!--NavBar-->
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
    <button type="button" class="btn btn-primary">SignIn</button>
  </li>
</ul>
</div>
</nav>

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
        <p>BENEDDINE    Majid, &nbsp &nbsp &nbsp&nbsp&nbsp&nbsp        21 years old <br>

          <br> PHP/SYMFONY Developer.
           </p>
           <h4>HTML/CSS</h4>
           <div class="container">    
            <div class="progress2 progress-moved">
              <div class="progress-bar2" >
              </div>                       
            </div> 
          </div>
            <h4>PHP/SYMFONY</h4>
          <div class="container">    
            <div class="progress3 progress-moved">
              <div class="progress-bar3" >
              </div>                       
            </div> 
          </div>
          <h4>JAVASCRIPT</h4>
          <div class="container">    
            <div class="progress4 progress-moved">
              <div class="progress-bar4" >
              </div>                       
            </div> 
          </div>
          <h4>SQL</h4>
          <div class="container">    
            <div class="progress5 progress-moved">
              <div class="progress-bar5" >
              </div>                       
            </div> 
          </div>
          </div> 
        
      </div>
      <!--Section3-->
      <h2>Recent Posts</h2>
      <div class="section3">
      <?php foreach ($articles as $article): ?>
      <div class="posts_prev">
      <img src="img/blanc.jpg" alt="">
      <p><?= $article['category'] ?></p>
      <p><?= $article['title'] ?></p>
      <p><?= $article['text'] ?></p>
      <div class="art_bar"></div>
      </div>
      <?php endforeach; ?>

        ?>
        <div class="posts_prev">
            <img src="img/blanc.jpg" alt="">
          <p>ENTREPREUNARIAT</p>
          <p>Comment développer un business durable et rentable</p>
          <p>La chose la plus importante à savoir c'est que tout 
            est une question de temps et d'organisation vous savez...
          </p>
          <div class="art_bar"></div>
          </div>
      </div>
    <!--Section4-->
    <h2>My Works</h2>
    <div class="section4">
      <div class="work">
        <img src="img/flatiron-thumb.jpg" alt="">
      </div>
      <div class="work">
          <img src="img/pupil-thumb.jpg" alt="">
        </div>
    </div>
    <button class="but">PORTFOLIO</button>

    
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
          <button type="button" class="btn btn-primary">SignIn</button>
        </li>
      </ul>
      </div>
      </nav>
  
</head>
<body>
    
</body>
</html>