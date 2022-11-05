<?php 

require ('db_config.php');

$id_pais = $_POST['id_pais'];

$queryM = mysqli_query($conn,"SELECT * FROM  pais WHERE idPais = '$id_pais' ");

while($rowM = mysqli_fetch_array($queryM)){
    
   $html = "<input placeholder='Codigo' name='codigo' class='form-control' value='".$rowM['codTelefono']."' readonly>";
  }
echo $html;

?>