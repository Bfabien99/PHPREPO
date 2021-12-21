<?php
require_once 'class/OpenWeather.php';

$weather = new OpenWeather('37a799a044532e17cef1676627229b6a');
$meteo= $weather->getForecast('Abidjan');
$tabs= [
    "peu nuageux" => "<img src='pen.png' border='0' width='20px' height='20px'>",
    "partiellement nuageux" => "<img src='pan.png' border='0' width='20px' height='20px'>",
    "couvert" => "<img src='c.png' border='0' width='20px' height='20px'>",
    "nuageux" => "<img src='n.png' border='0' width='20px' height='20px'>",
    "ciel dégagé" => "<img src='cd.png' border='0' width='20px' height='20px'>",
    "légère pluie" => "<img src='lp.png' border='0' width='20px' height='20px'>" 
]
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <ul>
            <?php for ($i=0; $i <count($meteo) ; $i+=8):?>
                <li><?= $meteo[$i]['date'] ?> :
                <?= $tabs[$meteo[$i]['description']]?>
                <?= round($meteo[$i]['temperature'])?></li>
            <?php endfor?>
        </ul>
    </div>
</body>
</html>
