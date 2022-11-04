<?php

use Phalcon\Mvc\Model;

class Usuarios extends Model
{
    public $id;
    public $nossmbre;
    public $correo;
    public $clave;
    public $id_rol;
}