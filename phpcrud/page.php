<?php
    session_start();
    if(!isset($_SESSION['nom']))      // if there is no valid session
{
    header("Location:connection.php");
}
    require 'connect.php';
    if (isset($_POST["submit"])){
        unset($_SESSION['nom']);
        session_destroy();
        header("Location: connection.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hello</title>
</head>
<body>
    <?php
        echo "Bonjour ".$_SESSION['nom'];
    ?>
    <form method="post">
        <input type="submit" value="Deconnecter" name="submit" id="submit">
    </form>
</body>
</html>