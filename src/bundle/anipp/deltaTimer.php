<?php
namespace bundle\anipp;

use std;

class deltaTimer 
{
	/**
	 * @var float
	 * Speed of time.
	 * --RU--
	 * Скорость времени.
	 */
	public $timeScale = 1;

	private $last;

	public function __construct(int $start = null, float $timeScale = 1){
		if($start==null)
			$this->last = Time::millis();
		else
			$this->last = $start;
		$this->timeScale = $timeScale;
	}

	/**
	 * @return float
	 * Get time delta.
	 * --RU--
	 * Получить дельту времени.
	 */
	public function getDelta(){
		$l = Time::millis();
		$d = $l-$this->last;
		$this->last = $l;
		return $d*$this->timeScale;
	}
}