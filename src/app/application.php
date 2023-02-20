<?php
namespace app;

use php\gui\UXApplication; 
use app\core\logger;
use app\boards\mainViewBoard;

class application
{
    public $logger, $mainViev;
    public function launch() {
        UXApplication::runLater(function () {
            $this->logger = new logger();
            logger::log('App started');
            $this->mainViev = new mainViewBoard();
        });
    }
}

//this app is cursed and shitcoded 🤭