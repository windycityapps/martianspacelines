<?php
//	spaceTravel.php


abstract class spaceTravel 
{
	protected $duration;
	protected $seating;
	protected $tripTravel;
	protected $country;
	protected static $weekstay;


	abstract public function durationStay($timeStay);
	abstract public function roundTrip();

	/**
	* declares what travel class chosen by user form
	*
	* @param $seats
	*
	* returns string
	*/

	public function seatingClass($seats) 
	{
		$this->seating = $seats;
		return $this->seating;
	}

	/**
	* declares what country chosen by user form
	*
	* @param $countrySet
	*
	* returns string
	*/

	public function earthCountry($countrySet) 
	{
		$this->country = $countrySet;
		return $this->country;
	}
}



