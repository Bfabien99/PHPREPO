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
    echo "\n\n";
    //les chaines de caractere string
    $x = "hello, ca va ?\n";
    $y = "C'est moi Fabien\n";
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
    echo "\n";
    echo "y = ".$y;
    echo "\n";
    if($maVoiture->couleur == "Bleu")
    {echo($maVoiture->couleur);}
    else{
        echo "La couleur n'existe pas !";
    }
    echo "\n";
    echo "il y a ".strlen($x)." caractères dans la variable x\n";
    echo "\n";
    echo "y compte ".str_word_count($y)." mots\n";
    echo "x à l'envers donne : ".strrev($x);
    echo "\n";
    echo strpos($x,"va");//verifie si "va" se trouve dans la chaine et renvoie sa position sinon n'affiche rien;
    echo "<br>";
    echo "\n On remplace a par o dans x et on a : ".
    str_replace("a","o",$x);
    echo "\n";
    $age = 10;
    $boisson = ($age > 18) ? "biere":"soda";
    echo "Il a ".$age.", il a donc droit à : -".$boisson;
    echo "\n";
    $a =10;
    $b = 4;
    echo $x <=> $y;//1 si x>y, -1 si x<y, 0 si x=y;
    echo "\n";
    for($i=1;$i<=8;$i++){
        echo "$i - Je suis fort \n";
    }
    $e=4294-0310-3699-5890-1666;
    $day = array("lundi","mardi","mercredi","jeudi","vendredi","samedi","dimanche");
    for($i=0;$i<count($day);$i++){
        echo "à l'index $i du tableau on a $day[$i]\n";
    }
    echo "\n\n";
    echo "avec foreach ca donne : \n";
    foreach ($day as $key => $value) {
        echo "à l'index $key du tableau on a $value\n";
    }
    echo "\n\n";
    $nombre=[2,4,7,3,9,1,2,4,5,5,3,0,1,2,9,1,8,7,7,6,8];
    foreach ($nombre as $key => $value) {
        echo "[$key] == $value\n";
    }
    echo "Le plus grand c'est ".max($nombre)."\n";
    echo "Le plus petit c'est ".min($nombre)."\n";
    echo "\n\n";
    $c=count($nombre);
    $k=0;
    $is=0;
    while ($is<$c){
        if ($nombre[$is]<=$nombre[$is+1]) {
            $k = $nombre[$is];
            $nombre[$is] = $k;
            # code...
        } else {
            # code...
            $k = $nombre[$is+1];
            $nombre[$is] = $k;
        }
        echo $nombre[$is]." - ";
        $is++;
    }
    ?>
</body>
</html>