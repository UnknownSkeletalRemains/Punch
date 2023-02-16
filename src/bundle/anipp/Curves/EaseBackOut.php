<?php
namespace bundle\anipp\Curves;

class EaseBackOut extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		$x = static::norm($x);
		$c1 = 1.70158;
		return 1+($c1+1)*pow($x-1,3)+$c1*pow($x-1,2);
	}
}