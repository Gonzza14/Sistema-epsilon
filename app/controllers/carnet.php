<?php
    $imagenCodificada = file_get_contents("php://input"); //Obtener la imagen
    if(strlen($imagenCodificada) <= 0) exit("No se recibió ninguna imagen");
    //La imagen traerá al inicio data:image/png;base64, cosa que debemos remover
    $imagenCodificadaLimpia = str_replace("data:image/png;base64,", "", urldecode($imagenCodificada));
        
    //Venía en base64 pero sólo la codificamos así para que viajara por la red, ahora la decodificamos y
    //todo el contenido lo guardamos en un archivo
    $imagenDecodificada = base64_decode($imagenCodificadaLimpia);
        
    //Calcular un nombre único
    $nombreImagenGuardada = "foto_" . uniqid() . ".png";
    $target = "files/";
    $fileTarget = $target.$nombreImagenGuardada;
        
    //Escribir el archivo
    $archivo = file_put_contents($nombreImagenGuardada, $imagenDecodificada);
    $result = move_uploaded_file($nombreImagenGuardada,$fileTarget);
    
    if($result){
        exit($nombreImagenGuardada);
    }


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
        <a href="../carnet">
        <input class="btn btn-primary"  value="Regresar"type="button">
        </a>
        </div>';
    } else{
        echo '<div class="alert alert-success" role="alert">
        El carnet fue creado con exito
        </div>
        <div>
        <a href="../carnet">
        <input class="btn btn-primary"  value="Regresar"type="button">
        </a>
        </div>';
    }