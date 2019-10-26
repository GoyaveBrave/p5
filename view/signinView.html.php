<?php ob_start(); ?>

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
    <link href="signin.css" rel="stylesheet">
  </head>
    <form class="container form-signin" action="Connection" method="POST">
  <img class="mb-4" src="view/img/login.png" alt="" width="72" height="72">
  <?php
        echo $form->inputco1('mail');
        echo $form->inputco2('password');
        echo $form->submit1();
    ?>
  
  <a class="mt-5 mb-3 text-white" href="Register">Don't have an account yet ? Register here</a>
  <p class="mt-5 mb-3 text-muted">&copy; 2017-2019</p>
</form>
<?php $content = ob_get_clean(); ?>
<?php require 'view/layout.html.php'; ?>