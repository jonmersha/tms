<?php
require_once("../../config/index.php");
require_once("../../function/allfunc.php");

    $id=$_GET['caseid'];
    $type=$_SESSION['Team'];
    $query="select * from caselist where caseid=$id";
    $result=  mysqli_query($con,$query);
    $caserow=  mysqli_fetch_array($result);
    echo"<table width=100% id=tab1>
        <tr align=right><td><table><tr><td >".
        "</td><td onclick=loadXMLDoc('mainb','{$_SESSION['path']}')>&#10096;&#10096;</td><td></td>
                </tr></table></td></tr>
        <tr><td>
            <table width=100% >
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
                <td align=left width=70%>
                    <table id=tdl>
                        <tr><td><h1>$caserow[1]</h1>$caserow[2]</td></tr>
                         <tr><td >".creator($con,$id)."</td></tr>
                         <tr><td>".AssignHistory($con,$id)."</td></tr>
                         <tr><td>".editedby($con,$id)."</td></tr>
                         <tr><td>".ResolveHistory($con,$id)."</td></tr>
                         <tr><td>".CloseHistory($con,$id)."</td></tr>
                    </table>
                </td>
                </tr>
            
                <tr></tr></table></td></tr>
    
</table>";
    ?>
