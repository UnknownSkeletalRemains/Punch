<?php
namespace app\boards;

use php\gui\{UXForm, shape\UXRectangle, layout\UXFlowPane};

class mainViewBoard
{
    public $mainView, $mainViewSize = [256, 512], $boardRect, $fragment;
    public function __construct() {
        //Инициализация окна
        $this->mainView = new UXForm();
        $this->mainView->title = "Punch";
        $this->mainView->size = $this->mainViewSize;
        $this->mainView->layout->backgroundColor = "TRANSPARENT";
        $this->mainView->transparent = true;
        $this->mainView->style = "TRANSPARENT";
        $this->mainView->show();

        $flowPane = new UXFlowPane();
        $flowPane->size = [256, 32];

        $flowPane->position = [0, 0];

        // Добавляем объект на форму
        $this->add($flowPane);
        
        $this->boardRect = new UXRectangle();
        $this->boardRect->size = $this->mainView->size;
        $this->boardRect->arcHeight = 64;
        $this->boardRect->arcWidth = 64;
        $this->boardRect->strokeType = 'INSIDE';
        $this->boardRect->strokeWidth = 2;
        //$this->boardRect->style = '-fx-fill: linear-gradient(to top, #0d0d0d, black); -fx-stroke: #ffffff0e';
        $this->mainView->add($this->boardRect);
    }
}