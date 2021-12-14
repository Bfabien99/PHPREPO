<?php 
require_once '../vendor/autoload.php';


$faker = Faker\Factory::create();
$i = 0;
$persons = [];

while($i<= 100) {

	$person = new \StdClass();
	$person->name = $faker->name;
	$person->prenom = $faker->lastName;
	$person->age = $faker->numberBetween($min=1,$max=99);
	$person->status = $faker->randomElement(["AFFECTE","NON-AFFECTE"]);
	$persons[] = $person;
	$i++;
}
var_dump($persons);
?>
