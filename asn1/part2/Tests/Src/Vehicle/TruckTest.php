<?php

	namespace Tests\Vehicle;
	use \Vehicle\Truck as Truck;
	//require ('../../bootstrap.php');

	/*****
	*  Unit test code to test Truck class
	*
	*****/	
	class testTruck extends \PHPUnit_Framework_TestCase
	{
		public function testHonk()
		{
			$this->assertEmpty(Truck::honk());
		}
	}
	$test = new testTruck();
	$test->testHonk();
?>
