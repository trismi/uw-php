<?php

require_once('Vehicle.php');

class Car extends Vehicle implements VehicleInterface
{
	/***
	 * Creates a Car
	 * @var int int string
	 *
	 */
	public function __construct($doors, $year, $color, $transmission)
	{
		$this->setYear($year);
		$this->_numberOfDoors = $doors;
		$this->setColor($color);
		$this->setTransmission($transmission);
	}
	
	/****
	 * Honk function represents honk
	 *
	 * @return string
	 *
	 ***/
	public function honk()
	{
		return '';
	}

}
?>
