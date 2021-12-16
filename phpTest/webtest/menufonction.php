<?php
if(!function_exists('nav_link')){
    function nav_link(string $lien, string $titre): string
    {
    $classe = 'nav-link';
    if ($_SERVER['SCRIPT_NAME'] === $lien)
    {
        $classe .= ' active';
    }
    return '<li class="nav-item"><a class="'.$classe.'" href="'.$lien.'">'.$titre.'</a></li>';
    }
}
?>