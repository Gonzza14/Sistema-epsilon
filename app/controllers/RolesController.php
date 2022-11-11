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
        date_default_timezone_set('America/El_Salvador');  
        $rol->CREADO =  date('d/m/y h:i:s', time());
        $rol->ACTUALIZADO =  date('d/m/y h:i:s', time());

        $exito = $rol->save();

        if ($exito) {
            $this->flashSession->success("¡El rol ha sido registrado!");
            $this->view->disable();
            $this->response->redirect('roles');
        } else {

            $mensajes = $rol->getMessages();

            foreach ($mensajes as $mensaje) {
                $this->flashSession->error($mensaje->getMessage());
                $this->view->disable();
                $this->response->redirect('roles');
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
        /*$rol = Roles::findFirst([
            'conditions' => 'IDROL = :1:',
            'bind' => [
                '1' => $id,
            ]
        ]);*/
        $idRol = $this->request->getPost("idRol");
        date_default_timezone_set('America/El_Salvador');  
        $tiempo = date('d/m/y h:i:s', time());
        $query = $this->db->prepare("UPDATE `roles` SET `IDROL` = :idRol, `ACTUALIZADO` = :tiempo WHERE `roles`.`IDROL` = :id ");
        $query->bindparam(":idRol", $idRol, PDO::PARAM_STR);
        $query->bindparam(":tiempo", $tiempo, PDO::PARAM_STR);
        $query->bindparam(":id", $id, PDO::PARAM_STR);
        $query->execute(array(':idRol' => $idRol, ':tiempo' => $tiempo, ':id' => $id));

        /*$query = $this
        ->modelsManager
        ->executeQuery(
            
            'UPDATE security\Roles SET IDROL = :idRol:, ACTUALIZADO= :tiempo: WHERE security\Roles.IDROL = :id:',
            [
                'id' => $id,
                'idRol' => $idRol,
                'tiempo' => $tiempo
            ]
        );*/
        /*$rol->IDROL = $this->request->getPost("idRol");
        $rol->ACTUALIZADO = date('d/m/y h:i:s');
        $rol->save();*/
        if (!$query) {
            $this->flashSession->error("El rol no se pudo actualizar");
            $this->dispatcher->forward([
                'controller' => "roles",
                'action' => 'index'
            ]);
        } else {
            $this->flashSession->success("El rol se actualizo con exito");
            $this->view->disable();
            $this->response->redirect('roles');
            /*$this->view->msg = "El rol se actualizo con exito";
            $this->view->clase = "alert alert-success";*/
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
                $this->flashSession->error('El rol no fue encontrado');
                $this->view->disable();
                return $this->response->redirect('roles');
            }

            try {
                if (!$rol->delete()) {
                    foreach ($rol->getMessages() as $msg) {
                        $this->flashSession->error((string) $msg);
                    }
                    $this->view->disable();
                    return $this->response->redirect("roles");
                } else {
                    $this->flashSession->success("El rol fue eliminado");
                    $this->view->disable();
                    return $this->response->redirect("roles");
                }
            } catch (PDOException $e) {
                $this->flashSession->error("El rol esta siendo utilizado por otros registros");
                $this->view->disable();
                return $this->response->redirect("roles");
            }
        } else {
            $this->flashSession->error("El identificador del rol es invalido");
            $this->view->disable();
            return $this->response->redirect("roles");
        }
    }
}
