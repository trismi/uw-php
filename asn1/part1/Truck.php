<?php

require_once('Vehicle.php');

/*****
 * Represents a Truck, which extends the Vehicle class and implements the VehicleInterface
 *
 **/

class Truck extends Vehicle implements VehicleInterface 
{
	/***
	 * Length of truck bed
	 * @var int 
	 *
	 */
	private $_bedLength;

	/***
	 * Creates a Truck
	 * @var int int string
	 *
	 */
	public function __construct($doors, $year, $color, $trans, $bed)
	{
		$this->setYear($year);
		$this->_numberOfDoors = $doors;
		$this->setColor($color);
		$this->setTransmission($trans);
		$this->setBedLength($bed);
	}

	/****
	 * Returns bed length
	 * @var int
	 */

	public function getBedLength()
	{
		return $this->_bedLength;	
	}
	
	/****
	 * Sets bed length
	 * @var int
	 */

	public function setBedLength($length)
	{
		$this->_bedLength = $length;	
	}
	
	/***
	 * Returns honk action
	 * @return string
	 ***/
	
	public function honk()
	{
		return '';
	}

}
?>
