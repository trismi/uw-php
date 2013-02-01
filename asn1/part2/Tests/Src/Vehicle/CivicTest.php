<?php

require_once('Car.php');

/****
 * Civic class extends the car class, which implements the VehicleInterface
 *
 * Has a specialized honk function to differentiate from others cars
 *
 **/
 class Civic extends Car
{
	/****
	 * Honk function represents honk
	 *
	 * @return string
	 *
	 ***/
	public function honk()
	{
		return 'honk honk';
	}
}
?>
