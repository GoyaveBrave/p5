<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="view/css/bootstrap.css">
    <link rel="stylesheet" href="view/css/style.css">
    <title>Post Page</title>
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

<!-- Title and img--> 
<div class="container-fluid bg-light mx-auto">
  <h1 class="d-flex justify-content-center pb-5 text-dark"><?= $article->getTitle(); ?></h1>
</div>

<div class="container w-50 bg-light pb-3">
  <p class="text-left text-success"><?= $article->getTitle();//modifier en Set?></p>
  <p class="lead text-black-50">"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit..."</p>
  <p class="text-dark text-justify"><?= $article->getText(); ?></p>
      <h2 class="text-success "><?= $article->getAuthor(); ?></h2>

</div>