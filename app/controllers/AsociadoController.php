<?php

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Router;


class AsociadoController extends Controller
{
    public function indexAction()
    {
        $data_genero = Genero::find();
    	$this->view->data_genero=$data_genero;
        $data_pais = Pais::find();
    	$this->view->data_pais=$data_pais;
        $data_region = Region::find();
    	$this->view->data_region=$data_region;
        $data_tipo_doc = TipoDocumentos::find();
    	$this->view->data_tipo_doc=$data_tipo_doc;
        $data_tipo_doc = TipoDocumentos::find();
    	$this->view->data_tipo_doc=$data_tipo_doc;
        $data_estado_civil = EstadoCivil::find();
    	$this->view->data_estado_civil=$data_estado_civil;
        $data_profesion = Profesion::find();
    	$this->view->data_profesion=$data_profesion;
    }

    public function storeAction(){
		$asociado = new Asociado();
        $asociado->idAsociado = $this->request->getPost("idPrincipal");
		$asociado->nombreAsociado = $this->request->getPost("nombreAsociado");
        $asociado->apellido = $this->request->getPost("primerApellido").$this->request->getPost("segundoApellido");
        $asociado->apellidoConyugue = $this->request->getPost("apellidoConyugue");
        $asociado->idGenero = $this->request->getPost("genero");
        $asociado->idProfesion = $this->request->getPost("profesionAso");
        $asociado->idUsuario = $this->request->getPost("idPrincipal");
        $asociado->telefono = $this->request->getPost("codigo").$this->request->getPost("telefonoA");;
        $asociado->estado= 0;



        //Documento
        $tipoDoc = new DocumentoAsociado();
        $tipoDoc->idAsociado = $this->request->getPost("idPrincipal");
        $tipoDoc->idTipoDocumento = $this->request->getPost("tipoDocumento");
        $tipoDoc->numeroDoc =$this->request->getPost("numeroDoc");

        $asociado->nit = $this->request->getPost("nit");
		$asociado->nup = $this->request->getPost("nup");
		$asociado->isss = $this->request->getPost("isss");
        $asociado->fechaNacimiento = $this->request->getPost("fechaNacimiento");
        $asociado->idPais = $this->request->getPost("pais");
        $asociado->idRegion = $this->request->getPost("region");
        $asociado->idSubRegion = $this->request->getPost("subregion");
        $asociado->nacionalidad = $this->request->getPost("nac");
        $asociado->barrioColRes = $this->request->getPost("barrioColRes");
        $asociado->callePasaj = $this->request->getPost("callePasaj");
        $asociado->numCasDep = $this->request->getPost("numCasDep");
        $asociado->idPaisResi = $this->request->getPost("paisResi");
        $asociado->idRegionResi = $this->request->getPost("regionResi");
        $asociado->idSubRegionResi = $this->request->getPost("subregionResi");
        $asociado->x = $this->request->getPost("x");
        $asociado->y = $this->request->getPost("y");
        // //Estado civil
        $asociado->idEstCivil = $this->request->getPost("estadoCivil");
        // //Conyugue
        $conyugue = new Conyugue();
        $conyugue->idAsociado = $this->request->getPost("idPrincipal");
        $conyugue->nombreConyugue= $this->request->getPost("nombreConyugue"). $this->request->getPost("nombreConyugueA");
        $conyugue->correoConyugue = "correo";
        $conyugue->fechaNacConyugue = $this->request->getPost("fechaNacConyugue");
        $conyugue->situacionLaboralConyugue = $this->request->getPost("situacionLaboralConyugue");
        $conyugue->profesionConyugue = $this->request->getPost("profesionConyugue");
        $conyugue->cargoConyugue = $this->request->getPost("cargoConyugue");
        $conyugue->empresaConyugue = $this->request->getPost("empresaConyugue");
        $conyugue->direcLabConyugue = $this->request->getPost("direcLabConyugue");
        // //Laboral
        $asociado->capacidadPago = $this->request->getPost("capacidadPago");
        $asociado->idProfesion = $this->request->getPost("profesion");
        $asociado->empresario = $this->request->getPost("empresario");
        $asociado->idPaisResi = $this->request->getPost("paisResi");
        $asociado->cargo= $this->request->getPost("cargo");
        $asociado->nombreEmpresa = $this->request->getPost("nombreEmpresa");
        $asociado->direccLaboral = $this->request->getPost("direccLaboral");
        $asociado->iva = $this->request->getPost("iva");

        $refP1 = new RefPersonales();
        $refP1->idAsociado = $this->request->getPost("idPrincipal");
        $refP1->nombreRef = $this->request->getPost("nombreRef");
        $refP1->telefonoRef = $this->request->getPost("telefonoRef");
        $refP1->correoRef = $this->request->getPost("correoRef");
        $refP1->direccionRef = $this->request->getPost("direccionRef");
        $refP1->relacionAsoc = $this->request->getPost("relacionAsoc");

        $refP2 = new RefPersonales();
        $refP2->idAsociado = $this->request->getPost("idPrincipal");
        $refP2->nombreRef = $this->request->getPost("nombreRef1");
        $refP2->telefonoRef = $this->request->getPost("telefonoRef1");
        $refP2->correoRef = $this->request->getPost("correoRef1");
        $refP2->direccionRef = $this->request->getPost("direccionRef1");
        $refP2->relacionAsoc = $this->request->getPost("relacionAsoc1");


        $refP3 = new RefFamiliares();
        $refP3->idAsociado = $this->request->getPost("idPrincipal");
        $refP3->nombreFa = $this->request->getPost("nombreFa");
        $refP3->telefonoFa = $this->request->getPost("telefonoFa");
        $refP3->correoFa = $this->request->getPost("correoFa");
        $refP3->direccionFa = $this->request->getPost("direccionFa");
        $refP3->relacionFa = $this->request->getPost("relacionFa");

        $refP4 = new RefFamiliares();
        $refP4->idAsociado = $this->request->getPost("idPrincipal");
        $refP4->nombreFa = $this->request->getPost("nombreFa1");
        $refP4->telefonoFa = $this->request->getPost("telefonoFa1");
        $refP4->correoFa = $this->request->getPost("correoFa1");
        $refP4->direccionFa = $this->request->getPost("direccionFa1");
        $refP4->relacionFa = $this->request->getPost("relacionFa1");



    	if ((!($asociado->save()))) {
         echo '<div class="alert alert-danger" role="alert">Error de asociado, vuelva a intentarlo</div>
         <div><a href="../usuario"><input class="btn btn-primary"  value="Regresar"type="button"></a></div>';		}
		   else
		{
         echo '<div class="alert alert-success" role="alert"> El registro asociado</div>';
            }
            
        
    	if ((!($tipoDoc->save()))) {
            echo '<div class="alert alert-danger" role="alert">Error del tipo de documento, vuelva a intentarlo</div>';		}
              else
           {
            echo '<div class="alert alert-success" role="alert"> El registro de tipo de documento</div>';
               }
               

        if($this->request->getPost("estadoCivil") != 2){
            if ((!($conyugue->save()))) {
                echo '<div class="alert alert-danger" role="alert">Error de conyugue, vuelva a intentarlo</div>';		}
                    else
                {
                echo '<div class="alert alert-success" role="alert"> El registro de conyugue realizado</div>';
                    }    
        }
        


    
        if ((!($refP1->save()))) {
            echo '<div class="alert alert-danger" role="alert">Error referencia personal, vuelva a intentarlo</div>';		}
                else
            {
            echo '<div class="alert alert-success" role="alert"> El registro de referencia personal</div>';
                } 
                
                
        if ((!($refP2->save()))) {
            echo '<div class="alert alert-danger" role="alert">Error referencia personal, vuelva a intentarlo</div>';		}
                else
            {
            echo '<div class="alert alert-success" role="alert"> El registro de referencia personal</div>';
                } 

                                
        if ((!($refP3->save()))) {
            echo '<div class="alert alert-danger" role="alert">Error referencia familiar, vuelva a intentarlo</div>';		}
                else
            {
            echo '<div class="alert alert-success" role="alert"> El registro de referencia familiar</div>';
                } 
            
                                
        if ((!($refP4->save()))) {
            echo '<div class="alert alert-danger" role="alert">Error referencia familiar, vuelva a intentarlo</div>
            <div><a href="../usuario"><input class="btn btn-primary"  value="Regresar"type="button"></a></div>';		}
                else
            {
            echo '<div class="alert alert-success" role="alert"> El registro de familiar</div>
                    <div><a href="../beneficiario"><input class="btn btn-primary"  value="Regresar"type="button"></a></div>';
                } 
    
    
    }

    public function uploadAction()
    {
        

    }
    public function confirmaAction()
    {
        echo '<div class="alert alert-success" role="alert"> Archivo guardado con exito</div>
        <div><a href="../asociado/upload"><input class="btn btn-primary"  value="Regresar"type="button"></a></div>';
    }
    public function errorAction()
    {            echo '<div class="alert alert-success" role="alert"> Hubo un error, el archivo con el mismo nombre dentro del sistema</div>
        <div><a href="../asociado/upload"><input class="btn btn-primary"  value="Regresar"type="button"></a></div>';

    }
    
}



