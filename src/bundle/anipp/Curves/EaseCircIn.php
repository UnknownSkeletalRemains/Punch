<?php
namespace bundle\anipp\Curves;

class EaseCircIn extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		return 1-sqrt(1-pow(static::norm($x),2));
	}
}