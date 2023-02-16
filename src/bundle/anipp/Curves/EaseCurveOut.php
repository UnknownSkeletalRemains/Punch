<?php
namespace bundle\anipp\Curves;

class EaseCurveOut extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		return 1-EaseCurveIn::get(1-$x);
	}
}