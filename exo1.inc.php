<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        echo "<h3>EXO 2</h3>";
        $x = "AA";
        $y="AB";
        $z=&$x;
        $x="BBA";
        $y=&$x;
        echo "x = ".$x."<br>";
        echo "y = ".$y."<br>";
        echo "z = ".$z."<br>";
        echo"<hr>";

        echo "<h3>EXO 3</h3>";
        $x = "AA";
        $y="AB";
        $z=&$x;
        $x="BBA";
        $y=&$x;
        echo "x = ".$GLOBALS["x"]."<br>";
        echo "y = ".$GLOBALS["y"]."<br>";
        echo "z = ".$GLOBALS["z"]."<br>";
        echo"<hr>";

        echo "<h3>EXO 4</h3>";
        echo "la version de votre PHP est ".PHP_VERSION."<br>";
        echo "le nom de votre systeme d'exploitation est ".PHP_OS."<br>";
        echo"<hr>";

    ?>
    
</body>
</html>