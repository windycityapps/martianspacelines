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


	/**
	*
	*
	*/

/*
|--------------------------------------------------------------------------
| Application Error Handler
|--------------------------------------------------------------------------
|
| Here you may handle any errors that occur in your application, including
| logging them or displaying custom views for specific errors. You may
| even register several error handlers to handle different types of
| exceptions. If nothing is returned, the default error view is
| shown, which includes a detailed stack trace during debug.
|
*/



 /**
   * Make a new API Exception with the given result.
   *
   * @param array $result The result from the API server
   */
/*  public function __construct($result) {
    $this->result = $result;
    $code = 0;
    if (isset($result['error_code']) && is_int($result['error_code'])) {
      $code = $result['error_code'];
    }


*/









