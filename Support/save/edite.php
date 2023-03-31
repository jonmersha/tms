<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once('../../function/Allfuncdbinsert.php');
require_once('../../function/allfunc.php');
require_once '../../config/index.php';


  mysql_select_db($dbname, $con);
  session_start();
$id=$_GET['caseid'];
$userid=$_GET['userid'];
$description=$_GET['desc'];
editeCase($id,$userid,$description);
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



