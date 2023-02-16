<?php
namespace bundle\anipp\Curves;

class EaseSineOut extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		return sin((static::norm($x)*pi())/2);
	}
}