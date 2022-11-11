<?php

use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;

class CarnetController extends Controller
{
    public function indexAction()
    {
    	$data_solicitudes = Asociado::find('estado = 2');
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

        $re = '/\b(\w)[^\s]*\s*/m';
        $cadena = $asociado->apellido;
        $subst = '$1';
        $carnet = preg_replace($re, $subst, $cadena);

        $numeros = rand(10000,99999);
        $carnet .= $numeros;
        $this->view->carnet=$carnet;
   	}

   	public function updateAction()
   	{
        $asociado = Asociado::findFirstByIdAsociado($this->request->getPost("idAsociado"));
        $asociado->idAsociado = $this->request->getPost("idAsociado");
        $asociado->carnet = $this->request->getPost("carnet");
        $asociado->estado = 4;
        $asociado->save();


        $imagenCodificada = file_get_contents("php://input"); //Obtener la imagen
        if(strlen($imagenCodificada) <= 0) exit("No se recibió ninguna imagen");
        //La imagen traerá al inicio data:image/png;base64, cosa que debemos remover
        $imagenCodificadaLimpia = str_replace("data:image/png;base64,", "", urldecode($imagenCodificada));
            
        //Venía en base64 pero sólo la codificamos así para que viajara por la red, ahora la decodificamos y
        //todo el contenido lo guardamos en un archivo
        $imagenDecodificada = base64_decode($imagenCodificadaLimpia);
            
        //Calcular un nombre único
        $nombreImagenGuardada = $this->request->getPost("carnet"). ".png";
        $target = "files/";
        $fileTarget = $target.$nombreImagenGuardada;
            
        //Escribir el archivo
        $archivo = file_put_contents($nombreImagenGuardada, $imagenDecodificada);
        $result = move_uploaded_file($archivo,$fileTarget);
        
        if($result){
            $asociado->foto = $fileTarget;
        }

        //Terminar y regresar el nombre de la foto
        exit($nombreImagenGuardada);

        $asociado->save();


       /* $fileExistsFlag = 0; 
        $nombre = $_FILES['Filename']['name'];
        $usuario = $_POST['usuario'];
        $link = mysqli_connect("localhost","root","","epsilon") or die("Error ".mysqli_error($link));
         
        	//Checking whether the file already exists in the destination folder 
        
        $query = "SELECT nombre FROM documentos_anexos WHERE nombre='$nombre'";	
        $result = $link->query($query) or die("Error : ".mysqli_error($link));
        while($row = mysqli_fetch_array($result)) {
            if($row['nombre'] == $nombre) {
                $fileExistsFlag = 1;
            }		
        }
        
         	//If file is not present in the destination folder
        
        if($fileExistsFlag == 0) { 
            $target = "files/";		
            $fileTarget = $target.$nombre;	
            $tempFileName = $_FILES["Filename"]["tmp_name"];
            $fileDescription = $_POST['Description'];	
            $result = move_uploaded_file($tempFileName,$fileTarget);
            
            	//If file was successfully uploaded in the destination folder
            
            if($result) {
                $query = "INSERT INTO documentos_anexos(idDocAnexo,idAsociado,nombre,descripcion,ruta) VALUES ('NULL','$usuario','$nombre','$fileDescription','$fileTarget')";
                $link->query($query) or die("Error : ".mysqli_error($link));
                        header("Location: /asociado/confirma");
                
            }
            else {			
                header("Location: /asociado/error");
            }
            mysqli_close($link);
        }
        
        	//If file is already present in the destination folder
        
        else {

            header("Location: /asociado/error");
            mysqli_close($link);
        }*/


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