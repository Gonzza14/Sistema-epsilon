<?php

use Phalcon\Mvc\Model;

class Usuarios extends Model
{
    public $id;
    public $nombre;
    public $correo;
    public $clave;
    public $id_rol;
}