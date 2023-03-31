<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("../config/index.php");
$con=  mysql_connect($host,$username,$password);

if(!$con){
    echo mysql_error();
    
}

    mysql_select_db($dbname, $con);
    function getid(){
    $caseid ="select count(id) as id from CasePriority";
    $results=mysql_query($caseid); 
    $rows=mysql_fetch_array($results);
    $row=$rows[0]+1;
    return $row;
  }
  //$catid=getid();
    $query="insert into CasePriority values( ".getid().",'$_GET[prname]')";
    if(!mysql_query($query))
        echo mysql_error ();
    else
        echo "new case priority added seccefully";
    


