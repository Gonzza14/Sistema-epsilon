<?php

use Phalcon\Mvc\Controller;
use Phalcon\Html\TagFactory;

class IndexController extends Controller
{
    public function indexAction()
    {
        $this->view->usuarios = Usuarios::find();
    }
}