<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("../../../config/index.php");
$con=  mysql_connect($host,$username,$password);

if(!$con)
    {
    
    echo mysql_error();
   }
  mysql_select_db($dbname, $con);
$id=$_GET[id];
$query="update users set confirmed=1 where userid='$id'";
if(!mysqli_query($con,$query))
{
    echo mysql_error();
}
else{
    echo"userconfirmed <a href=''>backTolist</a>";
}

