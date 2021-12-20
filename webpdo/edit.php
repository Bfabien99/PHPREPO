<?php
require_once 'class/Post.php';
require('connectdb.php');
$error_pdo = null;
$success = null;
try 
{   
    if (!isset($_GET['id'])) {
        die('Page not found');
    }
    if (isset($_POST['username'] , $_POST['message'])) {
        $query = $pdo->prepare("UPDATE posts SET name = :username , title = :title , content= :message WHERE id = :id");
        $query->execute([
            'id' => $_GET['id'],
            'username' => $_POST['username'],
            'title' => $_POST['title'],
            'message' => $_POST['message'],
        ]);
        $success = "Update save succesfully!";
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
        <h1>Update message</h1>
        <form action="" method="post">
        <div class="form-group">
            <input value="<?= htmlentities($posts->name); ?>" type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
        </div>

        <div class="form-group">
            <input value="<?= htmlentities($posts->title); ?>" type="text" name="title" id="title" class="form-control" placeholder="Enter title">
        </div>

        <div class="form-group">
            <textarea name="message" id="message" placeholder="Enter message" class="form-control"><?= htmlentities($posts->content); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <?php if($success): ?>
            <div class="alert alert-success mt-5">
                <?= $success; ?>
            </div>
        <?php endif ?>
    </form>
    <?php endif; ?>

<?php
require 'footer.php';
?>