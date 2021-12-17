<?php
  $title="Contact";
    require 'header.php';
    require_once '../config.php';
    require_once '../fonction.php';
   
    $heure = (int)($_GET['heure'] ?? date('G'));
    $jour = (int)($_GET['jour'] ?? (date('N') - 1));
    $creneaux = CRENEAUX[$jour];
 
    $ouvert = in_creneaux($heure,$creneaux);
    $color = 'green';
    if (!$ouvert) {
      $color = 'red';
    }
?>
<div class="row">
  <div class="col-md-8">
    <h2>Nous contacter</h2>
    <p>Ready to beyond the starter template? Check out these open source projects that you can quickly duplicate to a new GitHub repository.</p>
  </div>

  <div class="col-md-4">
    <h2>Horaires d'ouverture</h2>

    <?php if($ouvert): ?>
      <div class="alert alert-success">
        Le Magasin sera Ouvert
      </div>
    <?php else: ?>
      <div class="alert alert-danger">
        Le Magasin sera Fermé
      </div>
    <?php endif; ?>

    <form action="" method="GET">
      <div class="form-group">
        <?= select('jour', $jour, JOURS);?>
      </div>

      <div class="form-group">
        <input type="number" name="heure" class="form-control" placeholder="Entrer une heure" value="<?= $heure;?>">
      </div>

      <button class="btn btn-primary" type="submit">Voir si le magasin est ouvert</button>
    </form>
    <ul>
      <?php foreach(JOURS as $k => $jour): ?>
        <li>
          <strong><?= $jour." : ";?></strong>
          <?= creneaux_html(CRENEAUX[$k]); ?>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</div>
<?php
    require 'footer.php';
?>