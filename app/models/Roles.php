<?php

use Phalcon\Mvc\Model;


class Roles extends Model
{
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
    public $NOMBREROL;

}