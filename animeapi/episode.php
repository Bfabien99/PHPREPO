<?php
require 'AnimeFinder.php';
$animeEpisode = new AnimeFinder();

if ($_GET['id']) {
    $listes = $animeEpisode->lienExterne($_GET['id']);
    if (!is_array($listes)) {
        $listes = [];
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Episode</title>
</head>
<body>
    <div class="container">
        <div class="row">
        <?php if ($listes != []): ?>
            <?php foreach ($listes as $liste):?>
                <div class="card col-sm-4 mt-3">
                    <div class="card-body">
                        <ul>
                        <li>Episode : <?= $liste['id'] ?></li>
                        <li>Titre : <?= $liste['title'] ?></li>
                        <li>Titre Japonnais : <?= $liste['title_jap'] ?></li>
                        <li><a href="<?= $liste['video'] ?>">Regardé episode</a> </li>
                        </ul>
                    </div>
                </div>
            <?php endforeach ; ?>
        </div>
        <?php elseif($_GET['titre']): ?>
            <em>Unique episode</em>
            <li>Titre : <?php echo $_GET['titre'] ?></li>
        <?php endif; ?>
    </div>
</body>
</html>
</body>
</html>