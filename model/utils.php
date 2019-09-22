<?php

function render(string $path, array $variables =[]){
    extract($variables);
    ob_start();
    require('' . $path . '.html.php');
    $pageContent = ob_get_clean();
}