<?php

use Phalcon\Mvc\Controller;
use Phalcon\Html\TagFactory;

class IndexController extends Controller
{


    public function indexAction()
    {
        $this->view->usuarios = Usuarios::find();
    }


    public function signinAction(){
        if ($this->request->isPost()) {

            $post = $this->request->getPost();
            $correo = $post["correo"];
            $clave = md5($post["clave"]);

            // $user = new Users();
            $usuario = Usuarios::findFirst([
                'conditions' => 'CORREOUSUARIO = ?1 and CONTRAUSUARIO = ?2',
                'bind' => [
                    1 => $correo,
                    2 => $clave,
                ]
            ]);

            if ($usuario) {

                if ($usuario->ACTIVO != 1) {
                    echo "El usuario no esta activo";
                    $this->view->disable();
                } else {

                    # https://docs.phalconphp.com/en/3.3/session#start
        
                    // Set a session
                    $this->session->set('AUTH', [
                        'id' => $usuario->IDUSUARIO,
                        'nombre' => $usuario->NOMBREUSUARIO,
                        'correo' => $usuario->CORREOUSUARIO,
                        'rol' => $usuario->IDROL,
                        'creado' => $usuario->CREADO,
                        'actualizado' => $usuario->ACTUALIZADO,
                    ]);

                    if ($usuario->role === 1) {
                        // Redirect User Panel
                    } else if ($usuario->role === 2) {
                        // Redirect Admin Panel
                    } else {
                        // Exit;
                    }

                    return $this->response->redirect('index');
                }

            } else {

                echo "Email y correo invalido.";
                $this->view->disable();
            }
        }
    }

    public function getSessionAction(){
        $arreglo = $this->session->get('AUTH', 'nombre');
        print_r($arreglo);
    }

    public function signupAction(){

        $this->view->roles = security\Roles::find();

        $post = $this->request->getPost();
        if ($this->request->isPost()) {

            $usuario = new Usuarios();
            
            $usuario->NOMBREUSUARIO = $post['nombre'];
            $usuario->CORREOUSUARIO = $post['correo'];
            $usuario->CONTRAUSUARIO = md5($post['clave']);
            $usuario->IDROL= $post['idRol'];
            $usuario->ACTIVO = 1;
            $usuario->CREADO=  date('d/m/y h:i:s');
            $usuario->ACTUALIZADO=  date('d/m/y h:i:s');

            $exito = $usuario->save();
    
            if ($exito) {
                $this->response->redirect('/index/signin');
                $this->view->disable();
            } else {
    
                $mensajes = $usuario->getMessages();
    
                foreach ($mensajes as $mensaje) {
                    echo $mensaje->getMessage(), "<br/>";
                }

                $this->view->disable();
            }
        }
    }

    public function logoutAction()
    {
        $this->session->destroy();
        return $this->response->redirect("");
    }
}
