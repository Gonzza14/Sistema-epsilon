<?php

use Phalcon\Mvc\Controller;

class SignupController extends Controller
{
    public function indexAction()
    {

    }
    public function registerAction(){
        $post = $this->request->getPost();

        // Guardar y revisar por errores
        $usuario = new Usuarios();
        $usuario->nombre  = $post['nombre'];
        $usuario->correo = $post['correo'];
        // Guardar y revisar por errores
        $exito = $usuario->save();

        // Pasando el resultado a la vista
        $this->view->exito = $exito;

        if ($exito) {
            $mensaje = "¡Gracias por registrarse!";
        } else {
            $mensaje = "Lo sentimos, ocurrieron los siguientes problemas:<br>"
                . implode('<br>', $usuario->getMessages());
        }

        // Pasando el mensaje a la vista
        $this->view->mensaje = $mensaje;
    }
}