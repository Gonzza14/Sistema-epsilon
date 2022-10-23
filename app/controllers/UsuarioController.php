<?php

use Phalcon\Mvc\Controller;

class UsuarioController extends Controller
{
    public function indexAction()
    {

    	$data_usuario = Usuarios::find();
    	$this->view->data_usuario=$data_usuario;
    }

    public function createAction(){

    }

    public function storeAction(){
		$usuario= new Usuarios();
		$usuario->nombre = $this->request->getPost("nombre");
		$usuario->correo = $this->request->getPost("correo");
		
		if (!$usuario->save()) {
			echo "Error no se han guardado los datos";
		}
		   else
		{
		   echo "Los datos se han almacenado correctamente";
		}
    }

    public function editAction($id)
   	{
   		$usuario = Usuarios::findFirst($id);

   		$this->view->id=$usuario->id;
   		$this->view->nombre=$usuario->nombre;
   		$this->view->correo=$usuario->correo;
   	}
   	public function updateAction()
   	{
        $id = $this->request->getPost("id");
        $user = Usuarios::findFirstById($id);

        $user->id = $this->request->getPost("id");
        $user->nombre = $this->request->getPost("nombre");
        $user->correo = $this->request->getPost("correo");
        $user->save();
     if (!$user->save()) {
         echo "Error no se han guardado los datos";
     }
        else
     {
        echo "Los datos se han almacenado correctamente";
     }
   	  }

}