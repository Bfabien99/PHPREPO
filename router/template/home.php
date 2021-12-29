<h1> Ma homepage</h1>

<a href="<?= $router->generate('contact')?>">Nous contacter</a>
<a href="<?= $router->generate('article',['id' => 11, 'slug' => 'Que-du-texte'])?>">Voir article</a>