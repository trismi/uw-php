<?php

	namespace Tests\Vehicle;
	use \Vehicle\Truck as Truck;

	/**
	*  Unit test code to test Truck class
	*
	**/	
	class testTruck extends \PHPUnit_Framework_TestCase
	{
		public function testHonk()
		{
			$truck = new Truck(2, 1984, "red", "manual", 4);
			$this->assertEmpty($truck->honk());
			return $truck;
		}

		/**
		* @depends testHonk 
		**/
		public function testGetBedLength(Truck $truck)
		{
			//$truck = new Truck(2, 1984, "red", "manual", 4);
			$this->assertEquals($truck->getBedLength(), 4);
			return $truck;
		}

		/**
		 *  @depends testGetBedLength
		 **/
		public function testSetBedLength($truck)
		{
			$truck->setBedLength(6);
			$this->assertEquals($truck->getBedLength(), 6);
			return $truck;
		}		
		
		/**
		 *  @depends testSetBedLength
		 **/
		public function testBedLengthNotEmpty($truck)
		{
			$this->assertNotEmpty($truck->getBedLength());
			return $truck;
		}		
	

	}
?>
