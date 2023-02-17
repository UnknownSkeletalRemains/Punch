<?php
namespace app\boards;

use php\gui\{UXForm, shape\UXRectangle, layout\UXFragmentPane};

use app\boards\contentScene;

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

        $this->boardRect = new UXRectangle();
        $this->boardRect->size = $this->mainView->size;
        $this->boardRect->arcHeight = 64;
        $this->boardRect->arcWidth = 64;
        $this->boardRect->strokeType = 'INSIDE';
        $this->boardRect->strokeWidth = 2;
        $this->boardRect->style = '-fx-fill: linear-gradient(to top, #0d0d0d, black); -fx-stroke: #ffffff0e';
        $this->mainView->add($this->boardRect);

        $this->fragment = new UXFragmentPane();
        $this->fragment->size = $this->mainViewSize;
        $this->mainView->add($this->fragment);

        $form = new contentScene();
        $form->showInFragment($this->fragment);
    }
}