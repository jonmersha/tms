<?php
require_once("../config/index.php");
require_once("../function/allfunc.php");

$con=  mysql_connect($host,$username,$password);
$id=$_GET['caseid'];
if(!$con)
    {
    
    echo mysql_error();
   }
  mysql_select_db($dbname, $con);
  session_start();
  //echo "limat".$id;
  $type=$_SESSION['Team'];
    $query="select * from caselist where caseid=$id";
    $result=  mysqli_query($con,$query);
    $caserow=  mysqli_fetch_array($result);
    echo"<table width=80% id=tab>
        <tr align=right><td>
        <table><tr>
        <td onclick=loaddetails('mainb','leader/Editecase.php',$id)><div id=button align=center><b>Edite</b></div></td>"
            . "<td onclick=loaddetails('mainb','leader/Assigncase.php',$id)><div id=button align=center><b>Assign</td>
                <td><div id=button align=center><b>Resolve</td><td onclick=loadXMLDoc('mainb','homes/leaderhome.php')><div id=button align=center><b>Cancel</td></tr></table>
                
</th></tr>
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
    <tr align=right><td>
    
    <table><tr>
        <td onclick=loaddetails('mainb','leader/Editecase.php',$id)><div id=button align=center><b>Edite</b></div></td>"
            . "<td onclick=loaddetails('mainb','leader/Assigncase.php',$id)><div id=button align=center><b>Assign</td>
                <td><div id=button align=center><b>Resolve</td><td onclick=loadXMLDoc('mainb','homes/leaderhome.php')><div id=button align=center><b>Cancel</td></tr></table>
   
    
</th></tr>
</table>";
        
        
    
    ?>
