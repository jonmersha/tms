<?php
require_once("../config/index.php");
require_once("../function/allfunc.php");
$id=$_GET['caseid'];
  session_start();
  $type=$_SESSION['Team'];
    $query="select * from caselist where caseid=$id";
    $result=  mysql_query($query);
    $caserow=  mysql_fetch_array($result);
    echo "<table width=80% id=tab>
        <tr align=right><td><table><tr><td id=ass>Assign To".userselectot($type).
        "</td><td onclick=Assigncase('mainb','leader/save/saveassigment.php',$id)><div id=button align=center><b>Save</b></div></td><td></td>
                <td onclick=loadXMLDoc('mainb','homes/leaderhome.php')><div id=button align=center><b>Cancel</b></div></td></tr></table></td></tr>
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
                         <tr><td>".getcurrntload($type)."</td></tr>
                             
                         
                    </table>
                </td>
                </tr>
            
                <tr></tr></table></td></tr>
    <tr align=right><td><table><tr><td>Edite</td><td>Assign</td><td>Resolve</td><td oncklick=>Cancel</td></tr></table></th></tr>
</table>";
    function userselectot($team){
        $sql="select * from users where Team='$team'";
        $result=  mysql_query($sql);
        $rs="<select id=userid><option id='0'>select users</option>";
        
        while($row= mysql_fetch_array($result))
        {
        $rs=$rs."<option value=$row[0]>$row[2]-$row[3]</option>";
            
        }
       $rs=$rs."</select>"; 
        return $rs;  
    }
  function getcurrntload($team){
    
    $query="select * from users where Team='$team'";
    $result=  mysql_query($query);
    //echo"<table border=1><tr><td>";
    $rs="<table id=tab><tr><td>Name</td><td>CurrentLoad</td>";
    
    while($row=  mysql_fetch_array($result)){
        
     $rs=$rs."<tr id='tr1' onclick=getuser('leader/selectusser.php?team=$team','ass',$row[0])><td>$row[2]-$row[3]</td>";
     $query1="select count(userId) as CurrentLoad from AssignedCase where( (userid='$row[0]') and (CaseStatus=0)) group by userid";
     $result1=  mysql_query($query1);
     $row1=  mysql_fetch_array($result1);
    if($row1)
         $rs=$rs."<td>$row1[0]</td></tr></a>";
    else
       $rs=$rs. "<td>0</td></tr>";
     
     
    }
     $rs=$rs."</table>";
    return $rs;
   
            
            
        }
     
    
    ?>

