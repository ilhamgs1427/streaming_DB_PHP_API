<?php
   
     $host="localhost";
     $username="root";
     $password="";
     $db_name = "streaming";
     $connection= mysqli_connect($host,$username,$password,$db_name);

     if  (!$connection) {

        echo "Connection error";
     } 
?>     