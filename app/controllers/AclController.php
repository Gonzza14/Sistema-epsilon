<?php

use security\Componentes;
use security\Accion;
use security\Roles;
use Phalcon\Mvc\Controller;

use Phalcon\Mvc\Model\Criteria;
use Phalcon\Paginator\Adapter\QueryBuilder as Paginator;
use security\Acl;

class AclController extends Controller
{
    public function indexAction()
    {
        $this->view->componentes = security\Componentes::find();
        $this->persistent->parameters = null;
    }

    public function searchAction()
    {
        $numeroPagina = 1;
        if ($this->request->isPost()) {
            $query = Criteria::fromInput($this->di, '\security\Acl', $_POST);
            $this->persistent->parameters = $query->getParams();
        } else {
            $numeroPagina = $this->request->getQuery("page", "int");
        }

        $parametros = $this->persistent->parameters;
        if (!is_array($parametros)) {
            $parametros = [];
        }
        $parametros["order"] = "IDROL";
        $acl = Acl::find($parametros);
        $builder = $this->modelsManager->createBuilder($parametros)->columns("IDROL, accion, componente")->from(Acl::class)->orderBy("IDROL");
        if (count($acl) == 0) {
            $this->flash->notice("La busqueda no encuentra una lista de acceso");

            $this->dispatcher->forward([
                "controller" => "acl",
                "action" => "index"
            ]);

            return;
        }

        $paginador = new Paginator([
            'builder' => $builder,
            'limit' => 10,
            'page' => $numeroPagina
        ]);

        $page = $paginador->paginate();
        $this->view->setVar('page', $page);
    }

    public function newAction()
    {
    }

    public function editAction($IDROL)
    {
        if (!$this->request->isPost()) {

            $acl = Acl::findFirstByIDROL($IDROL);
            if (!$acl) {
                $this->flashSession->error("La lista de accesso no ha sido encontrada");

                $this->dispatcher->forward([
                    'controller' => "acl",
                    'action' => 'index'
                ]);

                return;
            }

            $this->view->IDROLE = $acl->IDROL;

            Phalcon\Tag::setDefault("IDROL", $acl->IDROL);
            Phalcon\Tag::setDefault("accion", $acl->accion);
            Phalcon\Tag::setDefault("componente", $acl->componente);
        }
    }

    public function createAction()
    {
        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "acl",
                'action' => 'index'
            ]);

            return;
        }

        $acl = new Acl();
        $acl->IDROL = $this->request->getPost("IDROL");
        $acl->accion = $this->request->getPost("accion");
        $acl->componente = $this->request->getPost("componente");


        if (!$acl->save()) {
            foreach ($acl->getMessages() as $message) {
                $this->flashSession->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "acl",
                'action' => 'new'
            ]);

            return;
        }

        $this->flashSession->success("La lista de acceso fue creada satisfactoriamente");

        $this->dispatcher->forward([
            'controller' => "acl",
            'action' => 'index'
        ]);
    }
    public function saveAction()
    {

        if (!$this->request->isPost()) {
            $this->dispatcher->forward([
                'controller' => "acl",
                'action' => 'index'
            ]);

            return;
        }

        $IDROL = $this->request->getPost("IDROL");
        $acl = acl::findFirstByIDROL($IDROL);

        if (!$acl) {
            $this->flashSession->error("la lista de acceso no existe " . $IDROL);

            $this->dispatcher->forward([
                'controller' => "acl",
                'action' => 'index'
            ]);

            return;
        }

        $acl->IDROL = $this->request->getPost("IDROL");
        $acl->accion = $this->request->getPost("accion");
        $acl->componente = $this->request->getPost("componente");


        if (!$acl->save()) {

            foreach ($acl->getMessages() as $message) {
                $this->flashSession->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "acl",
                'action' => 'edit',
                'params' => [$acl->IDROL]
            ]);

            return;
        }

        $this->flashSession->success("La lista de acceso fue actualizada con exito");

        $this->dispatcher->forward([
            'controller' => "acl",
            'action' => 'index'
        ]);
    }

    public function deleteAction($IDROL)
    {
        $acl = Acl::findFirstByIDROL($IDROL);
        if (!$acl) {
            $this->flashSession->error("La lista de acceso no fue encontrada");

            $this->dispatcher->forward([
                'controller' => "acl",
                'action' => 'index'
            ]);

            return;
        }

        if (!$acl->delete()) {

            foreach ($acl->getMessages() as $message) {
                $this->flashSession->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "acl",
                'action' => 'search'
            ]);

            return;
        }

        $this->flashSession->success("La lista de acceso fue eliminada correctamente");

        $this->dispatcher->forward([
            'controller' => "acl",
            'action' => "index"
        ]);
    }

    public function setAccessControlAction($componente)
    {

        $accionCurrentItems = Accion::findByComponente($componente);
        foreach ($accionCurrentItems as $accionCurrentItem) {
            $accionCurrentItems->delete();
        }
        $output = $this->populateAclAction($componente);
        if (isset($output['status']) && $output['status'] === false) {
            echo $output['error'];

            $this->view->disable();
        }
        
        $this->view->componente = $componente;
        $this->view->roles = Roles::find();
        $this->view->acciones = Accion::findByComponente($componente);
        $this->view->aclItems = Acl::findByComponente($componente);
    }


    protected function populateAclAction($componente)
    {
        $dir = "../app/controllers/"; 
        $className = (ucfirst($componente . "Controller"));
        $controllerFile = $dir . $className . ".php"; 

        if (strcmp($componente, "acl") != 0) {
            if ((@include $controllerFile) === false) {
                $this->flashSession->error("No existe archivo Componente/Controller");
                $this->view->disable();
                $this->response->redirect('acl');
                return;
                //return ['status' => false, 'error' => "No existe archivo Componente/Controller"];
            }
        }

        $thisClass = new $className(); 
        $funcs = get_class_methods($thisClass); 
        unset($thisClass); 
        $componentesModel = new Componentes(); 
        $componentesModel->componente = $componente; 

        if (!$componentesModel->save()) {
            foreach ($componentesModel->getMessages() as $message) {
                $this->flashSession->error($message);
                $this->view->disable();
                $this->response->redirect('acl');
            }
            return;
        }
              
        foreach ($funcs as $func) {
            if (strpos($func, "Action")) {
                $accion = new Accion();
                $accion->componente = $componente;
                $accion->accion = substr($func, 0, -6);
                if (!$accion->save()) {
                    foreach ($accion->getMessages() as $message) {
                        $this->flashSession->error($message);
                        $this->view->disable();
                        $this->response->redirect('acl');
                    }
                    return;
                }
            }
        }
    }
    public function saveAccessControlAction()
    {
        if ($this->request->isPost()) {

            $componente = $this->request->getPost('componente');

            $aclCurrentItems = Acl::findByComponente($componente);
            foreach ($aclCurrentItems as $aclCurrentItem) {
                $aclCurrentItem->delete();
            }

            $aclItemsArray = $this->request->getPost('aclItem');
            $msg = "No hay actualizacion de la lista de acceso";
            if (!empty($aclItemsArray)) {
                foreach ($aclItemsArray as $role => $actionsArray) {
                    foreach ($actionsArray as $action => $y) {
                        $aclItem = new Acl();
                        $aclItem->IDROL = $role;
                        $aclItem->componente = $componente;
                        $aclItem->accion = $action;
                        $aclItem->save();
                        $msg = "La lista de acceso ha sido actualizada";
                    }
                }
            }
            $this->flashSession->notice($msg);
            $this->view->disable();
            $this->response->redirect('acl');
        } else {
            return $this->response->redirect();
        }
    }
}
