<?php

use App\NumberHelper;
use App\TableHelper;
use App\URLHelper;

define('PER_PAGE',10);

require 'vendor/autoload.php';
require 'connect.php';

$query = "SELECT * FROM products";
$queryCount = "SELECT COUNT(id) as count FROM products";
$params = [];
$sortable = ["id","name","city","price","address"];

//Recherche par ville
if (!empty($_GET['q'])) {
    $query .= " WHERE city LIKE :city";
    $queryCount .= " WHERE city LIKE :city";
    $params['city'] = "%".$_GET['q']."%";
}

//Organisation
if (!empty($_GET['sort']) && in_array($_GET['sort'], $sortable)) {
    $direction = $_GET['dir'] ?? 'asc';
    if (!in_array($direction, ['asc', 'desc'])) {
        $direction = 'asc';
    }
    $query .= " ORDER BY ".$_GET['sort']." $direction ";
}

//Pagination
$page = (int)($_GET['p'] ?? 1);
$offset = ($page-1) * PER_PAGE;

$query .=  " LIMIT ".PER_PAGE." OFFSET $offset";

$statement = $pdo->prepare($query);
$statement->execute($params);
$products = $statement->fetchAll();
    // dd($products);

$statement = $pdo->prepare($queryCount);
$statement->execute($params);
$count = (int)$statement->fetch()['count'];
$pages = ceil($count / PER_PAGE);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>Biens immobilier</title>
</head>
<body class="p-4">
    <h2>Les biens immobiliers</h2>
    <form action="" class="mb-4">
        <div class="form-group" >
            <input type="text" name="q" class="form-control" placeholder="Rechercher par ville" value="<?= htmlentities($_GET['q'] ?? null); ?>">
        </div>
        <button class="btn btn-primary mt-4">Rechercher</button>
    </form>
    <table class="table table-striped">
        <thead>
            <tr>
                <th><?= TableHelper::sort('id','ID',$_GET)?></th>
                <th><?= TableHelper::sort('name','Nom',$_GET)?></th>
                <th><?= TableHelper::sort('price','Prix',$_GET)?></th>
                <th><?= TableHelper::sort('city','Ville',$_GET)?></th>
                <th><?= TableHelper::sort('address','Adresse',$_GET)?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product):?>
            <tr>
                <td>#<?= $product["id"] ;?></td>
                <td><?= $product["name"] ;?></td>
                <td><?= NumberHelper::price($product["price"]); ?></td>
                <td><?= $product["city"] ;?></td>
                <td><?= $product["address"] ;?></td>
            </tr>
            <?php endforeach;?>
        </tbody>
    </table>

    <?php if($pages > 1 && $page>1): ?>
        <a href="?<?= URLHelper::withParam($_GET,"p", $page - 1) ;?>" class="btn btn-primary">Page précédente</a>
    <?php endif ?>

    <?php if($pages > 1 && $page<$pages): ?>
        <a href="?<?= URLHelper::withParam($_GET,"p", $page + 1) ;?>" class="btn btn-primary">Page suivante</a>
    <?php endif ?>
</body>
</html>