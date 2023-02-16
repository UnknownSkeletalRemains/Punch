<?php
namespace app;

use php\gui\UXApplication; 
use app\boards\mainViewBoard;

class app
{
    public function launch() {
        UXApplication::runLater(function () { $mainViev = new mainViewBoard(); });
    }
}