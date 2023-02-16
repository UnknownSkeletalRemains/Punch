<?php
namespace bundle\anipp\Curves;

class EaseBackIn extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		$x = static::norm($x);
		$c1 = 1.70158;
		return ($c1 + 1)*$x*$x*$x-$c1*$x*$x;
	}
}