<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

//SELECT * FROM `ResolvedReport`
require_once('../../function/Allfuncdbinsert.php');
require_once('../../function/allfunc.php');
require_once '../../config/index.php';
//echo "linked well";
session_start();
$id=$_GET['caseid'];
$userid=$_GET['userid'];
$description=$_GET['desc'];
//editeCase($id,$userid,$description);
$sql="select userid from actions where caseid=$id and actionperformed='Assign'";
$query=  mysqli_query($con,$sql);
$row=  mysqli_fetch_array($query);

updatecasestatus($id,'Resolved');
ResolveCase($id,$row[0],$description,$userid);
updateassignment($id,1);
//echo loadXMLDoc('cssmenu','menu/usmenu.php'),loadXMLDoc('mainb','homes/userhome.php'); 
//loaddetails('mainb','Support/Details.php',$id);
//echo $row[0]; 
$query="select * from caselist where caseid=$id";
    $result=  mysqli_query($con,$query);
    $caserow=  mysqli_fetch_array($result);
    echo"<table width=100% id=tab>
        <tr align=right><td>
        <table><tr><td onclick=loaddetails('mainb','homes/userhome.php',$id)><div id=button align=center><b>Back</b></div></td>"
            . "<td onclick=loaddetails('mainb','Support/Resolve.php',$id)><div id=button align=center><b>Resolve</b></div></td>
                </tr></table>
                </td></tr>
        <tr><td>
            <table width=100%>
            <tr>
                <td width=30%>
                    <table width=100%>
                        <tr><td><h1>$caserow[0]</h1></td></tr>
                        <tr><td><b>priority</b><hr>$caserow[7]</td></tr>
                        <tr><td><b>Requester</b><hr>$caserow[4]</td></tr>
                        <tr><td><b>EXT</b><hr>$caserow[6]</td></tr>
                        <tr><td><b>Department</b><hr>$caserow[5]</td></tr>
                    </table>
                </td>
                <td align=center width=70%>
                    <table>
                        <tr><td><h1>$caserow[1]</h1>$caserow[2]</td></tr>
                         <tr><td>".creator($id)."</td></tr>
                         <tr><td>".AssignHistory($id)."</td></tr>
                         <tr><td>".editedby($id)."</td></tr>
                         <tr><td>".ResolveHistory($id)."</td></tr>
                    </table>
                </td>
                </tr>
            
                <tr></tr></table></td></tr>
    <tr align=right><td><table><tr><td onclick=loaddetails('mainb','homes/userhome.php',$id)><div id=button align=center><b>Back</b></div></td>"
            . "<td onclick=loaddetails('mainb','Support/Resolve.php',$id)><div id=button align=center><b>Resolve</b></div></td>
                </tr></table>    </th></tr>
</table>";
        
