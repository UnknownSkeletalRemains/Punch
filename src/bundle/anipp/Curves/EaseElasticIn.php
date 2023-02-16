<?php
namespace bundle\anipp\Curves;

class EaseElasticIn extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		$x = static::norm($x);
		return $x===0 ? 0 : $x===1 ? 1 : -pow(2,10*$x-10)*sin((2*pi())/3*($x*10-10.75));
	}
}