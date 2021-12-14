<?php 

include 'connect.php';
if(isset($_POST['submit'])){
    $nom=strtoupper(checkInput($_POST['nom']));
    $prenom=strtoupper(checkInput($_POST['prenom']));
    $naissance=strtoupper(checkInput($_POST['naissance']));
    $email=strtolower(checkInput($_POST['email']));
    $mobile=checkInput($_POST['numero']);
    $code=crypt_steph(checkInput($_POST['code']));

    $sql="INSERT into `etudiant` (nom,prenom,naissance,email,numero,code) VALUES('$nom','$prenom','$naissance','$email','$mobile','$code')";
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
    $string = crypt($string, '$5$rounds=10$charteuse$');
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
    <title>S'inscrire</title>
</head>
<body>
    <div class="container">
        <form method="post" autocomplete="off">
            <a href="index.php" class="close" title="Accueil" alt="croix">&times;</a>
            <h1>Formulaire d'inscription</h1>
            <span style="color:tomato;">(*) champs obligatoire</span>
            <div class="inputInfo">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" placeholder="(*) Entrez votre nom" required title="Champ obligatoire">
            </div>

            <div class="inputInfo">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" id="prenom" placeholder="(*) Entrez votre prenom" required title="Champ obligatoire">
            </div>

            <div class="inputInfo">
                <label for="naissance">Née le</label>
                <input type="date" name="naissance" id="naissance" placeholder="Entrez votre date de naissance">
            </div>

            <div class="inputInfo">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Entrez votre email">
            </div>

            <div class="inputInfo">
                <label for="numero">Mobile</label>
                <input type="text" name="numero" id="numero" placeholder="(*) Entrez votre numero" required title="Champ obligatoire">
            </div>

            <div class="inputInfo">
                <label for="code">Mot de passe</label>
                <input type="text" name="code" id="code" placeholder="Entrez votre email">
            </div>

            <input type="submit" value="Enregistrer" id="submit" name="submit">
        </form>
    </div>
</body>
</html>