<?php
require_once 'model/form.html.php';
require_once 'model/Admin.php';
$titlee = 'Add a comment';
$form = new Form($_POST);
?>
<?php ob_start(); ?>
<form class="container form-group" action="index.php?action=addComment" method="POST">
  <label for="comment">Comment :</label>
  <?php
  echo $form->inputco3('comment');
  echo $form->inputco('username');
  echo $form->submit();
  ?>
</form> 
<?php $content = ob_get_clean(); ?>
<?php require 'view/layout.html.php'; ?>