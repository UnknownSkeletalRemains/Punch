<?php
namespace bundle\anipp\Curves;

class EaseCurveIn extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		return pow(static::norm($x),2);
	}
}