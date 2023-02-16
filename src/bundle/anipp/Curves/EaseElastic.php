<?php
namespace bundle\anipp\Curves;

class EaseElastic extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		$x = static::norm($x);
		$c5 = (2*pi())/4.5;
		return $x===0 ? 0 : $x===1 ? 1 : $x<0.5 ? -(pow(2,20*$x-10)*sin((20*$x-11.125)*$c5))/2 : (pow(2,-20*$x+10)*sin((20*$x-11.125)*$c5))/2+1;
	}
}