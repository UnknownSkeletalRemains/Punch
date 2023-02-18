<?php
namespace app;

use php\gui\UXApplication; 
use app\boards\mainViewBoard;

class app
{
    public $mainViev;
    public function launch() {
        UXApplication::runLater(function () { 
            $this->mainViev = new mainViewBoard(); 
        });
    }
}

//this app is cursed and shitcoded 🤭