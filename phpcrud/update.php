<?php 

require 'connect.php';

$id=$_GET['updateid'];
$sql="SELECT * FROM `etudiant` WHERE id=$id";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($result);
$nom=$row['nom'];
$prenom=$row['prenom'];
$naissance=$row['naissance'];
$email=$row['email'];
$mobile=$row['numero'];
$code=$row['code'];

if(isset($_POST['submit'])){
    $nom=strtoupper(checkInput($_POST['nom']));
    $prenom=strtoupper(checkInput($_POST['prenom']));
    $naissance=strtoupper(checkInput($_POST['naissance']));
    $email=strtolower(checkInput($_POST['email']));
    $mobile=checkInput($_POST['numero']);
    $code=crypt_steph(checkInput($_POST['code']));

    $sql="UPDATE `etudiant` set id=$id,nom='$nom',prenom='$prenom',naissance='$naissance',email='$email',numero='$mobile',code='$code' WHERE id=$id";
    $result=mysqli_query($connection,$sql);
    if(!$result){
        die(mysqli_error($connection));
    }
    else {
        header("Location:index.php");
    }
}

//verifier les entrées de l'utilisateurs
function checkInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//crypte les données
function crypt_steph($string)
{
    $string = md5($string);
    $string = crypt($string, '$5$rounds=5000$charteuse$');
    $string = sha1($string);
    $string = hash('gost', $string);
    return $string;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/enregistrement.css">
    <link rel="stylesheet" href="css/update.css">
<<<<<<< HEAD
    <title>Modifier informations de <?php echo $nom; ?></title>
=======
    <title>Mise à jour des informations</title>
>>>>>>> bd709464df9b55db02bf4fd27ff2101a1d05499b
</head>
<body>
    <div class="container">
        <form method="post" autocomplete="off">
            <a href="index.php" class="close" title="Accueil" alt="croix">&times;</a>
            <h1>Modifier informations</h1>
            <div class="inputInfo">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" placeholder="Entrez votre nom" value="<?php echo $nom; ?>" required title="Champ obligatoire">
            </div>

            <div class="inputInfo">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prenom" value="<?php echo $prenom; ?>" required title="Champ obligatoire">
            </div>

            <div class="inputInfo">
                <label for="naissance">Née le</label>
                <input type="date" name="naissance" id="naissance" placeholder="Entrez votre date de naissance" value="<?php echo $naissance; ?>">
            </div>

            <div class="inputInfo">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Entrez votre email" value="<?php echo $email; ?>">
            </div>

            <div class="inputInfo">
                <label for="numero">Mobile</label>
                <input type="text" name="numero" id="numero" placeholder="Entrez votre numero" value="<?php echo $mobile; ?>" required title="Champ obligatoire">
            </div>

            <div class="inputInfo">
                <label for="code">Mot de passe</label>
                <input type="text" name="code" id="code" placeholder="Entrez votre email" value="<?php echo $code; ?>">
            </div>

            <input type="submit" value="Modifier" id="submit" name="submit">
        </form>
    </div>
</body>
</html>