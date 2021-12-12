<?php 

require 'connect.php';

$id=$_GET['showid'];
$sql="SELECT * FROM `etudiant` WHERE id=$id";
$result=mysqli_query($connection,$sql);
$row=mysqli_fetch_assoc($result);
$nom=$row['nom'];
$prenom=$row['prenom'];
$naissance=$row['naissance'];
$email=$row['email'];
$mobile=$row['numero'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/show.css">
    <title>Informations</title>
</head>
<body>
    <div class="container">
    <a href="index.php" class="close" title="Accueil" alt="croix">&times;</a>
        <h1>Informations</h1>
        <div class="box">
            <div class="info">
               <h3 class="title">Id : </h3>
               <h2>
                   <?php echo $id ;?>
                </h2>
            </div>
            
            <div class="info">
                <h3 class="title">Nom : </h3>
                <h2>    
                    <?php echo $nom ;?> 
                </h2>
            </div>

            <div class="info">
                <h3 class="title">Prénom : </h3>
                <h2>  
                    <?php echo $prenom ;?>    
                </h2>
            </div>

            <div class="info">
                <h3 class="title">Date de naissance : </h3>
                <h2>    
                    <?php echo $naissance ;?>   
                </h2>
            </div>

            <div class="info">
                <h3 class="title">Email : </h3>
                <h2 class="email">
                    <?php echo $email ;?>
                </h2>
            </div>

            <div class="info">
                <h3 class="title">Contact : </h3>
                <h2>
                    <?php echo $mobile ;?>
                </h2>
            
            </div>
            
            
            
            
            
        </div>
    </div>
</body>
</html>