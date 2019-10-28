<?php ob_start(); ?>

<div class="container-fluid bg-light mx-auto">
  <h1 class="d-flex justify-content-center pb-5 text-dark">Tell us !</h1>
</div>
<!-- Material form contact -->
<div class="container w-75 card">

    <h5 class="container.fluid bg-transparent text-success text-center py-4">
        Contact us
    </h5>

    <!--Card content-->
    <div class="card-body px-lg-5 pt-0">

        <!-- Form -->
        <form class="text-center" style="color: #757575;" method="POST">
        
        <div class="md-form mt-3"> <label for="materialContactFormName">Name</label>
        <?= $form->inputfo('name'); ?>
        </div>
        <div class="md-form mt-3"> <label for="materialContactFormEmail">E-mail</label>
        <?= $form->inputfo1('email'); ?>
        </div>
        <?= $form->inputfo2('subject'); ?>
        <div class="md-form"> <label for="materialContactFormMessage">Message</label>
        <?= $form->inputfo3('message'); ?>
        </div>
        <?= $form->submit2(); ?>

        </form>
    </div>

    <div><a href="public/CV.pdf" class="btn btn-success" role="button">Téléchargez mon CV ici</a>
    <p class="text-success"><br>Rejoins moi sur linkedin</p>
    <a href="https://www.linkedin.com/in/goyave69/" class="fa fa-linkedin w-100"></a></div>

</div>
<?php $content = ob_get_clean(); ?>
<?php require 'view/layout.html.php'; ?>