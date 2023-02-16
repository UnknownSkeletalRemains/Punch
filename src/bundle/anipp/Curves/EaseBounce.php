<?php
namespace bundle\anipp\Curves;

class EaseBounce extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		return $x<0.5 ? (1-EaseBounceOut::get(1-2*$x))/2 : (1+EaseBounceOut::get(2*$x-1))/2;
	}
}