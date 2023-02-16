<?php
namespace bundle\anipp\Curves;

class EaseSineIn extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		return 1-cos(static::norm($x)*pi()/2);
	}
}