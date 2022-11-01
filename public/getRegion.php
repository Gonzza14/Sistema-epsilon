<?php 

require "db_config.php";

$id_pais = $_POST['id_pais'];

$queryM = mysqli_query($conn,"SELECT * FROM  region WHERE IDPAIS = '$id_pais' ");

while($rowM = mysqli_fetch_array($queryM)){
    
   $html = "<option value='".$rowM['IDREGION']."'>".$rowM['NOMBREREGION']."</option>";
  
  }
echo $html;


?>