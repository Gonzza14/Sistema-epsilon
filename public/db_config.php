<?php 
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname= 'epsilon';
$conn = mysqli_connect($servername,$username,$password,"$dbname");

if(!$conn){
    die('Could no conect:'.mysqli_error());
}
?>