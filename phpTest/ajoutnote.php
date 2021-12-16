<?php
    $notes =[];
    $section=null;

    while (true) {
        $section = readline('Entrer une nouvelle note (ou "fin" pour terminer) :');

        if ($section === "fin"){
            break;
        }else{
            $notes[] = (int)$section;
        }
    }

    foreach ($notes as $note){
        echo "- $note \n";
    }
?>