<?php

use Phalcon\Mvc\Controller;
use Phalcon\Html\TagFactory;
use security\Roles;
use Phalcon\Mvc\Model\Manager;

class RolesController extends Controller
{
    public function indexAction()
    {
        $this->view->roles = security\Roles::find();
    }

    public function createAction()
    {
    }
    public function storeAction()
    {
        $post = $this->request->getPost();
        if (!$this->request->isPost()) {
            return $this->response->redirect('roles');
        }

        $rol = new Roles();

        $rol->IDROL = $post['id'];
        $rol->CREADO =  date('d/m/y h:i:s');
        $rol->ACTUALIZADO =  date('d/m/y h:i:s');

        $exito = $rol->save();

        if ($exito) {
            $this->flash->success("¡El rol ha sido registrado!");
            $this->response->redirect('roles');
            $this->view->disable();
        } else {

            $mensajes = $rol->getMessages();

            foreach ($mensajes as $mensaje) {
                $this->flash->error($mensaje->getMessage(), "<br/>");
            }
            $this->view->disable();
        }
    }

    public function editAction($id)
    {
        $rol = security\Roles::findFirst([
            'conditions' => 'IDROL = :1:',
            'bind' => [
                '1' => $id,
            ]
        ]);

        //$rol = Roles::findFirst($id);

        $this->view->idRol = $rol->IDROL;
        $this->view->id = $rol->IDROL;
    }

    public function updateAction()
    {
        $id = $this->request->getPost("id");
        /*$rol = Roles::findFirstByIDROL($id);*/
        $rol = Roles::findFirst([
            'conditions' => 'IDROL = :1:',
            'bind' => [
                '1' => $id,
            ]
        ]);
        /*$idRol = $this->request->getPost("id");
        $tiempo = date('d/m/y h:i:s');
        $query = $this
        ->modelsManager
        ->executeQuery(
            'UPDATE security\Roles SET IDROL= :idRol:, ACTUALIZADO= :tiempo: WHERE identificador = :id:',
            [
                'id' => $id,
                'idRol' => $idRol,
                'tiempo' => $tiempo
            ]
        );*/
        $rol->IDROL = $this->request->getPost("idRol");
        $rol->ACTUALIZADO = date('d/m/y h:i:s');
        $rol->save();
        if (!$rol->save()) {
            $this->flash->error("El rol no se pudo actualizar");
            $this->dispatcher->forward([
                'controller' => "roles",
                'action' => 'index'
            ]);
        } else {
            $this->flash->success("El rol se actualizo con exito");
            $this->response->redirect('roles');
        }
    }

    public function deleteAction($id)
    {
        if (!empty($id)) {
            // Check Agin User Article is Valid
            $rol = Roles::findFirst([
                'conditions' => 'IDROL = :1:',
                'bind' => [
                    '1' => $id,
                ]
            ]);

            if (!$rol) {
                $this->flash->error('El rol no fue encontrado');
                return $this->response->redirect('roles');
            }

            if (!$rol->delete()) {
                foreach ($rol->getMessages() as $msg) {
                    $this->flash->error((string) $msg);
                }
                return $this->response->redirect("roles");
            } else {
                $this->flash->success("El rol fue eliminado");
                return $this->response->redirect("roles");
            }
        } else {
            $this->flash->error("El identificador del rol es invalido");
            return $this->response->redirect("roles");
        }
    }
}
