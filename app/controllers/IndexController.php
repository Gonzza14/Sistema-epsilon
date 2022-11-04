<?php

use Phalcon\Mvc\Controller;
use Phalcon\Html\TagFactory;
use Phalcon\Encryption\Security\Random;

class IndexController extends Controller
{
    public function indexAction()
    {
    }
    public function signinAction()
    {
        if ($this->session->has('AUTH')) {
            $this->flash->error("Ya has iniciado sesion");
            $this->response->redirect('index');
            $this->view->disable();
        } else {
            if ($this->request->isPost()) {

                $post = $this->request->getPost();
                $nombre = $post["nombre"];
                $clave = md5($post["clave"]);

                // $user = new Users();
                $usuario = Usuarios::findFirst([
                    'conditions' => 'USERNAME = ?1 and CONTRAUSUARIO = ?2',
                    'bind' => [
                        1 => $nombre,
                        2 => $clave,
                    ]
                ]);
                if ($usuario) {
                    if ($usuario->ACTIVO != 1) {
                        $this->flash->error("Usuario no activo");
                        $this->response->redirect('index/signin');
                        $this->view->disable();
                    } else {
                        if ($usuario->PRIMERSIGNIN) {
                            return $this->response->redirect('index/confirm/' . $usuario->IDUSUARIO);
                        } else {
                            $this->session->set('AUTH', [
                                'id' => $usuario->IDUSUARIO,
                                'nombre' => $usuario->NOMBREUSUARIO,
                                'apellido' => $usuario->APELLIDO,
                                'username' => $usuario->USERNAME,
                                'correo' => $usuario->CORREOUSUARIO,
                                'rol' => $usuario->IDROL,
                                'creado' => $usuario->CREADO,
                                'actualizado' => $usuario->ACTUALIZADO,
                            ]);
                            return $this->response->redirect('index');
                        }
                    }
                } else {
                    $this->flash->error("Email y/o contraseña invalida.");
                    $this->view->disable();
                }
            }
        }
    }

    public function signupAction()
    {
        if ($this->session->has('AUTH')) {
            $this->flash->error("Ya has iniciado sesion");
            $this->response->redirect('index');
            $this->view->disable();
        } else {
            $this->view->roles = security\Roles::find();

            $mail = new Mail();

            $post = $this->request->getPost();
            if ($this->request->isPost()) {
                $usuario = new Usuarios();

                $random = new Random();
                $provisional = $random->base62(8);

                $usuario->NOMBREUSUARIO = ucwords($post['nombre']);
                $usuario->APELLIDOUSUARIO = ucwords($post['apellido']);
                $usuario->CORREOUSUARIO = $post['correo'];
                $usuario->FECHANACIMIENTO = $post['nacimiento'];
                $usuario->TELEFONO = $post['telefono'];
                //$usuario->CONTRAUSUARIO = md5($post['clave']);
                $usuario->CONTRAUSUARIO = md5($provisional);
                $usuario->IDROL = "Solicitante";
                $usuario->ACTIVO = 1;
                $usuario->PRIMERSIGNIN = 1;
                $usuario->CREADO =  date('d/m/y h:i:s');
                $usuario->ACTUALIZADO =  date('d/m/y h:i:s');

                $comprobarNombre =  strtoupper(substr($usuario->NOMBREUSUARIO, 0, 1) . substr($usuario->APELLIDOUSUARIO, 0, 1) . "%");

                $usuarioRegistrado = Usuarios::findFirst([
                    'conditions' => 'USERNAME LIKE ?1',
                    'bind' => [
                        1 => $comprobarNombre,
                    ]
                ]);
                if ($usuarioRegistrado) {
                    $cadena = $usuarioRegistrado->USERNAME;
                    $numerosUsuario = substr($cadena, 2, 5);
                    $integerUsuario = (int)$numerosUsuario;
                    $contador = $integerUsuario + 1;
                    $numeroConCeros =  str_pad($contador, 5, "0", STR_PAD_LEFT);
                    $nombreUsuario = str_replace($numerosUsuario, $numeroConCeros, $cadena);
                } else {
                    $numero = 1;
                    $numeroConCeros =  str_pad($numero, 5, "0", STR_PAD_LEFT);
                    $nombreUsuario =  strtoupper(substr($usuario->NOMBREUSUARIO, 0, 1) . substr($usuario->APELLIDOUSUARIO, 0, 1) . $numeroConCeros);
                }

                $usuario->USERNAME = $nombreUsuario;
                $exito = $usuario->save();

                if ($exito) {
                    /**
                     * Send Email
                     */
                    $params = [
                        'nombre' => $usuario->NOMBREUSUARIO,
                        'username' => $usuario->USERNAME,
                        'contra' => $provisional,
                        'link' => "http://127.0.1.3/index/confirm"
                    ];
                    $mail->send($this->request->getPost('correo', ['trim', 'correo']), 'signup', $params);

                    $this->flash->success("¡Gracias por registrarte!");
                    $this->response->redirect('/index/signin');
                    $this->view->disable();
                } else {

                    $mensajes = $usuario->getMessages();

                    foreach ($mensajes as $mensaje) {
                        $this->flash->error($mensaje->getMessage(), "<br/>");
                    }
                    $this->view->disable();
                }
            }
        }
    }

    public function confirmAction($id)
    {
        if ($this->session->has('AUTH')) {
            $this->flash->error("Ya has iniciado sesion");
            $this->response->redirect('index');
            $this->view->disable();
        } else {
        $usuario = Usuarios::findFirst($id);
        $this->view->id = $usuario->IDUSUARIO;
        }
    }

    public function updatePasswordAction()
    {
        $post = $this->request->getPost();
        $id = $post["id"];

        $usuario = Usuarios::findFirstByIDUSUARIO($id);
        if ($post["clave"] == $post["clave-confirmar"]) {
            $usuario->CONTRAUSUARIO = md5($post["clave"]);
            $usuario->ACTUALIZADO =  date('d/m/y h:i:s');
            $usuario->PRIMERSIGNIN = 0;
            $usuario->save();
            $this->session->set('AUTH', [
                'id' => $usuario->IDUSUARIO,
                'nombre' => $usuario->NOMBREUSUARIO,
                'apellido' => $usuario->APELLIDO,
                'username' => $usuario->USERNAME,
                'correo' => $usuario->CORREOUSUARIO,
                'rol' => $usuario->IDROL,
                'creado' => $usuario->CREADO,
                'actualizado' => $usuario->ACTUALIZADO,
            ]);
            if (!$usuario->save()) {
                $this->flash->error("No se pudo cambiar la contraseña");
            } else {
                $this->flash->success("Se cambio la contraseña con exito");
                $this->session->destroy();
                $this->response->redirect('index/signin');
            }
        } else {
            $this->flash->error("Las contraseñas no coinciden");
        }
    }

    public function logoutAction()
    {
        $this->session->destroy();
        return $this->response->redirect("");
    }
}
