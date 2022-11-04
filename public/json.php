<?php 

require ('db_config.php');
          
if(isset($_POST['v1']))
    {
        // Getting the value of button
        // in $btnValue variable
        $btnValue = $_POST['v1'];

        $array = json_decode($btnValue, true); 
        foreach($array as $row) {
  
            // Database query to insert data 
            // into database Make Multiple 
            $queryM .= mysqli_query($conn,"INSERT INTO prueba VALUES ('', '".$row["name"]."', '".$row["lastName"]."'); ");
        }

         // Sending Response
        echo "Success";
    }

?>