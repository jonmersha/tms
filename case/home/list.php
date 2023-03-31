<table align="left">
    <tr><td>cases not yet resolved</td><td ></td></tr>
    <tr>
        <td>
<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once("../../config/index.php");
$con=  mysql_connect($host,$username,$password);

if(!$con){
    echo mysql_error();
    
}$colorSwicher=0;

    mysql_select_db($dbname, $con);
    $userid=$_SESSION['userid'];
   $query=" SELECT  `caselist`.`caseid` ,  `caselist`.`title` ,  `AssignedCase`.`Assignmenttime` 
FROM caselist
LEFT JOIN  `DBESupport`.`AssignedCase` ON  `caselist`.`caseid` =  `AssignedCase`.`CaseId` 
WHERE (
AssignedCase.casestatus =0
AND AssignedCase.userid ={$userid}
)
LIMIT 0 , 30";
   // $query="select * from caselist LIMIT 0, 12";
    $result=  mysql_query($query);
    echo "the id is".$userid;
    echo"<table valign='top'>"
    . "<tr bgcolor='gray'>"
            . "<td >Caseid</td><td >Title</td><td >Assined time</td><td >Actions</td>"
      . "</tr >";
    while($row=  mysqli_fetch_array($result))
    {
        if($colorSwicher==0){
            $colorSwicher=1;
            
        
        echo"<tr bgcolor='#CCFFCC'>"
            . "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td>"
             . "<td><a href='#Casedetails' onclick=loadforms('homeaction','case/home/details.php?caseid=$row[0]')>detail</a><a>Edite</a></td>"
        . "</tr>";
        }
        else{
            $colorSwicher=0;
             echo"<tr bgcolor='#CCFFaa'>"
            . "<td>$row[0]</td><td>$row[1]</td><td>$row[2]</td>"
             . "<td><a href='#Casedetails' onclick=loadforms('homeaction','case/home/details.php?caseid=$row[0]')>detail</a><a>Edite</a></td>"
        . "</tr>";
            
        }
        
        
        
    }
    echo"</table>";
    
    ?>
            </td>
            <td id="homeaction"></td>
    </tr>
</table>
