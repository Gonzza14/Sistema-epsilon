<?php

namespace security;

use Phalcon\Mvc\Model;


class Acl extends Model
{
    public $IDROL;
    public $accion;
    public $componente;
}