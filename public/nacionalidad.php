<?php 

require ('db_config.php');

$id_pais = $_POST['id_pais'];

$queryM = mysqli_query($conn,"SELECT * FROM  pais WHERE idPais = '$id_pais' ");

while($rowM = mysqli_fetch_array($queryM)){
    
   $html = "<input placeholder='Nacionalidad' name='nac' class='form-control' value='".$rowM['nac']."' readonly>";
  }
echo $html;

?>