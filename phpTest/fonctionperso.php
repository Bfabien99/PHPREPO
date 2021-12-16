<?php
    // function bonjour($nom = null)
    // {
    //     if ($nom === null)
    //     {
    //         return "Bonjour \n";
    //     }
    //     return "Bonjour " . $nom . "\n";
        
    // }

    // $salut = bonjour();
    // echo $salut;
    // function oui_non()
    // {
    //     $bool = false;

    //     while (true)
    //     {
    //         $saisie = (string)readline("Voulez vous continuer : (o)ui ou (n)on ? \n");

    //         if ($saisie === "o")
    //         {
    //             $bool = true;
    //             exit("Oui ! ".$bool."\n");
    //         }

    //         if ($saisie === "n")
    //         {
    //             $bool = false;
    //             exit("Non... ".$bool."\n");
    //         }

    //     }
    // }

    // oui_non();

    function demander_crenau(string $phrase = "Veuillez entrer un creneau"){
        $creneaux = [];

    while(true)
    {   
        echo $phrase . "\n";
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
    }

    $crenaux = demander_crenau("Entrez un créneau");
?>

