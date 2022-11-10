<?php

use Phalcon\Di\Injectable;
use Phalcon\Acl\Enum;
use Phalcon\Acl\Role;
use Phalcon\Events\Event;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Acl\Adapter\Memory as AclList;
use security\Componentes;
use security\Accion;
use security\Roles;
use Phalcon\Acl\Component;

/**
 * SecurityPlugin
 *
 * This is the security plugin which controls that users only have access to the modules they're assigned to
 */
class SecurityPlugin extends Injectable
{

    /**
     * This action is executed before execute any action in the application
     *
     * @param Event $event
     * @param Dispatcher $dispatcher
     * @return bool
     */
    public function beforeDispatch(Event $event, Dispatcher $dispatcher)
    {
        // Check User AUTH Session
        $auth = $this->session->get('AUTH');
        if (!$auth){
            $role = 'Solicitante'; // By Default
        } else {
            $role = $auth['rol'];
        }

        $controller = strtolower($dispatcher->getControllerName()); // Controller Name
        $action = strtolower($dispatcher->getActionName()); // Controller Method Name

        $acl = $this->getAcl();

        if (!$acl->isComponent($controller)) {
            if ($dispatcher->getControllerName() != 'errors') {
                $dispatcher->forward([
                    'controller' => 'errors',
                    'action'     => 'show404'
                ]);
                return false;
            }
            return;
        }
        
        $allowed = $acl->isAllowed($role, $controller, $dispatcher->getActionName());
        if (!$allowed) {
            if ($dispatcher->getControllerName() != 'errors') {
                $dispatcher->forward(array(
                    'controller' => 'errors',
                    'action'     => 'show401'
                ));
                return false;
            }
            return;
        }
    }

    /**
     * Returns an existing or new access control list
     *
     * @returns AclList
     */
    public function getAcl()
    {
        if (!isset($this->persistent->acl))
        {
            $acl = new AclList();

            $acl->setDefaultAction(Enum::DENY);

            // Fetch Data in the Database
            $roles = Roles::find();
            $componentes = Componentes::find();
            $aclItems = security\Acl::find();
            
            // Fetch Register User Roles
            $rolesArreglo[] = null;
            foreach ($roles as $rol) {
                $acl->addRole($rol->IDROL);
            }

            
            foreach ($componentes as $componente) {
                $acciones = Accion::find();

                $accionesArreglo[] = null;
                foreach ($acciones as $accion) {
                    array_push($accionesArreglo, $accion->accion);
                }

                $acl->addComponent(new Component($componente->componente), $accionesArreglo);
            }

            foreach ($aclItems as $aclItem) {
                $acl->allow($aclItem->IDROL, $aclItem->componente, $aclItem->accion);
            }
            
            // The acl is stored in session, APC would be useful here too
            $this->persistent->acl = $acl;
        }

        return $this->persistent->acl;
    }
}