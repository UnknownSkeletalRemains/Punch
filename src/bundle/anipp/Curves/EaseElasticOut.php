<?php
namespace bundle\anipp\Curves;

class EaseElasticOut extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		$x = static::norm($x);
		return $x===0 ? 0 : $x===1 ? 1 : pow(2,-10*$x)*sin(($x*10-0.75)*((2*pi())/3))+1;
	}
}