<?php

use Phalcon\Di;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model\Query;
use Phalcon\Mvc\View;


class TipoDocumentoController extends Controller
{
    public function indexAction()
    {

    	$tipos = TipoDocumentos::find();
    	$this->view->tipos=$tipos;
    /* $query = new Query('SELECT * FROM tipo_documentos',
         $this->di
     );

     $tipos = $query->execute();
     $this->view->tipos=$tipos;
     //$this->view->setVar('tipos', $invoices);*/
    }

    public function createAction(){

    }

    public function storeAction()
    {
		$tipoDoc= new TipoDocumentos();
		$tipoDoc->nombreTipoDoc = $this->request->getPost("nombreTipoDoc");
		$tipoDoc->mascara = $this->request->getPost("mascara");
      //$tipoDoc->extranjeroTipoDoc =0;

     $tipoDoc->extranjeroTipoDoc = $this->request->getPost("extranjeroTipoDoc");
		if (!$tipoDoc->save()) 
      {
         echo '<div class="alert alert-danger" role="alert">
               Error, vuelva a intentarlo
               </div>
               <div>
               <a href="../tipoDocumento">
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
               <a href="../tipoDocumento">
               <input class="btn btn-primary"  value="Regresar"type="button">
               </a>
               </div>';
		}
    }

    public function editAction($id)
   	{

   		$tipoDoc = TipoDocumentos::findFirst($id);

         $this->view->idTipoDocumento=$tipoDoc->idTipoDocumento;
   		$this->view->nombreTipoDoc=$tipoDoc->nombreTipoDoc;
   		$this->view->mascara=$tipoDoc->mascara;
         $this->view->extranjeroTipoDoc=$tipoDoc->extranjeroTipoDoc;
   	}
   	public function updateAction()
   	{
        $tipoDoc = TipoDocumentos::findFirstByIdTipoDocumento($this->request->getPost("idTipoDocumento"));
        $tipoDoc->idTipoDocumento = $this->request->getPost("idTipoDocumento");
        $tipoDoc->nombreTipoDoc = $this->request->getPost("nombreTipoDoc");
        $tipoDoc->mascara = $this->request->getPost("mascara");
        $tipoDoc->extranjeroTipoDoc = $this->request->getPost("extranjeroTipoDoc");
        $tipoDoc->save();
     if (!$tipoDoc->save()) {
      
         echo '<div class="alert alert-danger" role="alert">
               Error, vuelva a intentarlo
               </div>
               <div>
               <a href="../tipoDocumento">
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
               <a href="../tipoDocumento">
               <input class="btn btn-primary"  value="Regresar"type="button">
               </a>
               </div>';
      }
   }
   public function deleteAction($id)
   {

      $tipoDoc = TipoDocumentos::findFirst($id);

      $tipoDoc->delete();
       if (! $tipoDoc->delete()) {
         echo '<div class="alert alert-danger" role="alert">
         Error, vuelva a intentarlo
         </div>
         <div>
         <a href="../../tipoDocumento">
         <input class="btn btn-primary"  value="Regresar"type="button">
         </a>
         </div>';
}
  else
{
   echo '<div class="alert alert-success" role="alert">
         El registro se elimino con exito
         </div>
         <div>
         <a href="../../tipoDocumento">
         <input class="btn btn-primary"  value="Regresar"type="button">
         </a>
         </div>';
}

   }

}