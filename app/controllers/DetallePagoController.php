<?php

use Phalcon\Di;
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model\Query;
use Phalcon\Mvc\View;
use Phalcon\Http\Response;


class DetallePagoController extends Controller
{
    public function indexAction()
    {


    }

    public function createAction(){

    }

    public function storeAction()
    {
		$pago= new Pago();
	    $pago->idAsociado = $this->request->getPost("idAsociado");
		 $pago->fechaPago = $this->request->getPost("fechaPago");

      
		if (!$pago->save()) 
      {
         echo '<div class="alert alert-danger" role="alert">
               Error, vuelva a intentarlo
               </div>
               <div>
               <a href="../pago">
               <input class="btn btn-primary"  value="Regresar"type="button">
               </a>
               </div>';	
      }
		else
		{
         echo '<div class="alert alert-success" role="alert">
         Se ha iniciado un pago con exito
         </div>
         <div>
         <a href="../detallePago/create">
         <input class="btn btn-primary"  value="Siguiente"type="button">
         </a>
         </div>';
		}
    }
    public function editAction($id)
   	{

   		$idPago = Pago::findFirst($id);

      $this->view->idPago=$idPago->idPago;
   	}


}