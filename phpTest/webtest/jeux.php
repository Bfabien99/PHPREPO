<?php
    function checkbox(string $name, string $value, array $data):string
    {   
        $attributes = '';
        if (isset($data[$name]) && in_array($value, $data[$name])) {
            $attributes .= 'checked';
        }
        
        return <<<HTML
        <input type="checkbox" name="{$name}[]" value="$value" $attributes>
HTML;
    }

    function radio(string $name, string $value, array $data):string
    {   
        $attributes = '';
        if (isset($data[$name]) && $value === $data[$name]) {
            $attributes .= 'checked';
        }
        
        return <<<HTML
        <input type="radio" name="$name" value="$value" $attributes>
HTML;
    }
    //checkbox
    $parfums = [
        'Fraise' => 4,
        'Chocolat' => 15,
        'Vanille' => 9
    ];

    //radio
    $cornets=[
        'Pot' => 2,
        'Cornet' => 3
    ];

    //checkbox
    $supplements=[
        'Pépites de chocolat' => 3,
        'Chantille' =>5
    ];
    $title="Composer votre glace";
    require 'header.php';
    
?>



<div class="row">

    <form method="GET" class="col-md-8">
    <h2>Choisisser votre parfum</h2>
    <?php foreach($parfums as $parfum => $prix): ?>
        <div class="checkbox">
            <label for="<?=$parfum?>">
                <?= checkbox('parfum', $parfum, $_GET);?>
                <?=$parfum?> - <?=$prix?> $
            </label>
        </div>
    <?php endforeach;?>
    <!---->
    <br>
    <h2>Ajouter cornet</h2>
    <?php foreach($cornets as $cornet => $prix): ?>
        <div class="checkbox">
            <label for="<?=$cornet?>">
                <?= radio('cornet', $cornet, $_GET);?>
                <?=$cornet?> - <?=$prix?> $
            </label>
        </div>
    <?php endforeach;?>
    <!---->
    <br>
    <h2>Ajouter supplements</h2>
    <?php foreach($supplements as $supplement => $prix): ?>
        <div class="checkbox">
            <label for="<?=$cornet?>">
                <?= checkbox('supplement', $supplement, $_GET);?>
                <?=$supplement?> - <?=$prix?> $
            </label>
        </div>
    <?php endforeach;?>
    <!---->
    <button type="submit" class="btn btn-primary">Composer ma glace</button>
    <br>
    
    
</form>

    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Votre Glace</h5>
            </div>
        </div>
    </div>

</div>


<h2>$GET</h2>
<pre>
    <?php
        var_dump($_GET);
    ?>
</pre>

<h2>$_POST</h2>
<pre>
    <?php
        var_dump($_POST);
    ?>
</pre>
<?php
    require 'footer.php';
?>