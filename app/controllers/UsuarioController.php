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
      $usuario->ACTUALIZADO=  date('d/m/y h:i:s');
      $usuario->save();
      if (!$usuario->save()) {
         $this->flash->error("El usuario no se pudo actualizar");
         $this->dispatcher->forward([
            'controller' => "usuario",
            'action' => 'index'
        ]);
      } else {
         $this->flash->success("El usuario se actualizo con exito");
         $this->response->redirect('usuario');
      }
   }

   public function deleteAction($id)
   {

      if ($id > 0 AND !empty($id))
      {
          // Check Agin User Article is Valid
          $usuario = Usuarios::findFirst([
              'conditions' => 'IDUSUARIO = :1: AND IDUSUARIO != :2:',
              'bind' => [
                  '1' => $id,
                  '2' => $this->session->get('AUTH')['id']
              ]
          ]);

          if (!$usuario) {
              $this->flash->error('El usuario no fue encontrado');
              return $this->response->redirect('usuario');
          }    

          if (!$usuario->delete()) {
              foreach ($usuario->getMessages() as $msg) {
                  $this->flash->error((string) $msg);
              }
              return $this->response->redirect("usuario");
          } else {
              $this->flash->success("El usuario fue eliminado");
              return $this->response->redirect("usuario");
          }

      } else {
          $this->flash->error("El identificador del usuario es invalido");
          return $this->response->redirect("usuario");
      }

      # View Page Disable
      $this->view->disable();
   }
}