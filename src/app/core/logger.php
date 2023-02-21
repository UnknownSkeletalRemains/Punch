<?php
namespace app\core;

use php\{io\Stream, lib\fs, lang\System, time\Time};

class logger
{   
    public static $session;
    function __construct()
    {
        self::$session = Time::now()->toString('yyyyMMddHHmmss');
        $osName = System::getProperty('os.name');
        $osVersion = System::getProperty('os.version');
        $userName = System::getProperty('user.name');
        $javaVersion = System::getProperty('java.version');
        self::log("Operating system: ".$osName." | Version:".$osVersion." | User name: ".$userName." | Java version: ".$javaVersion);
    }
    public static function log($text = 'Missing argument in ::log()')
    {
        if (fs::exists("./logs")){
            Stream::putContents("logs/".self::$session.".log", Time::now()->toString('yyyy-MM-dd HH:mm:ss').": ".$text."\r\n", "a+");
        }else{ 
            fs::makeDir(fs::abs('./logs'));
            Stream::putContents("logs/".self::$session.".log", Time::now()->toString('yyyy-MM-dd HH:mm:ss').": ".$text."\r\n", "a+");
        }  
    }
}