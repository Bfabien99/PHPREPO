<?php
    
    /*
    //Palindrome
    while(true){
        $mot = (string)readline("Entre un mot et je te dirais si c'est un palindrome \n");
        if ($mot === "" ) {
            exit("Fin du programme \n");
        }
        $mot = strtolower($mot);
        $palindrome = strrev($mot);
        if ($palindrome === $mot)
        {
            echo $palindrome." = ".$mot."\n";
            echo $mot." est un palindrome"."\n";
        } 
        else
        {
            echo $palindrome." est différent de ".$mot."\n";
            echo $mot." n'est pas un palindrome"."\n";
        }
    }
    */
    
    /*
    //notes
    $notes =[12, 17, 9];
    $moyenne = array_sum($notes)/count($notes);
    echo "Voici vos notes : \n";
    foreach ($notes as $key => $note) {
        echo ($key+1)." - ".$note."/20 \n";
    }
    echo "La moyenne est :".round($moyenne,2)."\n";
    */


    //Filtre à injure
    $insultes = ['merde', 'con','merdes', 'cons', 'imbecile','salaud','connard','putain','pute','roubignole','pute', 'imbeciles','salauds','connards','putains','putes','roubignoles','putes'];

    while (true) {
        $phrase = strtolower((string)readline("Entrez votre phrase \n"));
        if ($phrase === "" )
        {
            exit("Fin du programme \n");
        }
        else
        {
            foreach ($insultes as $key => $insulte) {
                // $taille = strlen($insulte)-1;
                // $repeat = str_repeat('*', $taille);
                // $firstletter = substr($insulte,0,1);
                // $phrase = str_replace($insulte, $firstletter.$repeat, $phrase);
                if (strpos($phrase, $insulte) !== false) {
                    $phrase = "[message supprimé - contient un mot grossier]";
                }
                
            }
            echo $phrase."\n";
        }

    }
    
?>