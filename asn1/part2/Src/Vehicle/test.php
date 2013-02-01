<?php

	define('SELF_DEBUG', true);
	require_once ('../../bootstrap.php');


	error_reporting( E_ALL | E_STRICT);
	ini_set('display_errors', 'On');
	ini_set('display_errors', 'On');
	ini_set('display_startup_errors', 'On'); 

	function println()
	{
		(SELF_DEBUG) ? print("<br />") : "";
	}

	require_once('Car.php');
	require_once('Truck.php');
	require_once('Civic.php');

	$truck = new Vehicle\Truck(2, 1950, "red", "manual", 4);
	$car = new Vehicle\Car(2, 2010, "silver", "automatic");
	$car2 = new Vehicle\Car(4, 2010, "silver", "automatic");
	$civic = new Vehicle\Civic(2, 1999, "gold", "manual");

	echo "Car Honk: " . $car->honk();
	echo "Car2 Honk: " . $car2->honk();
	echo "Civic Honk: " . $civic->honk();
	var_dump($car);
	var_dump($car2);
	var_dump($civic);
	var_dump($truck);

	
?>
