<?php

namespace Tests\Vehicle;
use \Vehicle\Civic as Civic;

/**
* Unit test code to test Civic class
**/

class testCivic extends \PHPUnit_Framework_TestCase
{
	/**
	* Tests that a car is made and not null  
	**/	
	public function testCivicCreation()
	{
		$car = new Civic(2, 1938, "blue", "automatic");
		$this->assertNotEmpty($car);
		return $car;
	}
	/**
	* @depends testCivicCreation
	**/
	public function testhonk($car)
	{
		$this->assertNotEmpty($car->honk());
		$this->assertEquals($car->honk(), 'honk honk');
	}
	
	


}
?>
