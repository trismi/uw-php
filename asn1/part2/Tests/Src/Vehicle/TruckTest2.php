<?php

	namespace Tests\Vehicle;
	use \Vehicle\Car as Car;

	/**
	*  Unit test code to test Car class
	*
	**/	
	class testCar extends \PHPUnit_Framework_TestCase
	{
		public function testHonk()
		{
			$car = new Car(2, 1984, "red", "manual");
			$this->assertEmpty($car->honk());
			return $car;
		}
	}
?>
