<?php
/*<?php?>*/

function ajouter_vue():void{
    $fichier = dirname(__DIR__).DIRECTORY_SEPARATOR.'compteur';
    $fichier_journalier = $fichier. '-' . date('Y').'-'. date('m').'-'. date('d');
    incrementer_compteur($fichier);
    incrementer_compteur($fichier_journalier);
}

    function incrementer_compteur(string $fichier):void
    {
    $compteur = 1;
    if (file_exists($fichier))
    {
        $compteur = (int)file_get_contents($fichier);
        $compteur++;
    }
        file_put_contents($fichier, $compteur);
    }
    
function nombre_vues ():string{
    $fichier = dirname(__DIR__).DIRECTORY_SEPARATOR.'compteur';
    return file_get_contents($fichier);
}

function nombre_vues_mois(int $annee, int $mois):int{
    $mois = str_pad($mois,2, '0', STR_PAD_LEFT);
    $fichier = dirname(__DIR__).DIRECTORY_SEPARATOR.'compteur-'.$annee.'-'.$mois;
    $fichiers = glob($fichier);
    $total = 0;
    foreach ($fichiers as $fichier) {
        $total += (int)file_get_contents($fichier);
    }
var_dump($total);
    return $total;
}

function nombre_vues_detail_mois(int $annee, int $mois):array{
    $mois = str_pad($mois,2, '0', STR_PAD_LEFT);
    $fichier = dirname(__DIR__).DIRECTORY_SEPARATOR.'compteur-'.$annee.'-'.$mois;
    $fichiers = glob($fichier);
    $vues = [];
    foreach ($fichiers as $fichier) {
        $parts = explode('-',basename($fichier));
        $vues = [
            'annee' => $parts[1],
            'mois' => $parts[2],
            'jour' => $parts[3],
            'visites' => file_get_contents($fichier)
        ];
    }
    return $vues;
}
?>