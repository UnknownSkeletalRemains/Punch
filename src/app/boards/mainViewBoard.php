<?php
namespace app\boards;

use php\gui\{ UXForm, UXButton }; 

class mainViewBoard
{
    public function __construct() {
        $form = new UXForm();
        $form->title = "Punch";
        $form->size = [256, 512];
        $form->show();
        $b = new UXButton('hello world');
        $b->size = [128, 128];
        $b->text = 'oh hell no...';
        $form->add($b);
    }
}