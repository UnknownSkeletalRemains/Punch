<?php
namespace bundle\anipp\Curves;

class EaseQuart extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		$x = static::norm($x);
		return $x<0.5 ? 8*$x*$x*$x*$x : 1-pow(-2*$x+2,4)/2;
	}
}