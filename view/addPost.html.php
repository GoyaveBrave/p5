<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta placeholder="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>addPost</title>
</head>
<!--NavBar-->
<body>
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
</body>


<form class="col-sm" action="post">
<input class="form-control" type="text" placeholder="Title">
<textarea class="form-control" rows="3">Text</textarea>
<input class="form-control" type="text" placeholder="category">
<input class="form-control" type="text" placeholder="author">
<button type="submit" class="btn btn-primary mb-2">Submit</button>
</form>
</html>