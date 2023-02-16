<?php
namespace bundle\anipp\Curves;

class EaseQuint extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		$x = static::norm($x);
		return $x<0.5 ? 16*$x*$x*$x*$x*$x : 1-pow(-2*$x+2,5)/2;
	}
}