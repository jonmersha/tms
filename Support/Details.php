<?php
require_once("../config/index.php");
require_once("../function/allfunc.php");

$id=$_GET['caseid'];
  session_start();
    $type=$_SESSION['Team'];
    $query="select * from caselist where caseid=$id";
    $result=  mysql_query($query);
    $caserow=  mysql_fetch_array($result);
    echo"<table width=80% id=tab>
        <tr align=right><td>
        <table><tr>
                <td  onclick=loaddetails('mainb','Support/Editecase.php',$id)><div id=button align=center><b>Edite</b></div></td>"
            . "
                <td onclick=loaddetails('mainb','Support/Resolve.php',$id)> <div id=button align=center><b>Resolve</b></div></td>
                 <td onclick=loadXMLDoc('mainb','homes/userhome.php')><div id=button align=center><b>Cancel</b></div></td></tr>
                 </table></th></tr>
        <tr><td>
            <table width=100%>
            <tr>
                <td width=30%>
                    <table width=100% id=tabin>
                        <tr><td ><h1>$caserow[0]</h1></td></tr>
                        <tr><td><b>priority</b><hr>$caserow[7]</td></tr>
                        <tr><td><b>Requester</b><hr>$caserow[4]</td></tr>
                        <tr><td><b>EXT</b><hr>$caserow[6]</td></tr>
                        <tr><td><b>Department</b><hr>$caserow[5]</td></tr>
                    </table>
                </td>
                <td align=center width=70%>
                    <table>
                        <tr><td id=tabin><h1>$caserow[1]</h1>$caserow[2]</td></tr>
                         <tr><td id=tabin>".creator($id)."</td></tr>
                         <tr><td id=tabin>".AssignHistory($id)."</td></tr>
                         <tr><td id=tabin>".editedby($id)."</td></tr>
                         <tr><td id=tabin>".ResolveHistory($id)."</td></tr>
                    </table>
                </td>
                </tr>
            
                <tr></tr></table></td></tr>
    <tr align=right>
    <td><table><tr>
                <td  onclick=loaddetails('mainb','Support/Editecase.php',$id)><div id=button align=center><b>Edite</b></div></td>"
            . "
                <td onclick=loaddetails('mainb','Support/Resolve.php',$id)> <div id=button align=center><b>Resolve</b></div></td>
                 <td onclick=loadXMLDoc('mainb','homes/leaderhome.php')><div id=button align=center><b>Cancel</b></div></td></tr>
                 </table> </th></tr>
</table>";
        
        
    
    ?>
