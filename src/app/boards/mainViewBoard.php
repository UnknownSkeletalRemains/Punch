<?php
namespace app\boards;


use php\gui\{UXForm, shape\UXRectangle, layout\UXFragmentPane, layout\UXFlowPane};
use behaviour\custom\DraggingFormBehaviour;
use php\gui\paint\UXColor;
use php\gui\paint\UXLinearGradient;

use app\boards\contentScene;

class mainViewBoard
{
    public $view, $viewSize = [256, 512], $boardRect, $fragment;
    public function __construct() {
        //Инициализация окна
        $this->view = new UXForm();
        $this->view->title = "Punch";
        $this->view->size = $this->viewSize;
        $this->view->layout->backgroundColor = "TRANSPARENT";
        $this->view->transparent = true;
        $this->view->style = "TRANSPARENT";
        $this->view->show();

        $this->boardRect = new UXRectangle();
        $this->boardRect->size = $this->viewSize;
        $this->boardRect->arcHeight = 64;
        $this->boardRect->arcWidth = 64;
        $this->boardRect->smooth = true;
        $this->boardRect->strokeType = "INSIDE";
        $this->boardRect->strokeWidth = 2;
        $this->boardRect->fill = UXLinearGradient::of("linear-gradient(#000000, #0d0d0d)");
        $this->boardRect->stroke = UXColor::of("#ffffff0e");
        $this->view->add($this->boardRect);

        $this->fragment = new UXFragmentPane();
        $this->fragment->size = $this->viewSize;
        $this->view->add($this->fragment);
        
        $form = new contentScene();
        $this->fragment->applyFragment($form->view);
        
        $this->topIndicator();
    }
    function topIndicator(){
        $flowPane = new UXFlowPane();
        $flowPane->size = [256, 32];
        $flowPane->alignment = "CENTER";
        $this->view->add($flowPane);
        
        $draggingForm = new DraggingFormBehaviour();
        $draggingForm->apply($flowPane);        

        $rectIndicator = new UXRectangle();
        $rectIndicator->size = [64, 4];
        $rectIndicator->arcWidth = 4;
        $rectIndicator->arcHeight = 4;
        $rectIndicator->strokeWidth = 0;
        $rectIndicator->fill = UXColor::of("#ffffff80");
        $flowPane->add($rectIndicator);

    }
}

