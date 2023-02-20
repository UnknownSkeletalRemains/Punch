<?php
namespace app\core;

use php\{io\Stream, lib\fs, time\Time};

class logger
{   
    public static $session;
    function __construct()
    {
        self::$session = Time::now()->toString('yyyyMMddHHmmss');
    }
    public static function log($text = 'NO INFO WAS PUT')
    {
        if (fs::exists("./logs")){
            Stream::putContents("logs/".self::$session.".log", Time::now()->toString('yyyy-MM-dd HH:mm:ss').": ".$text."\r\n", "a+");
        }else{ 
            fs::makeDir(fs::abs('./logs'));
            Stream::putContents("logs/".self::$session.".log", Time::now()->toString('yyyy-MM-dd HH:mm:ss').": ".$text."\r\n", "a+");
        }  
    }
}