<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("../config/index.php");
$con=  mysql_connect($host,$username,$password);
namespace cases;
if(!$con){
    echo mysql_error();
    
}$colorSwicher=0;

    mysql_select_db($dbname, $con);
    $query="select * from caselist LIMIT 0, 12";
    $result=  mysql_query($query);
    echo"<table valign='top'>"
    . "<tr bgcolor='gray'>"
            . "<td >Caseid</td><td >Title</td><td >Status</td><td >Request date</td><td >Requested by</td><td >Case Opened by</td><td >RQ Departmetn</td><td >catagory</td><td >Actions</td>"
      . "</tr >";
    while($row=  mysql_fetch_array($result))
    {
        if($colorSwicher==0){
            $colorSwicher=1;
            
        
        echo"<tr bgcolor='#CCFFCC'>"
            . "<td>$row[0]</td><td>$row[1]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[10]</td>"
             . "<td><a href='#Casedetails' onclick=loadforms('mainb','case/Casedetails.php?caseid=$row[0]')>detail</a><a>Destroy</a><a>Edite</a></td>"
        . "</tr>";
        }
        else{
            $colorSwicher=0;
             echo"<tr bgcolor='#CCFFaa'>"
            . "<td>$row[0]</td><td>$row[1]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td><td>$row[10]</td>"
             . "<td><a href='#Casedetails' onclick=loadforms('mainb','case/Casedetails.php?caseid=$row[0]')>detail</a><a>Destroy</a><a>Edite</a></td>"
        . "</tr>";
            
        }
        
        
        
    }
    echo"</table>";
    ?>

