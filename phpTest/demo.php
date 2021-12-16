<?php
// $chiffre = null;
// for ($i=1; $i <= 10; $i++) { 
//     echo "- $i \n";
// $ python -m youtube_dl https://www.youtube.com/playlist?list=PLjwdMgw5TTLVDv-ceONHM_C19dPW1MAMD --playlist-start 36}
$articles=["Tomate","Aubergine","Carote"];
$prix = [15,10,25];
$commande=[];
$achats=[];
echo "Bienvenue au marché gouro.\n";
echo "Voici la liste des articles que nous vendons :\n";
foreach ($articles as $key => $article) {
    echo ($key+1)." - $article = "."$prix[$key]"."$ \n";
}

$choix=null;
$choixArticle=null;

while ($choix!="o" && $choix!="n") {
    $choix = (string)readline("Voulez vous passez commande : (o)ui ou (n)on \n");
}

if ($choix=="n")
{
    echo "Ok! On espère vous voir prendre un article la prochaine fois...";
}

else if ($choix=="o")
{   
    echo "Quelle article voulez vous :\n";
    foreach ($articles as $key => $article)
    {
        echo "(".($key+1).")"." - $article \n";
    }
    
    while ($choix=="o") {
        $choixArticle = (int)readline("Entrez le numéro correspondant à l'article \n");
        $choixArticle-=1;
        $commande[]=$articles[$choixArticle];
        $achats[]=$prix[$choixArticle];
        $choix = (string)readline("Continuer les achats : (o)ui ou (n)on \n");
    }
    
    echo "Voici votre commande \n";
    foreach ($commande as $key => $choisis)
    {
        echo "(".($key+1).")"." - $choisis -- ".$achats[$key]."$ \n";
    }
    echo "Merci pour vos achats :"."$ \n";
}

?>