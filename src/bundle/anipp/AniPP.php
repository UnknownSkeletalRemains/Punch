<?php
namespace bundle\anipp;

use gui, Exception, bundle\anipp\Curves\Curve;

class AniPP 
{
	/**
	 * @return Curve
	 * Get a curve object by class, if not an object.
	 * --RU--
	 * Получить объект кривой по классу, если это не объект.
	 */
	public static function getCurve($curve){
		if(!is_object($curve)){
			$c = "bundle\\anipp\\Curves\\".$curve;
			if(get_class_methods($c)==null)
				if(get_class_methods($curve)==null)
					throw new Exception("This class does not exist \"".$curve."\"");
				else
					$curve = new $curve;
			else
				$curve = new $c;
		}
		return $curve;
	}

	/**
	 * @return UXAnimationTimer
	 * Custom animation.
	 * --RU--
	 * Пользовательская анимация.
	 */
	public static function customAnimation(int $duration, callable $onStep = null, callable $onEnd = null, $curve = null, $timer = null){
		if($timer==null) $timer = new deltaTimer;
		if($curve==null) $curve = new Curve;
		$curve = static::getCurve($curve);
		$s = 1/$duration;
		$t = 0;
		$ti = new UXAnimationTimer(function () use ($duration, $timer, $s, &$t, $onStep, $onEnd, $curve) {
			$old = $t;
			$t += $timer->getDelta();
			$ov = $old*$s;
			$lt = $t;
			if($t>$duration) $t = $duration;
			$cv = $curve->get($t*$s);
			$dv = $cv-$curve->get($ov);
			if($onStep) $onStep($dv,$cv);
			if($t>=$duration){
				if($onEnd) $onEnd($lt-$old);
				return true;
			}
			return false;
		});
		$ti->start();
		return $ti;
	}

	/**
	 * @return UXAnimationTimer
	 * Smooth change of values.
	 * --RU--
	 * Плавное изменение значений.
	 */
	public static function smoothlySetValues($object, int $duration, array $vars, callable $onEnd = null, $curve = null, $timer = null){
		$s = [];
		foreach ($vars as $key => $value)
			$s[$key] = $value-$object->$key;
		static::customAnimation($duration,function ($dv,$cv) use ($s,$object){
			foreach ($s as $key => $value)
				$object->$key += $dv*$value;
		},$onEnd,$curve,$timer);
	}

	/**
	 * @return UXAnimationTimer
	 * Smooth addition of values.
	 * --RU--
	 * Плавное добавление значений.
	 */
	public static function smoothlyAddValues($object, int $duration, array $vars, callable $onEnd = null, $curve = null, $timer = null){
		foreach ($vars as $key => &$value)
			$value += $object->$key;
		return static::smoothlySetValues($object,$duration,$vars,$onEnd,$curve,$timer);
	}

	/**
	 * @return UXAnimationTimer
	 * Smooth value change.
	 * --RU--
	 * Плавное изменение значения.
	 */
	public static function smoothlySetValue($object, int $duration, string $varName, $value, callable $onEnd = null, $curve = null, $timer = null){
		return static::smoothlySetValues($object,$duration,[$varName=>$value],$onEnd,$curve,$timer);
	}

	/**
	 * @return UXAnimationTimer
	 * Smooth addition of value.
	 * --RU--
	 * Плавное добавление значения.
	 */
	public static function smoothlyAddValue($object, int $duration, string $varName, $value, callable $onEnd = null, $curve = null, $timer = null){
		return static::smoothlySetValue($object,$duration,$varName,$object->$varName+$value,$onEnd,$curve,$timer);
	}

	/**
	 * @return UXAnimationTimer
	 * Smooth transparency change.
	 * --RU--
	 * Плавное изменение прозрачности.
	 */
	public static function fadeTo($object, int $duration, float $value, callable $onEnd = null, $curve = null, $timer = null){
		return static::smoothlySetValue($object,$duration,"opacity",$value,$onEnd,$curve,$timer);
	}

	/**
	 * @return UXAnimationTimer
	 * Smoothly adding transparency.
	 * --RU--
	 * Плавное добавление прозрачности.
	 */
	public static function fade($object, int $duration, float $value, callable $onEnd = null, $curve = null, $timer = null){
		return static::fadeTo($object,$duration,$object->opacity+$value,$onEnd,$curve,$timer);
	}

	/**
	 * @return UXAnimationTimer
	 * Fading out of the object.
	 * --RU--
	 * Плавное исчезание объекта.
	 */
	public static function fadeOut($object, int $duration, callable $onEnd = null, $curve = null, $timer = null){
		return static::fadeTo($object,$duration,0,$onEnd,$curve,$timer);
	}

	/**
	 * @return UXAnimationTimer
	 * The smooth appearance of the object.
	 * --RU--
	 * Плавное появление объекта.
	 */
	public static function fadeIn($object, int $duration, callable $onEnd = null, $curve = null, $timer = null){
		return static::fadeTo($object,$duration,1,$onEnd,$curve,$timer);
	}

	/**
	 * @return UXAnimationTimer
	 * Smooth resizing.
	 * --RU--
	 * Плавное изменение размеров.
	 */
	public static function scaleTo($object, int $duration, int $x, int $y, callable $onEnd = null, $curve = null, $timer = null){
		return static::smoothlySetValues($object,$duration,["scaleX"=>$x,"scaleY"=>$y],$onEnd,$curve,$timer);
	}

	/**
	 * @return UXAnimationTimer
	 * Smooth addition of sizes.
	 * --RU--
	 * Плавное добавления размеров.
	 */
	public static function scale($object, int $duration, int $x, int $y, callable $onEnd = null, $curve = null, $timer = null){
		return static::scaleTo($object,$duration,$object->x+$x,$object->y+$y,$onEnd,$curve,$timer);
	}

	/**
	 * @return UXAnimationTimer
	 * Smooth movement to the point.
	 * --RU--
	 * Плавное движение к точки.
	 */
	public static function moveTo($object, int $duration, int $x, int $y, callable $onEnd = null, $curve = null, $timer = null){
		return static::smoothlySetValues($object,$duration,["x"=>$x,"y"=>$y],$onEnd,$curve,$timer);
	}

	/**
	 * @return UXAnimationTimer
	 * Smooth addition of object coordinates.
	 * --RU--
	 * Плавное добавление координат объекта.
	 */
	public static function displace($object, int $duration, int $x, int $y, callable $onEnd = null, $curve = null, $timer = null){
		return static::moveTo($object,$duration,$object->x+$x,$object->y+$y,$onEnd,$curve,$timer);
	}
}