<?php
require '../vendor/autoload.php';
//  

$uri = $_SERVER['REQUEST_URI'];

$router = new AltoRouter();
$router->map('GET','/', 'home');
$router->map('GET','/nous-contacter', 'contact', 'contact');
$router->map('GET','/blog/[*:slug]-[i:id]', 'blog/article', 'article');
$match = $router->match();
if(is_array($match)){
    require '../element/header.php';
    if (is_callable($match['target'])) {
        call_user_func_array( $match["target"],  $match["params"]);
    }
    else{
        $params = $match['params'];
        require "../template/{$match['target']}.php";
    }
    require '../element/footer.php';
}else{
    echo "Error: 404";
}
//dump($match);
// 
?>