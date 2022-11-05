<?php 

require ('db_config.php');
          
if(isset($_POST['jason']))
    {
        // Getting the value of button
        // in $btnValue variable
        $jasonArray = $_POST['jason'];

        $array = json_decode($jasonArray, true); 
        foreach($array as $row) {
            // Database query to insert data 
            // into database Make Multiple 
            $queryM .= mysqli_query($conn,"INSERT INTO beneficiario VALUES ('','1','".$row["v1"]."', '".$row["v2"]."','".$row["v3"]."','".$row["v4"]."','".$row["v5"]."','".$row["v6"]."','".$row["v7"]."'); ");
        }

         // Sending Response
        echo "Success";
    }

?>