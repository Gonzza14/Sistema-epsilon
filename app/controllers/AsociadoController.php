<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Router;


class AsociadoController extends Controller
{
    public function indexAction()
    {
        $data_genero = Genero::find();
    	$this->view->data_genero=$data_genero;
        $data_pais = Pais::find();
    	$this->view->data_pais=$data_pais;
        $data_region = Region::find();
    	$this->view->data_region=$data_region;

    }



}