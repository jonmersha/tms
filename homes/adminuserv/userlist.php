<?php
//echo "done well";
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("../../config/index.php");
$con=  mysql_connect($host,$username,$password);

if(!$con)
    {
    
    echo mysql_error();
   }
   $colorSwitch=0;
   $serial=1;
  mysql_select_db($dbname, $con);
$query="select * from users where type='user'";
$result=  mysql_query($query);
echo"<table width='600'><tr bgcolor=yellow><th>No.<th>Name</th><th>F.Name</th><th>UserTeam</th></tr>";
    while($row=mysql_fetch_array($result)){
        if($colorSwitch==0){
            $colorSwitch=1;
        echo"<tr id='tr1' onclick=loadviews('loc','homes/adminuserv/usercase.php?userid=$row[0]')><th>$serial</th><td>$row[2]</td><td>$row[3]</td><td>$row[5]</td></tr>";
        }
 else {
     $colorSwitch=0;
     echo"<tr id='tr2'onclick=loadviews('loc','homes/adminuserv/usercase.php?userid=$row[0]')><th>$serial</th><td>$row[2]</td><td>$row[3]</td><td>$row[5]</td></tr>";
     
 }
 $serial++;
        
    }
    echo"</table>";
    ?>

