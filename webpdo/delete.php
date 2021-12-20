<?php
require('connectdb.php');
$error_pdo = null;
$success = null;
try 
{   
    if (!isset($_GET['id'])) {
        die('Page not found');
    }

    $query = $pdo->prepare("DELETE FROM posts WHERE id = :id");
    $query->execute([
            'id' => $_GET['id'],
        ]);
    header('Location: index.php');
    exit();

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
<?php endif ?>

<?php
require 'footer.php';
?>