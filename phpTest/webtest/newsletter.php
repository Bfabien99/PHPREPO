<?php
    require_once '../fonction.php';
    $error=null;
    $email=null;
    $success =null;
    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
            $success = "Votre email a bien été enregistré";
            $file = 'email'.DIRECTORY_SEPARATOR.date('Y-m-d');
            file_put_contents($file,$email.PHP_EOL,FILE_APPEND);
            $email=null;
        }
        else{
            $error = "Email invalide";
        }
    }
    
    require 'header.php'
?>

    <h1>S'inscrire à la Newsletter</h1>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Enim dolore minus quidem sunt, facere dolorem harum, molestiae maxime ea beatae temporibus voluptas facilis consequuntur! Saepe animi dolorum quam at repudiandae.</p>

    <?php if($error):?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php elseif($success):?>
        <div class="alert alert-success">
            <?= $success ?>
        </div>
    <?php endif ?>

    <form action="newsletter.php" method="post" class="form-inline">
        <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Entrer votre email" required value="<?= htmlentities($email)?>">
        </div>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>

<?php
    require 'footer.php'
?>