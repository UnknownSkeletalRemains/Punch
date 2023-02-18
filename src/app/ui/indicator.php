<?php
namespace app\ui;

use php\gui\{shape\UXRectangle, layout\UXFlowPane, paint\UXColor};
use behaviour\custom\DraggingFormBehaviour;

class indicator
{
    public $indicator;
    function __construct(){
            $this->indicator = new UXFlowPane();
            $this->indicator->size = [256, 32];
            $this->indicator->alignment = "CENTER";
            $draggingForm = new DraggingFormBehaviour();
            $draggingForm->apply($this->indicator);
            $indicatorShape = new UXRectangle();
            $indicatorShape->size = [64, 4];
            $indicatorShape->arcWidth = 4;
            $indicatorShape->arcHeight = 4;
            $indicatorShape->strokeWidth = 0;
            $indicatorShape->fill = UXColor::of("#ffffff80");
            $this->indicator->add($indicatorShape);
        }
}