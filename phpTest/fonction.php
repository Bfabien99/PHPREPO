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
    // $insultes = ['merde', 'con','merdes', 'cons', 'imbecile','salaud','connard','putain','pute','roubignole','pute', 'imbeciles','salauds','connards','putains','putes','roubignoles','putes'];

    // while (true) {
    //     $phrase = strtolower((string)readline("Entrez votre phrase \n"));
    //     if ($phrase === "" )
    //     {
    //         exit("Fin du programme \n");
    //     }
    //     else
    //     {
    //         foreach ($insultes as $key => $insulte) {
    //             // $taille = strlen($insulte)-1;
    //             // $repeat = str_repeat('*', $taille);
    //             // $firstletter = substr($insulte,0,1);
    //             // $phrase = str_replace($insulte, $firstletter.$repeat, $phrase);
    //             if (strpos($phrase, $insulte) !== false) {
    //                 $phrase = "[message supprimé - contient un mot grossier]";
    //             }
                
    //         }
    //         echo $phrase."\n";
    //     }

    // }
    function dump($variable){
        echo "<pre>";
        var_dump($variable);
        echo "</pre>";
    }
    
    function creneaux_html(array $creneaux){
        if (count($creneaux) === 0)
        {
            return 'Fermé';
        }
        $phrase =[];
        foreach($creneaux as $creneau)
        {
            $phrase[] = "de <strong>{$creneau[0]} h</strong> à <strong>{$creneau[1]} h</strong> ";
        }
        return "Ouvert ".implode(' et ', $phrase);
    }

    function in_creneaux(int $heure, array $creneaux): bool 
    {
        foreach ($creneaux as $creneau) 
        {
            $debut = $creneau[0];
            $fin = $creneau[1];
            if ($heure >= $debut && $heure < $fin) 
            {
                return true;
            }
        }
        return false;
    }

    function select(string $name , $value, array $options):string{
        $html_options = [];
        foreach ($options as $k => $option) {
            $attributes = $k == $value ? 'selected' : '';
            $html_options[] = "<option value='$k' $attributes> $option </option>";  
        }
        return "<select name='$name' class='form-control'  >".implode($html_options)."</select>";
    }
?>