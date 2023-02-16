<?php
namespace bundle\anipp\Curves;

class EaseBounceIn extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		return 1-EaseBounceOut::get(1-static::norm($x));
	}
}