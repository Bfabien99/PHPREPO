<?php 
$age = null;
if (!empty($_POST['birthday'])) {
    setcookie('birthday', $_POST['birthday']);
}

if (!empty($_COOKIE['birthday'])) {
    $birthday = (int)$_COOKIE['birthday'];
    $age = (int)date('Y') - $birthday;
}

require 'header.php' 
?>

<?php if ($age >= 18): ?>
    <h1>Bravo! Tu as <?= $age ?> ans , tu es donc majeur </h1>
<?php elseif ($age !== null):?>
    <div class="alert alert-danger">
        <h3>Vous n'avez pas l'âge requis</h3>
    </div>
<?php else :?>
<form action="" method="post">
    <div class="form-group">
        <label for="birthday">Section réservée aux adultes, entrer votre année de naissance</label>
        <select name="birthday" id="birthday" class="form-control">
            <?php for($i = 2010; $i > 1950; $i--):?>
                <option value="<?= $i ?>"><?= $i ?></option>
            <?php endfor?>
        </select>
    </div>
    <button class="btn btn-primary">Soumettre</button>
</form>
<?php endif; ?>
<?php require 'footer.php' ?>