<?php
 $caseid=$_GET[caseid];
  
require_once("../../config/index.php");
require_once("../../case/classes/newcase.php");
require_once("../../function/Allfuncdbinsert.php");
require_once("../../function/allfunc.php");
  session_start();
  $id=$_GET[caseid];
  CaseAssignment($_GET[caseid],$_GET[userid],$_SESSION['userid']);
  updatecasestatus($caseid,'Assined');
   $query="select * from caselist where caseid=$id";
    $result=  mysqli_query($con,$query);
    $caserow=  mysqli_fetch_array($result);
    echo"<table width=100% id=tab>
        <tr align=right><td><table><tr><td >".
        "</td><td onclick=loadXMLDoc('mainb','creator/Alllist.php')>Back</td><td></td>
                
                </tr></table></td></tr>
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
                         <tr><td><b>CaseStatus</b><hr>$caserow[3]</td></tr>
                    </table>
                </td>
                <td align=center width=70%>
                    <table>
                        <tr><td><h1>$caserow[1]</h1>$caserow[2]</td></tr>
                         <tr><td>".creator($id)."</td></tr>
                         <tr><td>".AssignHistory($id)."</td></tr>
                         <tr><td>".editedby($id)."</td></tr>
                         <tr><td>".ResolveHistory($id)."</td></tr>
                         <tr><td>".CloseHistory($id)."</td></tr>
                    </table>
                </td>
                </tr>
                <tr></tr></table></td></tr>
</table>";
        
  ?>

