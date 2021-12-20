<?php 
$title = "Dashboard";
require 'fonction'.DIRECTORY_SEPARATOR.'compteur.php';
$annee = (int)date('Y');
$annee_current = empty($_GET['annee']) ? null : (int)$_GET['annee'];
$mois_current = empty($_GET['mois']) ? null : $_GET['mois'];
if ($annee_current && $mois_current) {
    $total = nombre_vues_mois($annee_current, $mois_current);
    $detail = nombre_vues_detail_mois($annee_current, $mois_current);
}else {
    $total = nombre_vues();
}

var_dump($detail);

$mois = [
    '01' => 'Janvier',
    '02' => 'Fevrier',
    '03' => 'Mars',
    '04' => 'Avril',
    '05' => 'Mai',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Août',
    '09' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Decembre'
];
require 'header.php'?>

    <div class="row">
        <div class="col-md-4">
            <div class="list-group">
            <?php for ($i=0; $i < 5; $i++): ?> 
                <a class="list-group-item <?= $annee - $i === $annee_current ? 'active':''; ?>" href="dashboard.php?annee=<?= $annee - $i?>">
                    <?= $annee - $i?>
                </a>
                <?php if($annee - $i === $annee_current): ?>
                    <div class="list-group">
                        <?php foreach($mois as $numero => $nom): ?>
                            <a class="list-group-item <?= $numero === $mois_current ? 'active':''; ?>" href="dashboard.php?annee=<?= $annee_current?>&mois=<?= $numero?>"><?= $nom?></a>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
            <?php endfor ?> 
            </div>
        </div>

        <div class="col-md-8">
        <div class="card">
        <div class="card-body">
            <strong style="font-size:3em;"><?= $total ?></strong><br>
            Visite<?php if ($total > 1):?>s<?php endif ?> totale<?php if ($total > 1):?>s<?php endif ?>
        </div>
    </div>
        </div>
    </div>

<?php require 'footer.php'?>