<?php

use Phalcon\Mvc\Controller;

class UsuarioController extends Controller
{
   public function indexAction()
   {

      $data_usuario = Usuarios::find();
      $this->view->data_usuario = $data_usuario;
   }

   public function createAction()
   {
   }
   public function editAction($id)
   {
      $this->view->roles = security\Roles::find();
      $usuario = Usuarios::findFirst($id);

      $this->view->id = $usuario->IDUSUARIO;
      $this->view->nombre = $usuario->NOMBREUSUARIO;
      $this->view->apellido = $usuario->APELLIDOUSUARIO;
      $this->view->rol = $usuario->IDROL;
      $this->view->correo = $usuario->CORREOUSUARIO;
      $this->view->nacimiento = $usuario->FECHANACIMIENTO;
      $this->view->telefono = $usuario->TELEFONO;       
      $this->view->rol = $usuario->IDROL;
   }
   public function updateAction()
   {
      $id = $this->request->getPost("id");
      $usuario = Usuarios::findFirstByIDUSUARIO($id);
      $usuario->IDUSUARIO = $this->request->getPost("id");
      $usuario->NOMBREUSUARIO = $this->request->getPost("nombre");
      $usuario->APELLIDOUSUARIO = $this->request->getPost("apellido"); 
      $usuario->CORREOUSUARIO = $this->request->getPost("correo");
      $usuario->FECHANACIMIENTO = $this->request->getPost("nacimiento");
      $usuario->TELEFONO = $this->request->getPost("telefono");
      $usuario->IDROL = $this->request->getPost("idRol");
      date_default_timezone_set('America/El_Salvador');  
      $usuario->ACTUALIZADO=  date('d/m/y h:i:s', time());
      $usuario->save();
      if (!$usuario->save()) {
         $this->flashSession->error("El usuario no se pudo actualizar");
         $this->dispatcher->forward([
            'controller' => "usuario",
            'action' => 'index'
        ]);
      } else {
         $this->flashSession->success("El usuario se actualizo con exito");
         $this->view->disable();
         $this->response->redirect('usuario');
      }
   }

   public function deleteAction($id)
   {

      if ($id > 0 AND !empty($id))
      {
    
          $usuario = Usuarios::findFirst([
              'conditions' => 'IDUSUARIO = :1: AND IDUSUARIO != :2:',
              'bind' => [
                  '1' => $id,
                  '2' => $this->session->get('AUTH')['id']
              ]
          ]);

          if (!$usuario) {
              $this->flashSession->error('El usuario no fue encontrado');
              $this->view->disable();
              return $this->response->redirect('usuario');
          }    

          if (!$usuario->delete()) {
              foreach ($usuario->getMessages() as $msg) {
                  $this->flashSession->error((string) $msg);
                  
              }
              $this->view->disable();
              return $this->response->redirect("usuario");
          } else {
              $this->flashSession->success("El usuario fue eliminado");
              $this->view->disable();
              return $this->response->redirect("usuario");
          }

      } else {
          $this->flasSession->error("El identificador del usuario es invalido");
          $this->view->disable();
          return $this->response->redirect("usuario");
      }
   }
}