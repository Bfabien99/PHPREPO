<?php
require_once 'class/Post.php';
require('connectdb.php');
$error_pdo = null;
try 
{   
    if (!isset($_GET['id'])) {
        die('Page not found');
    }
    
    $query = $pdo->prepare("SELECT * FROM posts WHERE id = :id");
    $query->execute([
        'id' => $_GET['id'],
    ]);
    $posts = $query->fetch();
} 
catch (PDOException $e) 
{
    $error_pdo = $e->getMessage();
}

require 'header.php';
?>

   

    <?php if($error_pdo): ?>
        <div class="alert alert-danger">
        <?= $error_pdo; ?>
        </div>
    <?php else: ?>
        <p>
            <a href="index.php">Back</a>
        </p>
        
        <div class="card mt-2">
            <h1>Message</h1>
            <div class="card-body">
                <form action="" method="post">
                <h4>FROM : <?= htmlentities($posts->name); ?></h4>
                <p class="small text-muted"><?= $posts->created_at; ?></p>
                <h3> Title : <em><?= htmlentities($posts->title); ?></em> </h3>
                <p>
                <?= htmlentities($posts->content); ?>
                </p>
                <a href="edit.php?id=<?= $posts->id;?>" class="btn btn-primary">
                Update 
                </a>
                </form>
            </div>
        </div>
        
    <?php endif; ?>

<?php
require 'footer.php';
?>