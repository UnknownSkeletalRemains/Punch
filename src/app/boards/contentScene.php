<?php
namespace app\boards;

use php\gui\{UXForm, UXLabel, text\UXFont};
use php\gui\layout\UXFlowPane;
use php\gui\paint\{UXColor, UXLinearGradient};

class contentScene
{
    public $view;
    public function __construct($viewSize) {
        $this->view = new UXForm();
        $this->view->size = $viewSize;
        $this->view->layout->backgroundColor = "TRANSPARENT";
        $this->view->transparent = true;
        $this->view->style = "TRANSPARENT";
        
        $flowPane = new UXFlowPane();
        $flowPane->size = $viewSize;
        $flowPane->alignment = "TOP_CENTER";
        $flowPane->rowValignment = "CENTER";
        $flowPane->columnHalignment = "CENTER";
        $this->view->add($flowPane);
        
        $label = new UXLabel();
        $label->size = [104, 64];
        $label->textAlignment = "CENTER";
        $label->alignment = "BOTTOM_CENTER";
        $label->size = [128, 64];
        $label->font = UXFont::load("res://app/resources/fonts/Inter-Black.ttf", 20);
        $label->textColor = UXColor::of("#ffffff");
        $label->text = "Punch";
        $flowPane->add($label);
    }
}