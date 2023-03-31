<?php
//this table shows assined case not yet solved by user and resolved case
require_once("../../config/index.php");
$con=  mysql_connect($host,$username,$password);

if(!$con){
    echo mysql_error();
    
}$colorSwicher=0;

    mysql_select_db($dbname, $con);
    $userid=$_GET['userid'];
   $query=" SELECT  `caselist`.`caseid` ,  `caselist`.`title` ,  `AssignedCase`.`Assignmenttime` 
FROM caselist
LEFT JOIN  `DBESupport`.`AssignedCase` ON  `caselist`.`caseid` =  `AssignedCase`.`CaseId` 
WHERE (
AssignedCase.casestatus =0
AND AssignedCase.userid ={$userid}
)
LIMIT 0 , 30";
$query2=" SELECT  `caselist`.`caseid` ,  `caselist`.`title` ,  `AssignedCase`.`Assignmenttime` 
FROM caselist
LEFT JOIN  `DBESupport`.`AssignedCase` ON  `caselist`.`caseid` =  `AssignedCase`.`CaseId` 
WHERE (
AssignedCase.casestatus =1
AND AssignedCase.userid ={$userid}
)
LIMIT 0 , 30";
   // $query="select * from caselist LIMIT 0, 12";
    $result=  mysql_query($query);
    //echo "the id is".$userid;
    echo "Cases assined to user but not yet resolved";
    echo"<table valign='top' align=left>"
    . "<tr bgcolor='gray'>"
            . "<td >Caseid</td><td >Title</td><td >Assined time</td><td >Actions</td>"
      . "</tr >";
    while($row=  mysql_fetch_array($result))
    {
        if($colorSwicher==0){
            $colorSwicher=1;
            
        
        echo"<tr id='tr1'>"
            . "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td>"
             . "<td><a href='#Casedetails' onclick=loadviews('thisloc','homes/adminuserv/casedetails.php?caseid=$row[0]')>detail</a></td>"
        . "</tr>";
        }
        else{
            $colorSwicher=0;
             echo"<tr id='tr2'>"
            . "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td>"
             . "<td><a href='#Casedetails' onclick=loadviews('thisloc','homes/adminuserv/casedetails.php?caseid=$row[0]')>detail</a></td>"
        . "</tr>";
            
        }
 
    }
    echo"</table><br/><hr>";
    
    $result=  mysql_query($query2);
    //echo "the id is".$userid;
    echo "Resolved Cases";
    echo"<table valign='top' align=left>"
    . "<tr bgcolor='gray'>"
            . "<td >Caseid</td><td >Title</td><td >Assined time</td><td >Actions</td>"
      . "</tr >";
    while($row=  mysql_fetch_array($result))
    {
        if($colorSwicher==0){
            $colorSwicher=1;
            
        
        echo"<tr id='tr1'>"
            . "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td>"
             . "<td><a href='#Casedetails' onclick=loadviews('thisloc','homes/adminuserv/casedetails.php?caseid=$row[0]')>detail</a></td>"
        . "</tr>";
        }
        else{
            $colorSwicher=0;
             echo"<tr id='tr2'>"
            . "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td>"
             . "<td><a href='#Casedetails' onclick=loadviews('thisloc','homes/adminuserv/casedetails.php?caseid=$row[0]')>detail</a></td>"
        . "</tr>";
            
        }
 
    }
    echo"</table>";
    
    
    ?>
<div id='thisloc'>division</div>

