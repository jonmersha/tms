<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once '../../../config/index.php';
require_once '../../../function/allfunc.php';
if($_GET[status]==0)
{
    $mess="No assined Case to ";
}
if($_GET[status]==1)
{
    $mess="No Cases Resolved yet by";
}
if($_GET[status]==2)
{
    $mess="No closed cases for ";
}


echo"<br><table width=100% id=tab1> "
. "<tr id=tdh>"
        . "<td id=tdh onclick=loadXMLDoc('mainb','comm/userscase/Alluser/index.php?status=0')>Assined</td>"
        . "<td  id =tdh onclick=loadXMLDoc('mainb','comm/userscase/Alluser/index.php?status=1')>Resolved</td>"
        . "<td id=tdh onclick=loadXMLDoc('mainb','comm/userscase/Alluser/index.php?status=2')>Closed</td></tr></table><br>";

//Get All users from Userlist
$query="SELECT * from users";
if(!mysqli_query($con,$query))
    {
    echo mysql_error();
    
    }
    $swicher=0;
$result=  mysqli_query($con,$query);
//echo mysql_num_rows($result);
while($users=  mysqli_fetch_array($result)){
    
    $cont="SELECT * from AssignedCase where userId=$users[0] and CaseStatus=$_GET[status]";
    if(!mysqli_query($con,$cont)){echo mysql_error();}
    $result1=mysqli_query($con,$cont);
    $rownumber=  mysql_num_rows($result1);
    
    echo "<table width=100%>"
    . "<tr width=100% id=tdt>
           <td align=left>
            <table width=100% >
            <tr width=100%><td  width=400 id=tdh><b>$users[2]-$users[3]</b></td><td id=tdh width=*><b>$rownumber:Cases</b></td></tr>
            </table>
          </td>
       </tr><tr><td align=right>";
    if($rownumber>0){
        echo"<table width=95% id=tab1><tr>"
                . "<td id=tdh><b>Title</b></td>"
                . "<td id=tdh><b>Opened By</b></td>"
                . "<td id=tdh><b>Assined By</b></td>"
                . "<td id=tdh><b>Department</b></td>"
                . "<td id=tdh><b>Priority</b></td>"
                . "</tr>";
    }
    else{
        echo "<div>$mess: $users[2]-$users[3]</div>";
        
    }

    
    //get total numbers of active cases assined to given users
    
    
    
    while($caseid= mysqli_fetch_array($result1))
          {
        //get case details
        $sqlcase="SELECT * FROM caselist where caseid=$caseid[0]";
         
        if(!mysqli_query($con,$sqlcase)){echo mysql_error();}
        $caseresult=mysqli_query($con,$sqlcase);
        $caserow=  mysqli_fetch_array($caseresult);
        $creator=  GetCreator($caseid[0]);
        $assigner=  GetAssigner($caseid[0]);
        
        if($swicher==0){
            $swicher=1;
            $id="tr1";
        }
 else {
            $swicher=0;
            $id="tr2";
     
 }
        echo "<tr id=$id onclick=loaddetails('mainb','creator/Details.php',$caserow[0])>"
                . "<td >$caserow[1]</td>"
                . "<td >$creator</td>"
                . "<td >$assigner</td>"
                . "<td >$caserow[5]</td>"
                . "<td >$caserow[7]</td>"
                . "</tr>";
            }
            
        
    if($rownumber>0){
        echo"</table>";
    }
    echo"</td></tr></table>";
    
}
?>
<table width=100% id=tdh><tr><td></td><td></td><td></td></tr></table>

