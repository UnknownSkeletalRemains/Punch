<?php
namespace bundle\anipp\Curves;

class SqrtCurveOut extends Curve
{
    /**
     * @return float
     */
    public static function get(float $x){
        return 1-sqrt(static::norm(1-$x));
    }
}