<?php
namespace bundle\anipp\Curves;

class EaseCurve extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		$x = static::norm($x);
		return $x>0.5 ? 1-static::get(1-$x) : EaseCurveIn::get($x)*2;
	}
}