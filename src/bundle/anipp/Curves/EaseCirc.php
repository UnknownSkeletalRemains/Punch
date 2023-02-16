<?php
namespace bundle\anipp\Curves;

class EaseCirc extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		$x = static::norm($x);
		return $x<0.5 ? (1-sqrt(1-pow(2*$x,2)))/2 : (sqrt(1-pow(-2*$x+2,2))+1)/2;
	}
}