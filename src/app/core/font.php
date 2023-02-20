<?php
namespace app\core;

use php\io\File;
use php\gui\text\UXFont;
use app\core\logger;
class font
{   

    public function font() { //$fontRes = "res://app/resources/fonts/Inter-Black.ttf", $defSize = 14
        logger::log(get_class().' Created');
        $dir = new File("res://app/resources/fonts");
        $files = $dir->findFiles();
        foreach ($files as $file) {
            $fonts = $file->getPath();
            var_dump($fonts);
        }
        logger::log(get_class().' Created');
        //return UXFont::load($fontRes, $defSize);
    }
}
