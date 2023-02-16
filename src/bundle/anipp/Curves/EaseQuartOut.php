<?php
namespace bundle\anipp\Curves;

class EaseQuartOut extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		return 1-pow(1-static::norm($x),4);
	}
}