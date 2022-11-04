<?php

use Phalcon\Di;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model\Query;
use Phalcon\Mvc\View;


class ConceptoController extends Controller
{
    public function indexAction()
    {

    	$conceptos = Concepto::find();
    	$this->view->conceptos=$conceptos;
    }

    public function createAction(){

    }

    public function storeAction()
    {
		$concepto= new Concepto();
	    $concepto->concepto = $this->request->getPost("concepto");
		 $concepto->monto = $this->request->getPost("monto");
   //   $concepto->concepto = "prueba";
     // $concepto->monto = 14.58;
		if (!$concepto->save()) 
      {
         echo '<div class="alert alert-danger" role="alert">
               Error, vuelva a intentarlo
               </div>
               <div>
               <a href="../concepto">
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
               <a href="../concepto">
               <input class="btn btn-primary"  value="Regresar"type="button">
               </a>
               </div>';
		}
    }

    public function editAction($id)
   	{

   		$concepto = Concepto::findFirst($id);

         $this->view->idConcepto=$concepto->idConcepto;
   		$this->view->concepto=$concepto->concepto;
   		$this->view->monto=$concepto->monto;
   	}
   	public function updateAction()
   	{
        $concepto = Concepto::findFirstByIdConcepto($this->request->getPost("idConcepto"));
        $concepto->idConcepto = $this->request->getPost("idConcepto");
        $concepto->concepto = $this->request->getPost("concepto");
        $concepto->monto = $this->request->getPost("monto");
        $concepto->save();
     if (!$concepto->save()) {
      
         echo '<div class="alert alert-danger" role="alert">
               Error, vuelva a intentarlo
               </div>
               <div>
               <a href="../concepto">
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
               <a href="../concepto">
               <input class="btn btn-primary"  value="Regresar"type="button">
               </a>
               </div>';
      }
   }
   public function deleteAction($id)
   {

      $concepto = Concepto::findFirst($id);

      $concepto->delete();
       if (! $concepto->delete()) {
         echo '<div class="alert alert-danger" role="alert">
         Error, vuelva a intentarlo
         </div>
         <div>
         <a href="../../concepto">
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
         <a href="../../concepto">
         <input class="btn btn-primary"  value="Regresar"type="button">
         </a>
         </div>';
}

   }

}