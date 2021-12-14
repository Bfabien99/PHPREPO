<?php 
    
session_start();
if(isset($_SESSION['nom']))      // if there is no valid session
{
    header("Location:page.php");
}

require 'connect.php';


    $message ="";
    if (isset($_POST["submit"])) {
        $nom=strtoupper(checkInput($_POST['nom']));
        $code=crypt_steph(checkInput($_POST['code']));
        $sql="SELECT * FROM `etudiant` WHERE nom='$nom' AND code='$code'";
        $result=mysqli_query($connection,$sql);
        $data = $result->fetch_assoc();
        if (!$data) {
            $message ="Utilisateur inconnu";
            echo $message;
        }else{
            $_SESSION['nom'] = $nom;
            header("Location:page.php");
            $message ="";
        }
    }

    

    function checkInput($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }

//crypte les données
    function crypt_steph($string){
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
    <link rel="stylesheet" href="css/connection.css">
    <title>Se connecter</title>
</head>
<body>
    <div class="container">
        <form method="POST" autocomplete="off">
            <h1>Connecte Toi !</h1>
            <div class="inputInfo">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" placeholder="Entrez votre nom" required title="Champ obligatoire">
            </div>

            <div class="inputInfo">
                <label for="prenom">Mot de passe</label>
                <input type="passe" name="code" id="code" placeholder="Entrez votre prenom" required title="Champ obligatoire">
            </div>

            <input type="submit" value="se connecter" name="submit" id="submit">
        </form>
    </div>
</body>
</html>