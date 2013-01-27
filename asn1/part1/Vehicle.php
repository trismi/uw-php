<?php
	//includes this since every vehicle extends this class
	require_once('VehicleInterface.php');
	
	/**
	 * Abstract class to represent vehicle
	 */
	abstract class Vehicle
	{
		/**
		 * Number of doors
		 * @var int
		 */
		protected $_numberOfDoors;

		/**
		 * Year car was made
		 * @var int
		 */
		protected $_carMakeYear;
	
		/**
		 * Vehicle color
		 * @var string
		 */
		protected $_color;
	
		/**
		 * Vehicle transmission may be automatic or manual
		 * @var string
		 */
		protected $_transmissionType;
	
		/****
		 * Returns number of doors
		 * @var int
		 */
	
		public function getNumberOfDoors()
		{
			return $this->_numberOfDoors;	
		}	
		/***
		 * Gets car year
		 * @var int
		 *
		 ***/
		public function getYear()
		{
			return $this->_carMakeYear;	
		}
	
		/***
		 * Sets car year
		 * @var int
		 *
		 ***/
	
		public function setYear($year)
		{
			$this->_carMakeYear = $year;
		}
	
		/***
		 * Returns car color
		 * @var string
		 *
		 ***/
		public function getColor()
		{
			return $this->_color;	
		}
	
		/***
		 * Sets car color
		 * @var string
		 *
		 ***/
	
		public function setColor($color)
		{
			$this->_color = $color;
		}
	
		/***
		 * Returns car color
		 * @var string
		 *
		 ***/
		public function getTransmission()
		{
			return $this->_transmissionType;	
		}
	
		/***
		 * Sets transmission type
		 * @var string
		 *
		 ***/
	
		public function setTransmission($type)
		{
			$this->_transmissionType = $type;
		}

	}
?>
