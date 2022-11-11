<?php

    $fileExistsFlag = 0; 
    $nombre = $_FILES['Filename']['name'];
    $usuario = $_POST['usuario'];
    $link = mysqli_connect("localhost","root","","epsilon") or die("Error ".mysqli_error($link));
    /* 
    *   Checking whether the file already exists in the destination folder 
    */
    $query = "SELECT nombre FROM documentos_anexos WHERE nombre='$nombre'"; 
    $result = $link->query($query) or die("Error : ".mysqli_error($link));
    while($row = mysqli_fetch_array($result)) {
        if($row['nombre'] == $nombre) {
            $fileExistsFlag = 1;
        }       
    }
    /*
    *   If file is not present in the destination folder
    */
    if($fileExistsFlag == 0) { 
        $target = "files/";     
        $fileTarget = $target.$nombre;  
        $tempFileName = $_FILES["Filename"]["tmp_name"];
        $fileDescription = $_POST['Description'];   
        $result = move_uploaded_file($tempFileName,$fileTarget);
        /*
        *   If file was successfully uploaded in the destination folder
        */
        if($result) {
            $query = "INSERT INTO documentos_anexos(idAsociado,nombre,descripcion,ruta) VALUES ('$usuario','$nombre','$fileDescription','$fileTarget')";
            $link->query($query) or die("Error : ".mysqli_error($link));
                    header("Location: /asociado/confirma");
            
        }
        else {          
            header("Location: /asociado/error");
        }
        mysqli_close($link);
    }
    /*
    *   If file is already present in the destination folder
    */
    else {

        header("Location: /asociado/error");
        mysqli_close($link);
    }   
?>
