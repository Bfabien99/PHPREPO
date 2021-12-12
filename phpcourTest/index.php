<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Php</title>
</head>
<body>
    <?php
    echo "<br><br>";
    //les chaines de caractere string
    $x = "hello, ca va ?<br>";
    $y = "C'est moi Fabien<br>";
    //Les tableaux array
    $jours = array("lundi","mardi","mercredi","jeudi","vendredi",5);
    //les objets object
    class Voiture{
        function __construct(){
            $this->couleur = "Bleu";$this->nom = "Toyota";
        }
    }
    $maVoiture = new Voiture();
    echo "x = ".$x;
    echo "<br>";
    echo "y = ".$y;
    echo "<br>";
    if($maVoiture->couleur == "Bleu")
    {echo($maVoiture->couleur);}
    else{
        echo "La couleur n'existe pas !";
    }
    echo "<br>";
    echo "il y a ".strlen($x)." caractères dans la variable x<br>";
    echo "<br>";
    echo "y compte ".str_word_count($y)." mots<br>";
    echo "x à l'envers donne : ".strrev($x);
    echo "<br>";
    echo strpos($x,"va");//verifie si "va" se trouve dans la chaine et renvoie sa position sinon n'affiche rien;
    echo "<br>";
    echo "<br> On remplace a par o dans x et on a : ".
    str_replace("a","o",$x);
    echo "<br>";
    $age = 10;
    $boisson = ($age > 18) ? "biere":"soda";
    echo "Il a ".$age.", il a donc droit à : -".$boisson;
    echo "<br>";
    $a =10;
    $b = 4;
    echo $x <=> $y;//1 si x>y, -1 si x<y, 0 si x=y;
    echo "<br>";
    for($i=1;$i<=8;$i++){
        echo "$i - Je suis fort <br>";
    }
    $e=4294-0310-3699-5890-1666;
    $day = array("lundi","mardi","mercredi","jeudi","vendredi","samedi","dimanche");
    for($i=0;$i<count($day);$i++){
        echo "à l'index $i du tableau on a $day[$i]<br>";
    }
    echo "<br><br>";
    echo "avec foreach ca donne : <br>";
    foreach ($day as $key => $value) {
        echo "à l'index $key du tableau on a $value<br>";
    }
    echo "<br><br>";
    $nombre=[2,4,7,3,9,1,2,4,5,5,3,0,1,2,9,1,8,7,7,6,8];
    foreach ($nombre as $key => $value) {
        echo "[$key] == $value<br>";
    }
    echo "Le plus grand c'est ".max($nombre)."<br>";
    echo "Le plus petit c'est ".min($nombre)."<br>";
    echo "<br><br>";
    $c=count($nombre)-1;
    $k=0;
    $is=0;
    while ($is<$c){
        if ($nombre[$is]<=$nombre[$is+1]) {
            $nombre[$is] = $nombre[$is];
            # code...
        } else {
            # code...
            $k = $nombre[$is];
            $nombre[$is] = $nombre[$is+1];
            $nombre[$is+1] = $k;
        }
        echo $nombre[$is]." - ";
        $is++;
    }
    ?>
</body>
</html>