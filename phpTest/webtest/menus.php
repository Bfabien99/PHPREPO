<?php
require_once '../fonction.php';
$title = "Notre menu";
$lignes = file('menus.tsv');//Avec .tsv
/*
//Avec .csv
foreach ($lignes as $key => $ligne) {
  $lignes[$key]= str8getcsv(trim($ligne, " \t\n\r\0\x0B,"));
}
*/
foreach ($lignes as $key => $ligne) {
  $lignes[$key]= explode("\t",trim($ligne));
}

require 'header.php';
?>

<h1>Menus</h1>

<?php foreach($lignes as $ligne):?>
    <?php if(count($ligne) === 1):?>
        <br>
        <h2 style="border-bottom: 1px solid black;"><?=$ligne[0];?></h2>
        <br>
        <br>
    <?php else:?>
        <div class="row">
            <div class="col-sm-8">
                <h4><?=$ligne[0];?></h4>
            <p><?=$ligne[1];?></p>
            </div>
            <div class="col-sm-4">
                <strong><?=number_format($ligne[2],2,","," ");?></strong>
            </div>
        </div>
    <?php endif ?>
<?php endforeach?>
<?php
require 'footer.php'
?>