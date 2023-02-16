<?php
namespace bundle\anipp\Curves;

class EaseCubicIn extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		return pow(static::norm($x),3);
	}
}