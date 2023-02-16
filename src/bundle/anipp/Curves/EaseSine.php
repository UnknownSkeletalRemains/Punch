<?php
namespace bundle\anipp\Curves;

class EaseSine extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		return -(cos(pi()*static::norm($x))-1)/2;
	}
}