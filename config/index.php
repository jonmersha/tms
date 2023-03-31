<?php
$username="tms";
$password="Tms@123321";
$dbname="tms";
$host="localhost";
$con =  mysqli_connect($host,$username,$password);

if(!$con)
    {
    
    echo mysql_error();
   }
   else{
    mysqli_select_db($con,$dbname);
    try {
        //code...
        $result=mysqli_query($con,'SELECT * FROM users;');
        //echo $result;
    } catch (\Throwable $th) {
        //throw $th;
        echo $th;
    }
    
    //echo $result;
   }
  

