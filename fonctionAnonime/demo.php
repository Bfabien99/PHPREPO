<?php

class Demo{
    private $eleves = [
        [
            'nom' => 'Anne',
            'age' =>  18,
            'moyenne' =>  13
        ],
        [
            'nom' => 'Marc',
            'age' =>  21,
            'moyenne' =>  18
        ],
        [
            'nom' => 'Jean',
            'age' =>  20,
            'moyenne' =>  11
        ],
        [
            'nom' => 'Chris',
            'age' =>  18,
            'moyenne' =>  13
        ],
        [
            'nom' => 'Aurel',
            'age' =>  17,
            'moyenne' =>  11
        ],
        [
            'nom' => 'Albert',
            'age' =>  20,
            'moyenne' =>  9
        ],
    ];

    private function filterFonction($eleve)
    {
        return $eleve['moyenne'] > 12;
    }

    public function bonEleves()
    {
        return array_filter($this->eleves, [$this, 'filterFonction']);
    }
};


$demo = new Demo();
echo "<pre>";
print_r($demo->bonEleves());
echo "</pre>";
die('Finished !');

function sortByKey(array $array, string $key)
{
    usort($array, function ($a, $b) use ($key) 
    {
        return $a[$key] - $b[$key];
    });
    return $array;
};


/*$eleveMoyenne ='' ;

$eleveSorted = sortByKey($eleves,'age');

echo "<pre>";
echo "<h4>Liste eleves</h4>";
print_r($eleves);
echo "<br>";
echo "<h4>Liste eleves Triés par age</h4>";
print_r($eleveSorted);
echo "<br>";
echo "<h4>Liste eleves ayant une moyenne sup à 12</h4>";
print_r($eleveMoyenne);
echo "</pre>";*/
?>