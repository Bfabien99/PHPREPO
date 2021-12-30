<?php
$router->map('GET','/', 'home');
$router->map('GET','/contact', 'contact', 'contact');
$router->map('GET','/blog/[*:slug]-[i:id]', 'blog/article', 'article');
?>