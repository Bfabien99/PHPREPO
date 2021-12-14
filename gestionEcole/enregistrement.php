<?php 
    include 'connect.php';
    try {
        $query="select * from `classe`";
        $query = mysqli_query($connection,$query);
        $classes = $query->fetch_all($mode = MYSQLI_ASSOC);
    } catch(\Exception $e) {
        echo $e;
    }

    try {
        $querys="select * from `matiere`";
        $querys = mysqli_query($connection,$querys);
        $matieres = $querys->fetch_all($mode = MYSQLI_ASSOC);
    } catch(\Exception $e) {
        echo $e;
    }

    if(isset($_POST['submit'])){
        $nom=strtoupper(checkInput($_POST['nom']));
        $prenom=strtoupper(checkInput($_POST['prenom']));
        $naissance=strtoupper(checkInput($_POST['naissance']));
        $email=strtolower(checkInput($_POST['email']));
        $mobile=checkInput($_POST['telephone']);
        $classe=$_POST['classe'];
        $matiere=$_POST['matiere'];
        
        // die(var_dump($matiere));
        // [1,2]

        
        $sql="INSERT into `etudiant` (nomEtud,prenomEtud,naissanceEtud,emailEtud,numeroEtud,classeEtud) VALUES('$nom','$prenom','$naissance','$email','$mobile','$classe')";
        $result=mysqli_query($connection,$sql);
        if(!$result){
            echo "Error : ".mysqli_error($connection);
        }
        else {
            $userId=$connection->insert_id;
            foreach ($matiere as $key => $value) {
                $sqlMatiere="INSERT into `etudiant_matiere` (matiere_id,etudiant_id) VALUES('$value','$userId')";
                $result = mysqli_query($connection,$sqlMatiere);
            }
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'Enregistrement</title>
</head>
<body>
    <div class="container">
        <form method="POST">
            <div class="formgroup">

                <div class="inputInfo">
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" placeholder="Entrez le nom de l'étudiant">
                </div>
                <div class="inputInfo">
                    <label for="prenom">Prenom</label>
                    <input type="text" name="prenom" id="prenom" placeholder="Entrez le prénom de l'étudiant">
                </div>

            </div>

            <div class="formgroup">

                <div class="inputInfo">
                    <label for="naissance">Née le</label>
                    <input type="date" name="naissance" id="naissance" placeholder="Entrez la date de naissance de l'étudiant">
                </div>
                <div class="inputInfo">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" placeholder="Entrez l'email de l'étudiant">
                </div>
                
            </div>

            <div class="formgroup">

                <div class="inputInfo">
                    <label for="telephone">Téléphone</label>
                    <input type="tel" name="telephone" id="telephone" placeholder="Entrez le téléphone de l'étudiant">
                </div>
                <div class="inputInfo">
                    <label for="classe">Classe</label>
                    <select name="classe" id="classe">
                        <?php
                            foreach($classes as $class) {
                                ?>
                                <option value="<?= $class['id'] ?>"><?= $class['nomClasse'] ?></option>
                            <?php } ?>
                        
                    </select>
                </div>
                
            </div>
            
            <div class="inputInfo">
            <?php
                            foreach($matieres as $matiere) {
                                ?>
                                <label><?= $matiere['nomMatiere'] ?></label><input type="checkbox" value="<?= $matiere['id']?>" name="matiere[]" id="matiere">
                            <?php } ?></label>
            </div>


            <input type="submit" value="Enregistrer" name="submit" id="submit">

        </form>
    </div>
</body>
</html>