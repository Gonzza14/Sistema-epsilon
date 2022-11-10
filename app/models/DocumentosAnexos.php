<?php

use Phalcon\Mvc\Model;

class DocumentosAnexos extends Model
{
    public $idDocAnexo;
    public $idAsociado;
    public $nombre;
    public $descripcion;
    public $ruta;
}