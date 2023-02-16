<?php
namespace bundle\anipp\Curves;

class SqrtCurve extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		$x = static::norm($x);
		return $x>0.5 ? 1-static::get(1-$x) : SqrtCurveIn::get($x*2)/2;
	}
}