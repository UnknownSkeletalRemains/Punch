<?php
namespace bundle\anipp\Curves;

class EaseCubic extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		$x = static::norm($x);
		return $x<0.5 ? 4*$x*$x*$x : 1-pow(-2*$x+2,3)/2;
	}
}