<?php
//	moonTravel.php

class moonTicket extends spaceTravel 
{

/**
  * const MOONTRAVEL days to escape Earths orbit     get to Moon surface
  */
    const MOONTRAVEL = 1;

 /**
   * converts weeks into days and sets $strdays to current unix time
   *
   * @param array $timeStay Number of weeks chosen
   *
   * returns number of days
   */

	public function durationStay($timeStay) 
	{
	$this->duration = $timeStay;
	$this->weekstay = $this->duration * 7;
	return $this->weekstay;
	}

  /**
   * calculates total days go to the moon, stay on the moon, and return to earth
   *
   * returns total days
   */

	public function roundTrip() 
	{
   $roundTrip = self::MOONTRAVEL * 2 + $this->weekstay;
	return $roundTrip;
	}



}
