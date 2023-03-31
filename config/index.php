<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//session_start();
$username="tms";
$password="Tms@123321";
$dbname="tems";
$host="localhost";
$con=  mysqli($host,$username,$password,3306);

if(!$con)
    {
    
    echo mysql_error();
   }
  mysql_select_db($dbname, $con);
  
  
  ///////////////////////////////