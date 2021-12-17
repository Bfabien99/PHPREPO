<?php
$fichier = __DIR__ . DIRECTORY_SEPARATOR . 'Book1.csv';
    //file_put_contents($fichier, " Bien j'espère");
// $size = @file_put_contents($fichier, " Bien j'espère");//on cache les erreurs
// if ($size === false) {
//     echo "Impossible d'écrire dans le fichier \n";
// }
// else {
//     echo "Ecriture réussie \n";
// }

$ressource = fopen($fichier, 'r+');
$i=0;
while ($line = fgets($ressource)) {
    $k++;
    if ($k == 1) {
        fwrite($ressource, "BENIN,MONROVIA");
        break;
    }
    # code...
}

fclose($ressource);
?>