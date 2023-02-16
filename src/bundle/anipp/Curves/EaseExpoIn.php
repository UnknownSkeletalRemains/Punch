<?php
namespace bundle\anipp\Curves;

class EaseExpoIn extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		$x = static::norm($x);
		return $x===0 ? 0 : pow(2,10*$x-10);
	}
}