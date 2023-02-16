<?php
namespace bundle\anipp\Curves;

class EaseExpoOut extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		$x = static::norm($x);
		return $x===1 ? 1 : 1-pow(2,-10*$x);
	}
}