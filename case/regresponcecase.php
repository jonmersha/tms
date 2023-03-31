<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("../config/index.php");
require_once("classes/newcase.php");
$con=  mysql_connect($host,$username,$password);

if(!$con){
    echo mysql_error();
    
}
    mysql_select_db($dbname, $con);
    $dates= date("Y-m-d h:i:s");    
 $newcase=new newcase();
 
  echo $newcase->AddnewCase($dates,$con);
   
