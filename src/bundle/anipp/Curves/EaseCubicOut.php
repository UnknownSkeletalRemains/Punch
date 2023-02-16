<?php
namespace bundle\anipp\Curves;

class EaseCubicOut extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		return 1-pow(1-static::norm($x),3);
	}
}