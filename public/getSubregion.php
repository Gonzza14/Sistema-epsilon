<?php 

require ('db_config.php');

$id_region = $_POST['id_region'];

$queryS = mysqli_query($conn,"SELECT * FROM  subregion WHERE IDREGION = '$id_region' ");

$html ="<option value='0'>Seleccionar Subregion</option>";
while($rowM = mysqli_fetch_array($queryS)){
    
   $html .= "<option value='".$rowM['IDSUBREGION']."'>".$rowM['NOMBRESUBREGION']."</option>";
  
  }
echo $html;

?>