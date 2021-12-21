<?php
require './connectdb.php';
$posts = $_POST['check'];
if ($posts) {
    
    $pdo = $connect->prepare("INSERT INTO box (value) VALUES (:check);");
    $pdo->execute([
        'check' => implode(",",$posts),
    ]);
}

$pdo = $connect->query("SELECT * FROM box");
$lists = $pdo->fetchAll();
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
    <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="post">
       <label for="1"><input type="checkbox" name="check[]" value="1">1</label>
       <label for="2"><input type="checkbox" name="check[]" value="2">2</label> 
       <label for="3"><input type="checkbox" name="check[]" value="3">3</label>
       <input type="submit" name="submit" value="envoyer">
    </form>
    <div>
        <h3>Valeur selectionner</h3>
        <ul>
        <?php foreach ($lists as $list):?>
            <?php $segs = explode(",",$list->value);?>
            <?php foreach ($segs as $seg) : ?>
                <li>id-<?=$list->id?>: <?= $seg ?> </li>
            <?php  endforeach; ?>
        <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>