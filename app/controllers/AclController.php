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

    /**
     * Displays the creation form
     */
    public function newAction()
    {
    }

    /**
     * Edits a dbaccesscontrollist
     *
     * @param string $role
     */
    public function editAction($IDROL)
    {
        if (!$this->request->isPost()) {

            $acl = Acl::findFirstByIDROL($IDROL);
            if (!$acl) {
                $this->flash->error("La lista de accesso no ha sido encontrada");

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
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "acl",
                'action' => 'new'
            ]);

            return;
        }

        $this->flash->success("La lista de acceso fue creada satisfactoriamente");

        $this->dispatcher->forward([
            'controller' => "acl",
            'action' => 'index'
        ]);
    }

    /**
     * Saves a dbaccesscontrollist edited
     *
     */
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
            $this->flash->error("la lista de acceso no existe " . $IDROL);

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
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "acl",
                'action' => 'edit',
                'params' => [$acl->IDROL]
            ]);

            return;
        }

        $this->flash->success("La lista de acceso fue actualizada con exito");

        $this->dispatcher->forward([
            'controller' => "acl",
            'action' => 'index'
        ]);
    }

    /**
     * Deletes a dbaccesscontrollist
     *
     * @param string $role
     */
    public function deleteAction($IDROL)
    {
        $acl = Acl::findFirstByIDROL($IDROL);
        if (!$acl) {
            $this->flash->error("La lista de acceso no fue encontrada");

            $this->dispatcher->forward([
                'controller' => "acl",
                'action' => 'index'
            ]);

            return;
        }

        if (!$acl->delete()) {

            foreach ($acl->getMessages() as $message) {
                $this->flash->error($message);
            }

            $this->dispatcher->forward([
                'controller' => "acl",
                'action' => 'search'
            ]);

            return;
        }

        $this->flash->success("La lista de acceso fue eliminada correctamente");

        $this->dispatcher->forward([
            'controller' => "acl",
            'action' => "index"
        ]);
    }


    /**
     * Set Access Control List in the Database
     * @param {string} $resource {Controller Name}
     */
    public function setAccessControlAction($componente)
    {
        /**
         * Insert Controller and Controller Functions in the Database Table {dbresource, dbaction}
         * @dbresource => Insert Controller Name
         * @dbaction => Insert Controller Functions
         */

        $accionCurrentItems = Accion::findByComponente($componente);
        foreach ($accionCurrentItems as $accionCurrentItem) {
            $accionCurrentItems->delete();
        }
        $output = $this->populateAclAction($componente);
        if (isset($output['status']) && $output['status'] === false) {
            echo $output['error'];

            // Disable View File Content
            $this->view->disable();
        }
        

        // Passing controller name to view file
        $this->view->componente = $componente;
        // Fetch All User Roles in the Database Table {dbrole}
        $this->view->roles = Roles::find();
        // Fetch {$resource} Controller Function Names in the Database Table {dbaction}
        $this->view->acciones = Accion::findByComponente($componente);
        // Fetch {$resource} Controller Access List in the Database Table {dbaccesscontrollist}
        $this->view->aclItems = Acl::findByComponente($componente);
    }

    /**
     * [Private]: Don't Open in Browser URL
     */
    protected function populateAclAction($componente)
    {
        $dir = "../app/controllers/"; # OUTPUT: ../app/controllers/
        $className = (ucfirst($componente . "Controller")); # OUTPUT: {$resource}Controller, ex- UserController
        $controllerFile = $dir . $className . ".php"; # OUTPUT: ../app/controllers/UserController.php

        // trying to include a file with the same name as the current script causes a conflict
        if (strcmp($componente, "acl") != 0) {
            if ((@include $controllerFile) === false) {
                // $this->flash->error("No such Resource/Controller File");
                // return;
                return ['status' => false, 'error' => "No existe archivo Componente/Controller"];
            }
        }

        $thisClass = new $className(); // Create a {$resource} Controller Object
        $funcs = get_class_methods($thisClass); // Get {$resource} Class Methods
        unset($thisClass); // Remove Variable

        $componentesModel = new Componentes(); // Create a {Dbresource} Model Object
        $componentesModel->componente = $componente; // Set {$resource} Controller Name in the Resource Database table field Name

        // Insert {$resource} Controller Name in the Database
        if (!$componentesModel->save()) {
            // Validation OR Database Errors
            foreach ($componentesModel->getMessages() as $message) {
                $this->flash->error($message);
            }
            return;
        }

        // Create an action in the database for each of the functions of the controller                    
        foreach ($funcs as $func) {
            if (strpos($func, "Action")) {
                // Create a {Dbaction} Model Object

                $accion = new Accion();
                $accion->componente = $componente;
                $accion->accion = substr($func, 0, -6);
                // Insert Data in Database 
                if (!$accion->save()) {
                    // Validation OR Database Errors
                    foreach ($accion->getMessages() as $message) {
                        $this->flash->error($message);
                    }
                    return;
                }
            }
        }
    }

    /**
     * Save Access Control List in the Database
     */
    public function saveAccessControlAction()
    {
        if ($this->request->isPost()) {

            $componente = $this->request->getPost('componente');

            // Delete all pre-existing access control settings for this resource
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

            $this->view->disable();
            $this->flash->notice($msg);
            $this->response->redirect('acl');
        } else {
            return $this->response->redirect();
        }
    }
}
