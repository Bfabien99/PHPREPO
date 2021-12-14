<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Php</title>
</head>
<body>
  <?php echo "Hello World <br>";
  // phpinfo();
  echo "<h3>Aujourd'hui est le :".date(' d / M / Y H : m : s')."</h3> <hr>";
  $var1 = "paris";
  $var2 = "Nantes";
  $var3 = "Abidjan";
  $var2 = $var1;//affectation par valeur: Toutes modifications sur var1 après cette ligne n'affecte par var2;
  $var3 = &$var1;//affectation par reference: Toutes modifications sur var1 après cette ligne affectera var3 et vice versa;
  $var1 = "Bouaké";
  echo $var2." --> ".$var3;
  $var3 = "123";
  echo "<br>";
  echo $var1." --> ".$var3;
  echo "<br>";
  define("PI",3.1415926535,FALSE);
  if (defined("PI")) {
    echo "la valeur de pi vaut ".PI;
    echo "<br>";
    echo "La version de votre php est ".PHP_VERSION;
    echo "<br>";
  }
  echo gettype($var1);
  echo "<br>";
  echo is_string($var1);//retourne 1 pour true ou 0 pour false;
  echo "<br>";
  $var3 = 23.2;
  $var3 = (integer) $var3;
  echo gettype($var3);
  $var = 011;
  echo "<br>";
  echo $var;
  echo "<br>";
  echo decbin(9);
  echo "<br>";
  $tab[0] = 1;
  $tab[20] = 123;
  $tab[5] = "Hello wordl";
  $tab[10] = $tab[0]." Whoa";
  echo $tab[20]." ".$tab[0]."<br>";
  $tob = [1,"Hello","PHP",34,3.2];
  echo "le tableau contient ".count($tab)." éléments";
  echo "<br>";
  echo count($tob);
  echo "<br>";
  class myclass{

  }
  $vare1 = new myclass;
  echo gettype($vare1);//get_class($vare1) pour avoir le nom de l'object;
  echo "<br>"."<a href=\"exo1.inc.php\">lien vers exo </a>";
  ?>
</body>
</html>
