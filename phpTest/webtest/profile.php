<?php
$nom=null;
if(!empty($_COOKIE['utilisateur'])){
    $nom=$_COOKIE['utilisateur'];
}

if (!empty($_POST['nom'])) {
    setcookie('utilisateur', $_POST['nom']);
}
    require 'header.php'
?>


<?php if($nom): ?>
    <h2>Bonjour <?= $nom ?></h2>
<?php else : ?>
    <h1>Acceder à la page suivante</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est omnis deleniti eligendi beatae officiis incidunt a vitae, nobis laudantium soluta totam! Facere consequatur hic consequuntur voluptatem, blanditiis animi laboriosam eligendi?</p>

    <form action="profile.php" method="post" class="form-inline">

        <div class="form-group">
            <label for="firstname" class="sr-only"></label>
            <input id="firstname" class="form-control input-group-lg reg_name" type="text" name="nom" title="Entre un nom" placeholder="Entre un nom"/>
        </div>

        <button type="submit" class="btn btn-primary">Connecter</button>
    </form>
<?php endif ?>
<?php
    require 'footer.php'
?>