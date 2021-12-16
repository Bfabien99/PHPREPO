<?php
    $creneaux = [];

    while(true)
    {
        $debut = (int)readline("Heure d'ouverture : ");
        $fin = (int)readline("Heure de fermeture : ");

        if ($debut >= $fin)
        {
            echo "Le créneaux ne peux pas être enregistré car l'heure de début ($debut) est supérieure à l'heure de fin ($fin)";
            echo "\n";
        }
        elseif ($debut>24 || $fin>24 ) {
            echo "Le créneaux ne peux pas être enregistré. \n L'heure doit être inférieur ou égale à 24";
            echo "\n";
        }
        else
        {   
            $creneaux[] = [$debut , $fin];
            $action = readline("Voulez-vous enregistrer un nouveau créneau ? (n)on : ");
            if ($action === "n")
            {
                break;
            }
        }
    }

    echo "Le magasin est ouvert de : ";
    foreach ($creneaux as $key => $creneau) {
        if ($key > 0) {
            echo " \\ de : ";
        }
        echo $creneau[0] . "h à " . $creneau[1] . "h ";
    }

    /*
    $heure = (int)readline("A qu'elle heure voulez vous visiter le magasin ?");
    $trouve = false;

    foreach ($creneaux as $creneau)
    {
        if($heure >= $creneau[0] && $heure <= $creneau[1])
        {
            $trouve = true;
            break;
        }
    }

    if($trouve)
    {
        echo "Le magasin sera ouvert";
    }
    else
    {
        echo "Désolé le magasin est fermé";
    }
    */
?>