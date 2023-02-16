<?php
namespace bundle\anipp\Curves;

class Curve 
{
	/**
	 * @return float
	 */
	public static function norm(float $x){
		return (floor($x/2)==floor(($x+1)/2) or floor($x)!=$x) ? $x-floor($x) : 1;
	}

	/**
	 * @return float
	 */
	public static function get(float $x){
		return static::norm($x);
	}
}