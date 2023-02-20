<?php
namespace app\ui;

use php\gui\shape\UXRectangle;
use php\gui\paint\{UXColor, UXLinearGradient};
use app\core\logger;
class viewBackground
{
    public $viewBackground;
    public function __construct($size) {
        logger::log(get_class().' Created');
        $this->viewBackground = new UXRectangle();
        $this->viewBackground->size = $size;
        $this->viewBackground->arcHeight = 64;
        $this->viewBackground->arcWidth = 64;
        $this->viewBackground->smooth = true;
        $this->viewBackground->strokeType = "INSIDE";
        $this->viewBackground->strokeWidth = 2;
        $this->viewBackground->fill = UXLinearGradient::of("linear-gradient(#000000, #0d0d0d)");
        $this->viewBackground->stroke = UXColor::of("#ffffff0e");
    }
}
