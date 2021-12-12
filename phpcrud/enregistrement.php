<?php 

include 'connect.php';
if(isset($_POST['submit'])){
    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $naissance=$_POST['naissance'];
    $email=$_POST['email'];
    $mobile=$_POST['numero'];

    $sql="INSERT into `etudiant` (nom,prenom,naissance,email,numero) VALUES('$nom','$prenom','$naissance','$email','$mobile')";
    $result=mysqli_query($connection,$sql);
    if(!$result){
        die(mysqli_error($connection));
    }
    else {
        header("Location:index.php");
    }
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
            <div class="inputInfo">
                <label for="nom">Nom</label>
                <input type="text" name="nom" id="nom" placeholder="Entrez votre nom">
            </div>

            <div class="inputInfo">
                <label for="prenom">Prenom</label>
                <input type="text" name="prenom" id="prenom" placeholder="Entrez votre prenom">
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
                <input type="text" name="numero" id="numero" placeholder="Entrez votre numero">
            </div>

            <input type="submit" value="Enregistrer" id="submit" name="submit">
        </form>
    </div>
</body>
</html>