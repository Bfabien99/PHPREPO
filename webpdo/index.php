<?php
use Apps\Post;
require 'vendor/autoload.php';
require_once 'class/Post.php';
require('connectdb.php');
$error_pdo = null;
try 
{
    if (isset($_POST['username'] , $_POST['message']) && !empty($_POST['username']) && !empty($_POST['message'])) {
        $query = $pdo->prepare("INSERT INTO posts (name, title, content, created_at) VALUES (:username ,:title, :message, :created_at)");
        $query->execute([
            'username' => $_POST['username'],
            'title' => $_POST['title'],
            'message' => $_POST['message'],
            'created_at' => time(),
        ]);
        header('Location: show.php?id='. $pdo->lastInsertId());
        exit();
    }
    $query = $pdo->query("SELECT * FROM posts");
    /** @var Post[] */
    $posts = $query->fetchAll(PDO::FETCH_CLASS,Post::class);
} 
catch (PDOException $e) 
{
    $error_pdo = $e->getMessage();
}

require 'header.php';
?>
    <h1>Send message</h1>
    <form action="" method="post">
        <div class="form-group">
            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username">
        </div>

        <div class="form-group">
            <input type="text" name="title" id="title" class="form-control" placeholder="Enter title">
        </div>

        <div class="form-group">
            <textarea name="message" id="message" placeholder="Enter message" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send</button>
    </form>
    
    <h1>Article</h1>
    <div class="card-content mt-3" style="max-height:20%;overflow:auto;">
    <?php if($error_pdo): ?>
        <div class="alert alert-danger">
        <?= $error_pdo; ?>
        </div>
    <?php else: ?>
        <ul class="list-group">
            <?php foreach ($posts as $post): ?>
                <li class="list-group-item">
                <h5><em>Send by :</em>  <?= nl2br(htmlentities($post->name)); ?></h5>
                <strong><?= $post->title; ?></strong><br>
                <em><a href="show.php?id=<?= nl2br(htmlentities($post->id)); ?>" title="<?= $post->content; ?>" ><?= $post->getBody(); ?></em></a><br>
                <p class="small text-muted">Write :<?= $post->created_at->format('Y-m-d - H:i'); ?></p>
                <a href="delete.php?id=<?= nl2br(htmlentities($post->id)); ?>" class="btn btn-danger">Delete</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
    </div>
<?php
require 'footer.php';
?>