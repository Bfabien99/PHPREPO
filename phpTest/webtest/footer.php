</main>
  
<div class="row">
  <div class="col-md-4">
  <?php
  require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'webtest'.DIRECTORY_SEPARATOR.'fonction'.DIRECTORY_SEPARATOR.'compteur.php';
  ajouter_vue();
  $vues = nombre_vues();
  ?>
  Il y a <?= $vues?> visite<?php if ($vues > 1):?>s<?php endif ?> sur le site.
  </div>
  <div class="col-md-4">
    <h5>Navigation</h5>
    <ul class="list-unstyled">
        <?php
          $class = '';
          require 'menu.php';
        ?>
    </ul>
  </div>
</div>


<script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>
