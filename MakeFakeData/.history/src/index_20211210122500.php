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
	$person["bonus"] = $faker->numberBetween($min=1,$max=5);
	$person["statut"] = $faker->randomElement(["AFFECTE","NON-AFFECTE"]);
	$list[] = $person;
	$i++;
}
dump($list);

function admis($moy){
	return $moy>=5 ? "oui" : "non";
}

function paire ($moy){
	return 
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

        tr.red{
            background-color:red;
        }
        tr.green{
            background-color: green;
        }
        tr.yellow{
            background-color:yellow;
        }
		.oui{
			display:inline;
		}
		.non{
			display:none;
		}
    </style>
</head>
<body>

<h3>Exercice: Afficher liste</h3>
<table>
	<thead>
		<tr>
			<th>Nom</th>
			<th>Prenom</th>
			<th>Age</th>
			<th>Statut</th>
			<th>Moyenne</th>
			<th>Bonus</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach ($list as $value) { 
				$nbnote = count($value["notes"]);
				$totalnote = array_sum($value["notes"]) + $value["bonus"];
				$moy = $totalnote / $nbnote;
				$moyG = $nbnote/2 ;
				$age = $value["age"];
				switch ($age) {
					case $age > 0 && $age < 18 :
			?>
			<tr class="red">
				<td><?= $value["nom"] ?></td>
                <td><?=$value["prenom"]?></td>
                <td><?= $value["age"] ?></td>
                <td><?= $value["statut"] ?></td>
				<td><?= $moy ?> <span class="<?= admis($moy) ?>" > OK </span> </td>
            </tr>
			<?php break;
				case ($age > 18 && $age < 25): 
			?>
			<tr class="green">
				<td><?= $value["nom"] ?></td>
                <td><?=$value["prenom"]?></td>
                <td><?= $value["age"] ?></td>
                <td><?= $value["statut"] ?></td>
				<td><?= $moy ?> <span class="<?= admis($moy) ?>" > OK </span> </td>
            </tr>
			<?php break;
				case ($age > 25): 
			?>
			<tr class="yellow">
				<td><?= $value["nom"] ?></td>
                <td><?=$value["prenom"]?></td>
                <td><?= $value["age"] ?></td>
                <td><?= $value["statut"] ?></td>
				<td><?= $moy ?> <span class="<?= admis($moy) ?>" > OK </span> </td>
            </tr>
			<?php
			break;}
			?>
		<?php } ?>
	</tbody>


    <?php
        // 
    ?>
</table>
</body>
</html>