<?php
//	spaceTravel.php


abstract class spaceTravel 
{
	protected $duration;
	protected $seating;
	protected $tripTravel;
	protected static $weekstay;

	abstract public function durationStay($timeStay);
	abstract public function roundTrip();

	/**
	*
	*
	*/

	public function seatingClass($seats) 
	{
		$this->seating = $seats;
		return $this->seating;
	}
}





