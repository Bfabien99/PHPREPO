<?php 
$age = null;
if (!empty($_COOKIE['birthday'])) {
    $birthday = (int)$_COOKIE['birthday'];
    $age = (int)date('Y') - $birthday;
}

if (!empty($_POST['birthday'])) {
    setcookie('birthday', $_POST['birthday']);
}

require 'header.php' 
?>

<form action="" method="post">
    <div class="form-group">
        <label for="birthday">Section réservée aux adultes, entrer votre année de naissance</label>
        <select name="birthday" id="birthday" class="form-control">
            <?php for($i = 2003; $i > 1920; $i--):?>
                <option value="<?= $i ?>"><?= $i ?></option>
            <?php endfor?>
        </select>
    </div>
    <button class="btn btn-primary">Soumettre</button>
</form>

<?php require 'footer.php' ?>