<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;

class AceptacionController extends Controller
{
    public function indexAction()
    {
    	$data_solicitudes = Asociado::find('estado = 1');
    	$this->view->data_solicitudes=$data_solicitudes;
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
   		$asociado = Asociado::findFirst($id);

        $this->view->idAsociado=$asociado->idAsociado;
        $this->view->idGenero=$asociado->idGenero;
        $this->view->idRegion=$asociado->idRegion;
        $this->view->idSubRegion=$asociado->idSubRegion;
        $this->view->idPais=$asociado->idPais;
        $this->view->idProfesion=$asociado->idProfesion;
        $this->view->idEstCivil=$asociado->idEstCivil;
        $this->view->idUsuario=$asociado->idUsuario;
        $this->view->nombreAsociado=$asociado->nombreAsociado;
        $this->view->apellido=$asociado->apellido;
        $this->view->apellidoConyugue=$asociado->apellidoConyugue;
        $this->view->fechaNacimiento=$asociado->fechaNacimiento;
        $this->view->extranjeroAsoc=$asociado->extranjeroAsoc;
        $this->view->telefono=$asociado->telefono;
        $this->view->barrioColRes=$asociado->barrioColRes;
        $this->view->callePasaj=$asociado->callePasaj;
        $this->view->numCasDep=$asociado->numCasDep;
        $this->view->x=$asociado->x;
        $this->view->y=$asociado->y;
        $this->view->correo=$asociado->correo;
        $this->view->capacidadPago=$asociado->capacidadPago;
        $this->view->empresario=$asociado->empresario;
        $this->view->cargo=$asociado->cargo;
        $this->view->deparDesempena=$asociado->deparDesempena;
        $this->view->direccLaboral=$asociado->direccLaboral;
        $this->view->capAhorro=$asociado->capAhorro;
        $this->view->estado=$asociado->estado;
        $this->view->formaPago=$asociado->formaPago;
        $this->view->direccionPagos=$asociado->direccionPagos;
        $this->view->fechaRevision=$asociado->fechaRevision;
        $this->view->fechaSolicitud=$asociado->fechaSolicitud;
        $this->view->fechaAprobacion=$asociado->fechaAprobacion;
        $this->view->carnet=$asociado->carnet;
        $this->view->foto=$asociado->foto;
        $this->view->numCtaAhorro=$asociado->numCtaAhorro;
        $this->view->numCtaAporte=$asociado->numCtaAporte;
        $this->view->firmaDigital=$asociado->firmaDigital;

        $data_genero = Genero::findFirst($asociado->idGenero);
    	$this->view->data_genero=$data_genero;
        $data_pais = Pais::findFirst($asociado->idPais);
    	$this->view->data_pais=$data_pais;
        $data_region = Region::findFirst($asociado->idRegion);
    	$this->view->data_region=$data_region;
        $data_subregion = Subregion::findFirst($asociado->idSubRegion);
    	$this->view->data_subregion=$data_subregion;
        $data_estCiv = EstadoCivil::findFirst($asociado->idEstCivil);
    	$this->view->data_estCiv=$data_estCiv;
        $data_profesion = Profesion::findFirst($asociado->idProfesion);
    	$this->view->data_profesion=$data_profesion;
        $data_conyugue = Conyugue::findFirst('idAsociado = '. $asociado->idAsociado);
    	$this->view->data_conyugue=$data_conyugue;
        $data_refPer = RefPersonales::find('idAsociado = '. $asociado->idAsociado);
    	$this->view->data_refPer=$data_refPer;
        $data_refFam = RefFamiliares::find('idAsociado = '. $asociado->idAsociado);
    	$this->view->data_refFam=$data_refFam;
        $data_benef = Beneficiario::find('idAsociado = '. $asociado->idAsociado);
    	$this->view->data_benef=$data_benef;
        $data_archivos = DocumentosAnexos::find('idAsociado = '. $asociado->idAsociado);
    	$this->view->data_archivos=$data_archivos;
        $ruta = __FILE__;
    	$this->view->ruta=$ruta;
   	}

   	public function updateAction()
   	{
        $asociado = Asociado::findFirstByIdAsociado($this->request->getPost("idAsociado"));
        $asociado->idAsociado = $this->request->getPost("idAsociado");
        $asociado->estado = 3;
        $asociado->save();

        if (!$asociado->save()) {
            echo '<div class="alert alert-danger" role="alert">
            Error, vuelva a intentarlo
            </div>
            <div>
            <a href="../revision">
            <input class="btn btn-primary"  value="Regresar"type="button">
            </a>
            </div>';
        } else{
            echo '<div class="alert alert-success" role="alert">
            La solicitud fue denegada
            </div>
            <div>
            <a href="../revision">
            <input class="btn btn-primary"  value="Regresar"type="button">
            </a>
            </div>';
        }
    }

    public function update2Action()
   	{
        $asociado = Asociado::findFirstByIdAsociado($this->request->getPost("idAsociado"));
        $asociado->idAsociado = $this->request->getPost("idAsociado");
        $asociado->estado = 2;
        $asociado->save();

        if (!$asociado->save()) {
            echo '<div class="alert alert-danger" role="alert">
            Error, vuelva a intentarlo
            </div>
            <div>
            <a href="../revision">
            <input class="btn btn-primary"  value="Regresar"type="button">
            </a>
            </div>';
        } else{
            echo '<div class="alert alert-success" role="alert">
            La solicitud se reviso con exito
            </div>
            <div>
            <a href="../revision">
            <input class="btn btn-primary"  value="Regresar"type="button">
            </a>
            </div>';
        }
    }

}