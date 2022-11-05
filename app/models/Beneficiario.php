<?php

use Phalcon\Mvc\Model;

class Beneficiario extends Model
{
    public $idBeneficiario;
    public $idAsociado;
    public $idParentesco;
    public $nombreBenef;
    public $telefonoBenef;
    public $correoBenef;
    public $direccionBenef;
    public $fechaNac;
    public $porcentaje;
}