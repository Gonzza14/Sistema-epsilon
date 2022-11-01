<?php

use Phalcon\Di\Injectable;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Events\Event;
use Phalcon\Acl\Enum;
use Phalcon\Acl\Adapter\Memory;
use Phalcon\Acl\Role;
use Phalcon\Acl\Component;

class Permission extends Injectable
{
    protected $_publicResources = [
        'index' => '*',
        'signin' => '*'
    ];
    protected $_asociadoResources = [
        'dashboard' => ['*'],
    ];
    protected $_adminResources = [
        'admin' => ['*']
    ];

    protected function _getAcl()
    {
        if (!isset($this->persistent->acl)) {

            $acl = new Memory();
            $acl->setDefaultAction(Enum::DENY);

            $roles = [
                'Admin' => new Role('Admin'),
                'Ejecutivo' => new Role('Ejecutivo'),
                'Jefe de operaciones' => new Role('Jefe de operaciones'),
                'Asociado' => new Role('Asociado'),
                'Cajero'  => new Role('Cajero'),
                'Invitado'  => new Role('Invitado')
            ];

            foreach ($roles as $role) {
                $acl->addRole($role);
            }

            //Public Resources
            foreach ($this->_publicResources as $resource => $action) {
                $acl->addComponent(new Component($resource), $action);
            }

            //User Resources
            foreach ($this->_asociadoResources as $resource => $action) {
                $acl->addComponent(new Component($resource), $action);
            }

            //Admin Resources
            foreach ($this->_adminResources as $resource => $action) {
                $acl->addComponent(new Component($resource), $action);
            }

            foreach($roles as $role){
                foreach($this->_publicResources as $resource => $actions){
                    $acl->allow($role->getName(), $resource, '*');
                }
            }

            foreach ($this->_asociadoResources as $resource => $actions) {
                foreach($actions as $action){
                    $acl->allow('Asociado', $resource, $action);
                    $acl->allow('Admin', $resource, $action);
                }
            }

            foreach ($this->_adminResources as $resource => $actions) {
                foreach($actions as $action){
                    $acl->allow('Admin', $resource, $action);
                }
            }

            $this->persistent->acl = $acl;
        }
        return $this->persistent->acl;
    }

    public function beforeExecuteRoute(Event $event, Dispatcher $dispatcher)
    {
        $role = $this->session->get('role');
        if(!$role){
            $role = 'Invitado';
        }
        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();

        $acl = $this->_getAcl();


        $allowed = $acl->isAllowed('?', $controller, $action);
        if ($allowed != Enum::ALLOW){
            
            $dispatcher->forward([
                'controller' => 'index',
                'action' => 'index'
            ]);

            return false;
        }
    }
}
