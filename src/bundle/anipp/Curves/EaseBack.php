<?php
namespace bundle\anipp\Curves;

class EaseBack extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		$x = static::norm($x);
		$c1 = 1.70158;
		$c2 = $c1*1.525;
		return $x<0.5 ? (pow(2*$x,2)*(($c2+1)*2*$x-$c2))/2 : (pow(2*$x-2,2)*(($c2+1)*($x*2-2)+$c2)+2)/2;
	}
}