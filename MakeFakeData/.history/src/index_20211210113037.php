<?php 
require_once '../vendor/autoload.php';


$faker = Faker\Factory::create();
$i = 0;
$list = [];

while($i <= 20) {

	$person = [];
	$person["nom"] = $faker->name;
	$person["prenom"] = $faker->lastName;
	$person["age"] = $faker->numberBetween($min=1,$max=99);
	$notes = [];
	$index = 0;
	$max = $faker->numberBetween($min=1,$max=10);
	while($index < $max) {
		$note = $faker->numberBetween($min=1,$max=10);
		$notes[] = $note;
		$index++;
	}
	$person["notes"] = $notes;
	$person["statut"] = $faker->randomElement(["AFFECTE","NON-AFFECTE"]);
	$list[] = $person;
	$i++;
}
dump($list);
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

        tr.red{
            background-color:red;
        }
        tr.green{
            background-color: green;
        }
        tr.yellow{
            background-color:yellow;
        }
    </style>
</head>
<body>
    <?php
        echo "<h3>Exercice: Afficher liste</h3>";
        $id;
        // $i=0;
        echo"<table><thead><tr><td>Nom</td><td>Prenom</td><td>Age</td><td>Statut</td><td>Moyenne</td></tr></thead>";
        echo"<tbody>";
		define("PI",3.14);
		echo __LINE__;
        foreach ($list as $value) {
            // if($value["statut"]!="NON-AFFECTE"){
            // echo"<tr>";
            // echo "<td>".$value["nom"]."</td>";
            // echo "<td>".$value["prenom"]."</td>";
            // echo "<td>".$value["age"]."</td>";
            // echo "<td>".$value["statut"]."</td>";
            // echo"</tr>";
            // }
			$nbnote = count($value["notes"]);
			$totalnote = array_sum($value["notes"]);
			$moy = $totalnote / $nbnote;
			$moyenne;
			$age = $value["age"];
            switch ($age) {
                case $age > 0 && $age < 18 :
                    echo '<tr class="red"><td>'.$value["nom"].'</td>
                    <td>'.$value["prenom"].'</td>
                    <td>'.$value["age"].'</td>
                    <td>'.$value["statut"].'</td>
					<td>'.$moy."<span <?php $moyenne> ($moy / 2)?> > OK </span>".'</td>
                    </tr>';
					break;
                case ($age > 18 && $age < 25):
                    echo '<tr class="green"><td>'.$value["nom"].'</td>
                    <td>'.$value["prenom"].'</td>
                    <td>'.$value["age"].'</td>
                    <td>'.$value["statut"].'</td>
					<td>'.$moy.'</td>
                    </tr>';
                    break;
                case $value["age"] > 25:
                    echo '<tr class="yellow"><td>'.$value["nom"].'</td>
                    <td>'.$value["prenom"].'</td>
                    <td>'.$value["age"].'</td>
                    <td>'.$value["statut"].'</td>
					<td>'.$moy.'</td>
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