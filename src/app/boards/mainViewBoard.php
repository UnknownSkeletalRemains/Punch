<?php
namespace app\boards;

use php\gui\{UXForm, layout\UXFragmentPane};
use app\ui\{viewBackground, indicator};
use app\boards\{contentScene};

class mainViewBoard
{
    public $view, $viewSize = [256, 512], $boardRect, $fragment;
    public function __construct() {
        $this->view = new UXForm();
        $this->view->title = "Punch";
        $this->view->size = $this->viewSize;
        $this->view->layout->backgroundColor = "TRANSPARENT";
        $this->view->transparent = true;
        $this->view->style = "TRANSPARENT";
        $this->view->show();

        $viewBackground = new viewBackground($this->viewSize);
        $this->view->add($viewBackground->viewBackground);
        
        $this->fragment = new UXFragmentPane();
        $this->fragment->size = $this->viewSize;
        $this->view->add($this->fragment);

        $indicator = new indicator();
        $this->view->add($indicator->indicator);
        
        $contentScene = new contentScene();
        $this->fragment->applyFragment($contentScene->view);
        
       
    }
}

