<?php

use Phalcon\Mvc\Controller;

class ErrorsController extends Controller
{

    public function initialize() {
        
        $this->view->setTemplateAfter('index');
    }

    public function show404Action()
    {
    }

    public function show401Action()
    {
    }
}