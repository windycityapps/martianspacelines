<?php
//	marsTicket.php

class marsTicket extends spaceTravel 
{
	
     /**
     * const BASETIME unix time of October 30, 2015 
     */
	const BASETIME = 1446159600;

	/**
     * const for how mant miles planet Mars travels towards or away from Earth
     */
	const DISMILEDAY = 432000;

	/**
     * const distance planet Mars is from Earth on October 30, 2015 
     */
	const BASEDISTANCE = 205590648;	

	/**
     * const how many seconds in a day 
     */				 
	const SECDAY = 86400;

	/**
     * const speed Orion spacecraft will travel towards Mars 
     */
	const ORIONSPEED = 20000;

	/**
     * const miles Orion spacecraft will travel in a day
     */
	const TRAVELDAYORION = 480000;

	/**
	 * @var $strdays current day expressed in unix format
     *  
     */
	private  $strdays;

	/**
	 * @var $curDayUnixTime how many miles Mars traveled since base time
     *  
     */
	private static $curDayUnixTime;

	/**
	 * @var $daysToMarsOrbit days until Mars orbit from earth
     *  
     */
	private static $daysToMarsOrbit;



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
