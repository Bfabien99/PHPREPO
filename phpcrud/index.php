<?php 
require 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <a href="enregistrement.php" class="add">S'inscrire </a>
        <div class="tablecontain">
            <table>

                <thead>

                    <tr>

                        <th>N°</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Née le</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Action</th>

                    </tr>
                    
                </thead>


                <tbody>

                    <?php 
                    
                        $sql = "SELECT * FROM `etudiant`";
                        $result = mysqli_query($connection,$sql);
                        $i=1;
                        if($result){
                            while($row = mysqli_fetch_assoc($result)){
                                $id = $row['id'];
                                $nom = $row['nom'];
                                $prenom = $row['prenom'];
                                $naissance = $row['naissance'];
                                $email = $row['email'];
                                $mobile = $row['numero'];
                                
                                echo '
                                    <tr>
                                        <th>'.$i++.'</th>
                                        <td>'.$nom.'</td>
                                        <td>'.$prenom.'</td>
                                        <td>'.$naissance.'</td>
                                        <td>'.$email.'</td>
                                        <td>'.$mobile.'</td>
                                        <td class="action">
                                            <a href="update.php?updateid='.$id.'" class="update">Modifier</a>

                                            <a href="delete.php?deleteid='.$id.'" class="delete">Supprimer</a>

                                            <a href="show.php?showid='.$id.'" class="show">Voir</a>
                                        </td>
                                    </tr>
                                ';
                            }
                            
                        }
                    ?>
                    
                </tbody>

            </table>
        </div>
    </div>
</body>
</html>