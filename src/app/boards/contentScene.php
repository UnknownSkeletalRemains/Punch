<?php
namespace app\boards;

use php\gui\{UXForm};

class contentScene
{
    public $view, $viewSize = [256, 512], $boardRect, $fragment;
    public function __construct() {
        $this->view = new UXForm();
        $this->view->title = "Punch";
        $this->view->size = $this->viewSize;
        $this->view->layout->backgroundColor = "TRANSPARENT";
        $this->view->transparent = true;
        $this->view->style = "TRANSPARENT";
    }
}