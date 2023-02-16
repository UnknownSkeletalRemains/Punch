<?php
namespace bundle\anipp\Curves;

class EaseCircOut extends Curve
{
	/**
     * @return float
     */
	public static function get(float $x){
		return sqrt(1-pow(static::norm($x)-1,2));
	}
}