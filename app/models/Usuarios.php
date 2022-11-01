<?php

use Phalcon\Mvc\Model;
use Phalcon\Filter\Validation;
use Phalcon\Filter\Validation\Validator\Email as EmailValidator;


class Usuarios extends Model
{
    /**
     *
     * @var integer
     * @Primary
     * @Identity
     * @Column(type="bigInt", length=20, nullable=false)
     */
    public $IDUSUARIO;

    /**
     *
     * @var integer
     * @Column(type="bigInt", length=20,nullable=true)
     */
    public $IDROL;

    /**
     *
     * @var string
     * @Column(type="string", length=50, nullable=false)
     */
    public $NOMBREUSUARIO;

    /**
     *
     * @var string
     * @Column(type="string", length=100,nullable=false)
     */
    public $CORREOUSUARIO;

    /**
     *
     * @var string
     * @Column(type="string", length=255, nullable=false)
     */
    public $CONTRAUSUARIO;

    /**
     *
     * @var boolean
     * @Column(type="boolean", length=1, nullable=false)
     */
    public $ACTIVO;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
    public $CREADO;

    /**
     *
     * @var string
     * @Column(type="string", length=20, nullable=false)
     */
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
