<?php

use Phalcon\Mvc\Model;
use Phalcon\Filter\Validation;
use Phalcon\Filter\Validation\Validator\Email as EmailValidator;


class Usuarios extends Model
{

    public $IDUSUARIO;

    public $IDROL;

    public $USERNAME;

    public $NOMBREUSUARIO;

    public $APELLIDOUSUARIO;

    public $CORREOUSUARIO;

    public $FECHANACIMIENTO;

    public $CONTRAUSUARIO;

    public $TELEFONO;

    public $ACTIVO;

    public $PRIMERSIGNIN;

    public $CREADO;

    public $ACTUALIZADO;

    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'CORREOUSUARIO',
            new EmailValidator(
                [
                    'model'   => $this,
                    'message' => 'Por favor introduzca un email correcto',
                ]
            )
        );

        return $this->validate($validator);
    }
}
