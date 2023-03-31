<?php
require_once("../../config/index.php");
session_start();
$_SESSION['path']="comm/caselist/list.php";

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function mycase($rqtype){
    $swicher=0;
   $sql="select caseid,date from actions where userid={$_SESSION['userid']} and actionperformed='create'";
   $result=  mysqli_query($con,$sql);
   echo"<table width=100%>
                <tr id=tdt>
                <td id=tdh width=200><b>Title</b></td>
                <td id=tdh><b>Opening time</td>
                <td id=tdh><b>Requested By</td>
                <td id=tdh><b>Department</td>
                <td id=tdh><b>Team</td></tr>";
while($row=mysqli_fetch_array($result))
       {
     if($swicher==0){
           $trid='tr1';
           $swicher=0;
           
       }
       else{
           $trid='tr2';
           $swicher=1;
           
       }
        $csql="SELECT * FROM `caselist` where caseid=$row[0]";
        $rs=  mysqli_query($con,$csql);
        $crow=  mysqli_fetch_array($rs);
       if($swicher==0){
           $trid='tr1';
           $swicher=0;
           
       }
       else{
           $trid='tr2';
           $swicher=1;
           
       }
    if($rqtype==$crow[3]){
    echo"<tr id=$trid onclick=loaddetails('mainb','creator/Details.php',$row[0])>"
            . "<td>$crow[1]</td>"
            . "<td> $row[1]</td>"
            . "<td>$crow[4]</td>"
            . "<td>$crow[5]</td>"
            . "<td>$crow[8]</td></tr>";
}
    }
    echo"</table>";
    
}
function Allcase($rqtype){}
?>
<table width=100%><tr>
        <td>
            <div  align='center' onclick="loadXMLDoc('mainb','creator/listeach.php?status=Not Assined')">New Cases</div>
            <?php  mycase('Not Assined');?>
            <div  align='center' onclick="loadXMLDoc('mainb','creator/listeach.php?status=Assined')">Active Case</div>
                <?php  mycase('Assined');?>
            <div id=link align='center' onclick="loadXMLDoc('mainb','creator/listeach.php?status=Resolved')">Resolved Case</div>
                <?php  mycase('Resolved');?>
            <div id=link align='center' onclick="loadXMLDoc('mainb','creator/listeach.php?status=Closed')">Closed</div>
                <?php  mycase('Closed');?>
        </td>
</tr>
</table>


