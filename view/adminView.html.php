 <?php 
      use App\entity\Text;      
?>
<?php ob_start(); ?>
<link rel="stylesheet" href="view/css/bootstrap.css">
<style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
      <!-- bouton signout <a class="nav-link" href="#">Sign out</a> !-->
    

<div class="container-fluid">
    <main role="main" class="container-fluid">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button onclick="location.href='Add-Post'" type="button" class="btn btn-sm btn-outline-success">New Post</button>
          </div>
          <button onclick="location.href='Deconnection'" type="button" class="btn btn-sm btn-outline-danger">Sign Out</button>
        </div>
      </div>

      
      <h2 class="text-dark">Posts</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
        
          <thead>
            <tr>
              <th>Title</th>
              <th>Author</th>
              <th>Category</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <?php foreach ($articles as $article): ?>
          <tbody>
            <tr>
              <td><?= $article->getTitle() ?></td>
              <td><?= $article->getAuthor() ?></td>
              <td><?= $article->getCategory() ?></td>
              <td><?= $article->getDate() ?></td>
              <td><button onclick="location.href='Edit-<?=$article->getId() ?>'" type="button" class="btn btn-success">Edit</button>
              <button onclick="location.href='index.php?action=delete&amp;article=<?=$article->getId() ?>'" type="button" class="btn btn-danger">Delete</button>
              <button onclick="location.href='index.php?action=viewId&amp;article=<?=$article->getId() ?>'" type="button" class="btn btn-primary">View</button>
            </td>
            </tr>            
          </tbody>
          <?php endforeach; ?>
        </table>

        <h2 class="text-dark">Comments</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
        
          <thead>
            <tr>
              <th>Username</th>
              <th>Content</th>
              <th>Action</th>
            </tr>
          </thead>
          <?php foreach ($comments as $comment):  ?>
          <tbody>
            <tr>
              <td><?= $comment->getUsername() ?></td>
              <td><?= nl2br(htmlentities(Text::excerptt($comment->getComments()))) ?></td>
              <td><button onclick="location.href='index.php?action=deleteComment&amp;article=<?=$comment->getId() ?>'" type="button" class="btn btn-danger">Delete</button>
            </td>
            </tr>            
          </tbody>
          <?php endforeach; ?>
        </table>
        <h2 class="text-dark">Comments Verify</h2>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
        
          <?php foreach ($comments_verify as $comment):  ?>
          <div class="card" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?= $comment->getUsername() ?></h5>
    <h6 class="card-subtitle mb-2 text-muted"><?=$comment->getDate()?></h6>
    <p class="card-text"><?=$comment->getComments()?></p>
    <h6 class="card-subtitle mb-2 text-muted"><?=$comment->getId()?></h6>
    <a href="index.php?action=deleteComment&amp;article=<?=$comment->getId() ?>" class="card-link text-danger">Refuse</a>
    <a href="index.php?action=commentVerify&amp;article=<?=$comment->getId() ?>" class="card-link text-success">Accept</a>
  </div>
</div>
<?php endforeach; ?>
      </div>
      </div>
    </main>
  </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require'view/layout.html.php'; ?>