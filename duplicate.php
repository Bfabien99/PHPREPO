<?php
$tableau = [3,2,1,6,9,2,1,9,3,4];
function d(array $tab)
{
    sort($tab);
    for ($i=0; $i < count($tab); $i++) 
    {   
        if ($tab[$i] == $tab[$i-1]) {
            array_splice($tab,$i,1);
        } 

        echo $tab[$i]." | ";
    }
}

d($tableau);
?>