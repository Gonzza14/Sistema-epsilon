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
         echo '<div class="alert alert-danger" role="alert">
               Error, vuelva a intentarlo
               </div>
               <div>
               <a href="../usuario">
               <input class="btn btn-primary"  value="Regresar"type="button">
               </a>
               </div>';		}
		   else
		{
         echo '<div class="alert alert-success" role="alert">
               El registro se guardo con exito
               </div>
               <div>
               <a href="../usuario">
               <input class="btn btn-primary"  value="Regresar"type="button">
               </a>
               </div>';
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
        $usuario = Usuarios::findFirstById($id);

        $usuario->id = $this->request->getPost("id");
        $usuario->nombre = $this->request->getPost("nombre");
        $usuario->correo = $this->request->getPost("correo");
        $usuario->save();
     if (!$usuario->save()) {
      
         echo '<div class="alert alert-danger" role="alert">
               Error, vuelva a intentarlo
               </div>
               <div>
               <a href="../usuario">
               <input class="btn btn-primary"  value="Regresar"type="button">
               </a>
               </div>';
     }
        else
     {
         echo '<div class="alert alert-success" role="alert">
               El registro se guardo con exito
               </div>
               <div>
               <a href="../usuario">
               <input class="btn btn-primary"  value="Regresar"type="button">
               </a>
               </div>';
      }
   }

}