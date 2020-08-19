<?php
//connect to database
$conn = mysqli_connect('localhost', 'kelvin', 'kelvin@pizza', 'pizza_shop');

//check the connection


if(!$conn){

   echo "Connection error:" . mysql_connect_error();

}

?>