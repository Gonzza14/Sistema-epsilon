<?php

use Phalcon\Mvc\Controller;

class AsociadoController extends Controller
{
    public function indexAction()
    {
    	$data_genero = Genero::find();
    	$this->view->data_genero=$data_genero;
    }

}