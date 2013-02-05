<?php

namespace Tests\Vehicle;
use \Vehicle\Car as Car;

/**
* Unit test code to test Car class
**/

class testCar extends \PHPUnit_Framework_TestCase
{
	/**
	* Tests that a car is made and not null  
	**/	
	public function testCarCreation()
	{
		$car = new Car(2, 1938, "blue", "automatic");
		$this->assertNotEmpty($car);
		return $car;
	}

	/**
	* @depends testCarCreation
	**/
	public function testGetNumberOfDoors($car)
	{
		$this->assertEquals($car->getNumberOfDoors(), 2);
	}

	/**
	* @depends testCarCreation
	**/
	public function testGetYear($car)
	{
		$this->assertEquals($car->getYear(), 1938);
	}
	/**
	* @depends testCarCreation
	**/
	public function testSetYear($car)
	{
		$car->setYear(2000);
		$this->assertEquals($car->getYear(), 2000);
		$this->assertNotEquals($car->getYear(), 1938);
	}
	

	/**
	* @depends testCarCreation
	**/
	public function testGetColor($car)
	{
		$this->assertEquals($car->getColor(), "blue");
		$this->assertNotEquals($car->getColor(), "red");
		$this->assertNotEquals($car->getColor(), -2);
	}
	
	/**
	* @depends testCarCreation
	**/
	public function testSetColor($car)
	{
		$car->setColor("silver");
		$this->assertNotEquals($car->getColor(), "blue");
		$this->assertEquals($car->getColor(), "silver");
	}


	/**
	* @depends testCarCreation
	**/
	public function testGetTransmission($car)
	{
		$this->assertEquals($car->getTransmission(), "automatic");
		$this->assertNotEquals($car->getTransmission(), "manual");
	}

	/**
	* @depends testCarCreation
	**/
	public function testSetTransmission($car)
	{
		$car->setTransmission('manual');
		$this->assertNotEquals($car->getTransmission(), 'automatic');
		$this->assertEquals($car->getTransmission(), 'manual');
	}
	/**
	* @depends testCarCreation
	**/
	public function testHonk($car)
	{
		$this->assertEmpty($car->honk());
	}
	
	


}
?>
