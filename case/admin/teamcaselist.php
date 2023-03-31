<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("../../config/index.php");
$con=  mysql_connect($host,$username,$password);

if(!$con){
    echo mysql_error();
    
}
mysql_select_db($dbname, $con);
$query="select * from caselist";
echo"Assin case to selected xxxx xxxxx";
$result=  mysql_query($query);
echo"<table><tr><td>Caseid</td>Title<td></td><td>Creation Date</td><td>Requester</td><td>TaskPriority</td></tr>";
while($row=mysql_fetch_array($result)){
}


