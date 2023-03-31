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
    $query="select * from users";
    $result=  mysql_query($query);
    echo"<table border=1><tr><td>";
    echo"<table><tr><th>User </th><th>CurrentLoad</th>";
    
    while($row=  mysqli_fetch_array($result))
                {
         echo "<tr id='trhover2' onclick=getuser('case/admin/userdetailsAss.php','users',$row[0])><td>$row[2]-$row[3]</td>";
     $query1="select count(userId)as CurrentLoad from AssignedCase where( (userid='$row[0]') and (CaseStatus=0)) group by userid";
     $result1=  mysql_query($query1);
     $row1=  mysqli_fetch_array($result1);
    if($row1)
         echo "<td>$row1[0]</td></tr></a>";
    else
        echo "<td>0</td></tr>";
     
     
    }
    echo "</table>";
    
    echo"</td>"
    . "<td width=30%>"
        . "<table>"
            . "<tr><td id=cased>users Not selected</td></tr>"
            . "<tr><td id=users>caseNot Selected</td></tr>"
            . "<tr><td><input type=button value=Assign onclick=Assignment('case/admin/Assign.php','responceassign') /></td></tr>"
                . "<tr><td id=responceassign></td><tr>"
       . "</table> "
    . "</td><td>Case list ";
    $query="select * from caselist limit 0,10";
    $result=  mysql_query($query);
    echo "<table><tr><a href='#xmf'><td>CaseTitile</td>"
    . "<td>Description</td><td>CreationTime</td><td>"
            . "Requiester</td></tr>";
    while($row=  mysqli_fetch_array($result))
                {
        echo"<tr id='trhover2' onclick=getuser('case/admin/casedetailsAss.php','cased',$row[0])><td>$row[1]</td>"
                . "<td>$row[2]</td><td>$row[4]</td><td>$row[5]</td>"
                . "</tr>";
        
        
    }
    
    echo"</table>";
          echo"</td></tr></table>";
    

