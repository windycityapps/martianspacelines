<?php
//	marsTicket.php

class marsTicket extends spaceTravel 
{
	const BASETIME = 1446159600;
	const DISMILEDAY = 432000;
	const BASEDISTANCE = 205590648;					 
	const SECDAY = 86400;
	const ORIONSPEED = 20000;
	const TRAVELDAYORION = 480000;
	public  $strdays;
	public static $curDayUnixTime;
	public static $daysToMarsOrbit;



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
		$this->strdays = strtotime(date('d F Y'));

		return $this->weekstay;
	}

 /**
   * Set $curDayUnixTime to current unix timestamp of current day
   * @param int $curDayUnixTime how many miles Mars traveled since base time
   * @param int $milesday  distance Mars traveled from Earth since base distance
   * @param int $curMarsDistEarth mars current distance from earth
   * @param int $dist how fast Mars and Orion spacecraft are approaching each other
   * @param int $daysToMarsOrbit Days until Mars orbit from earth
   * return how many days to get to Mars at the current date
   * 
   *
   */

	public  function marsEarthDistance() 
	{
		self::$curDayUnixTime = strtotime(date('d F Y'));
		$milesday =  (self::$curDayUnixTime - self::BASETIME) / self::SECDAY * self::DISMILEDAY;  
		$curMarsDistEarth = self::BASEDISTANCE - $milesday;
		$dist = self::DISMILEDAY + self::TRAVELDAYORION;
		self::$daysToMarsOrbit = $curMarsDistEarth / $dist;

		return (int) self::$daysToMarsOrbit;
	}

 /**
   *
   * Calculates the return trip from Mars orbit
   *
   */

	public function returnTrip() 
	{
		return (int) self::$daysToMarsOrbit * .41 + $this->weekstay;
	}


 /**
   *
   * Calculates the total round trip including time spent on Mars
   *
   */

	public function roundTrip() 
	{
		return $this->marsEarthDistance() + $this->returnTrip() + $this->weekstay;

	}

}
