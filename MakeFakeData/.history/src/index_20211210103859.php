<?php 
require_once '../vendor/autoload.php';


$faker = Faker\Factory::create();
$i = 0;
$list = [];

while($i<= 100) {

	$person = new \StdClass();
	$person->name = $faker->name;
	$person->prenom = $faker->lastName;
	$person->age = $faker->numberBetween($min=1,$max=99);
	$person->status = $faker->randomElement(["AFFECTE","NON-AFFECTE"]);
	$persons[] = $person;
	$i++;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        thead{
            font-weight:bold;
        }

        td{
            padding:5px 10px;
            text-align:center;
        }

        td.red{
            background-color:red;
        }
        td.green{
            background-color: green;
        }
        td.yellow{
            background-color:yellow;
        }
    </style>
</head>
<body>
    <?php
        echo "<h3>Exercice: Afficher liste</h3>";
        $id;
        // $i=0;
        echo"<table><thead><tr><td>Nom</td><td>Prenom</td><td>Age</td><td>Statut</td></tr></thead>";
        echo"<tbody>";
        foreach ($list as $key=>$value) {
            // if($value["statut"]!="NON-AFFECTE"){
            // echo"<tr>";
            // echo "<td>".$value["nom"]."</td>";
            // echo "<td>".$value["prenom"]."</td>";
            // echo "<td>".$value["age"]."</td>";
            // echo "<td>".$value["statut"]."</td>";
            // echo"</tr>";
            // }
            switch ($value["age"]) {
                case $value["age"]<18:
                    echo '<tr><td class="red">'.$value["nom"].'</td>
                    <td class="red">'.$value["prenom"].'</td>
                    <td class="red">'.$value["age"].'</td>
                    <td class="red">'.$value["statut"].'</td>
                    </tr>';

                case $value["age"]>18 && $value["age"]<25:
                    echo '<tr><td class="green">'.$value["nom"].'</td>
                    <td class="green">'.$value["prenom"].'</td>
                    <td class="green">'.$value["age"].'</td>
                    <td class="green">'.$value["statut"].'</td>
                    </tr>';
                    
                case $value["age"] > 25:
                    echo '<tr><td class="yellow">'.$value["nom"].'</td>
                    <td class="yellow">'.$value["prenom"].'</td>
                    <td class="yellow">'.$value["age"].'</td>
                    <td class="yellow">'.$value["statut"].'</td>
                    </tr>';
                    # code...
                    break;
                
                default:
                    # code...
                    break;
            }
            # code...
        }
        
            
        echo"</tbody></table>";
    ?>
</body>
</html>