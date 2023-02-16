<?php
namespace bundle\anipp\Curves;

class SqrtCurveIn extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		return sqrt(static::norm($x));
	}
}