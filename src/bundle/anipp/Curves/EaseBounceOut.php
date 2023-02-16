<?php
namespace bundle\anipp\Curves;

class EaseBounceOut extends Curve
{
	/**
	 * @return float
	 */
	public static function get(float $x){
		$x = static::norm($x);
		$n1 = 7.5625;
		$d1 = 2.75;
		return $x<1/$d1 ? $n1*$x*$x : $x<2/$d1 ? $n1*($x-=1.5/$d1)*$x+0.75 : $x<2.5/$d1 ? $n1*($x-=2.25/$d1)*$x+0.9375 : $n1*($x-=2.625/$d1)*$x+0.984375;
	}
}