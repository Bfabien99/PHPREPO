<?php
    $nom = $prenom = $email = $telephone = $message = "";
    $nom_Error = $prenom_Error = $email_Error = $telephone_Error = $message_Error ="";
    $success = false;
    $emailTo="fabienbrou99@gmail.com";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nom = verifyInput(strtoupper($_POST["nom"]));
        $prenom = verifyInput(strtoupper($_POST["prenom"]));
        $email = verifyInput(strtoupper($_POST["email"]));
        $telephone = verifyInput($_POST["telephone"]);
        $message = verifyInput($_POST["message"]);
        $success = true;
        $emailText="";

        if(empty($nom)){
            $nom_Error="Entre ton nom !";
            $success = false;
        }else{$emailText .="Nom : $nom\n";}

        if(empty($prenom)){
            $prenom_Error="Entre ton prenom !";
            $success = false;
        }else{$emailText .="Prenom : $prenom\n";}

        if(!isPhone($telephone)){
            $telephone_Error="Entre un numéro valide !";
            $success = false; 
        }else{$emailText .="Téléphone : $telephone\n";}

        if(!isEmail($email)){
            $email_Error="Entre un email valide !";
            $success = false; 
        }else{$emailText .="Email : $email\n";}

        if(empty($message)){
            $message_Error="Entre un message valide, evite les mots blessants !";
            $success = false; 
        }else{$emailText .="Message : $message\n";}

        if ($success) {
            $header="From : $nom $prenom <$email>\r\nReply-To: $email";
            mail($emailTo , "Un message du formulaire de contact" , $emailText , $header);
            $nom = $prenom = $email = $telephone = $message = "";
        }
    }


    function isPhone($var) {
        return preg_match("/^[0-9 ]*$/",$var);
    }

    function isEmail($var){
        return filter_var($var, FILTER_VALIDATE_EMAIL);
    }

    function verifyInput($var){
        $var = trim($var);
        $var = stripslashes($var);
        $var = htmlspecialchars($var);
        return $var;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <title>Contactez moi</title>
</head>
<body>
<div class="container">
    <div class="titles">
        <h1>CONTACTEZ-MOI</h1>
    </div>

    <form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>" role="form" autocomplete="off">
        <div class="form-group">

            <div class="inputInfo">
                <label for="prenom">Prénom <span class="blue">*</span></label>
                <input type="text" name="prenom" id="prenom" placeholder="Votre Prénom" value="<?php echo $prenom; ?>">
                <p class="error"><?php echo $prenom_Error; ?></p>
            </div>

            <div class="inputInfo">
                <label for="nom">Nom <span class="blue">*</span></label>
                <input type="text" name="nom" id="nom" placeholder="Votre Nom" value="<?php echo $nom; ?>">
                <p class="error"><?php echo $nom_Error; ?></p>
            </div>

        </div>


        <div class="form-group">

            <div class="inputInfo">
                <label for="email">Email <span class="blue">*</span></label>
                <input type="email" name="email" id="email" placeholder="Votre Email" value="<?php echo $email; ?>">
                <p class="error"><?php echo $email_Error; ?></p>
            </div>

            <div class="inputInfo">
                <label for="telephone">Téléphone</label>
                <input type="tel" name="telephone" id="telephone" placeholder="Votre Téléphone" value="<?php echo $telephone; ?>">
                <p class="error"><?php echo $telephone_Error; ?></p>
            </div>

        </div>

        <div class="inputInfo">
            <label for="message">Message <span class="blue">*</span></label>
            <textarea name="message" id="message" placeholder="Votre Message"><?php echo $message; ?></textarea>
            <p class="error"><?php echo $message_Error; ?></p>
        </div>

        <div class="requis">
            <h3 class="blue">*Ces informations sont requises.</h3>
        </div>

        <input type="submit" value="Envoyer" name="submit" id="submit">

        <p class="valide" style="display:<?php if ($success) echo 'block'; else echo 'none'; ?>">Formulaire envoyé !</p>
    </form>
    <p class="greeting">
        <?php
        if ($success) {
            # code...
            echo "Bonjour ".$nom." ".$prenom;
        }
            
        ?>
    </p>
</div>
</body>
</html>