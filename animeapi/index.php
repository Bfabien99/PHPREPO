<?php
require 'AnimeFinder.php';
$animelist = new AnimeFinder();
$show=false;

if (!empty($_POST['titre'])) {
    $Animes= $animelist->anime($_POST['titre']);
    if (!is_array($Animes )) {
        $Animes = [];
    }
    $show=true;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            
            <form action="" method="post" class="row align-items-center">
                <div class="col-md-3">
                <input type="text" name="titre" placeholder="recherche un anime" class="form-control">
                </div>
                <div class="col-md-1">
                <input type="submit" value="Go" class="form-control">
                </div>
            </form>
        </div>
        
        <?php if($show): ?>
        <div class="row">
            <?php foreach ($Animes as $Anime):?>
                <div class="card col-sm-4 mt-3">
                    <a href="<?=$Anime['url']?>">
                    <div class="card-body " style="background:url(<?= $Anime['imageUrl'] ?>) no-repeat center/cover; width:150px;height:190px;">
                    </div>
                    <li><?= $Anime['title'] ?></li></a>
                </div>
                
            <?php endforeach?>
        
        </div>
        <?php endif ?> 
    </div>
</body>
</html>