<?php
require_once("../config/index.php");
require_once '../function/allfunc.php';
session_start();
$_SESSION['path']="managersReport/list.php";
function mycase1($rqtype){
    $swicher=0;
   $sql="select caseid,date from actions";
   $result=  mysqli_query($con,$sql);
   echo"
                <tr id=tdt>
                <td id=tdh width=200><b>Title</b></td>
                <td id=tdh><b>opend by</td>
                <td id=tdh><b>Opening time</td>
                <td id=tdh><b>Requester</td>
                <td id=tdh><b>Department</td>
                <td id=tdh><b>Team</td><td id=tdh><b>Assined to</td></tr>";
while($row=mysqli_fetch_array($result))
       {
        $csql="SELECT * FROM `caselist` where caseid=$row[0]";
        $rs=  mysqli_query($con,$csql);
        $crow=  mysqli_fetch_array($rs);
      if($rqtype==$crow[3]){   
       if($swicher==0){
           $trid='tr1';
           $swicher=1;
           
       }
       else{
           $trid='tr2';
           $swicher=0;
           
       }
   
    echo"<tr id=$trid onclick=loaddetails('mainb','comm/caselist/Details.php',$row[0])>"
            . "<td>$crow[1]</td>"
            . "<td>".  GetCreatoronly($crow[0])."</td>"
            . "<td>".getCasecreateTime($crow[0]) ."</td>"
            . "<td>$crow[4]</td>"
            . "<td>$crow[5]</td>"
            . "<td>$crow[8]</td>"
                . "<td>".  GetReceivertime($crow[0])."</td>"
            . "</tr>";
}
    }
       
    
 $swicher=1;   
}
function Allcase($rqtype){}
function mycase($rqtype){
    $swicher=0;
   $sql="select caseid,date,userid from actions where actionperformed='create' ORDER BY `actions`.`caseid` DESC";
   $result=  mysqli_query($con,$sql);
   echo"
                <tr>
                <td id=tdh><b>Case Id</b></td>
                <td id=tdh width=200><b>Title</b></td>
                <td id=tdh><b>Opened By</td>
                <td id=tdh><b>Requested By</td>
                <td id=tdh><b>Department</td>
                <td id=tdh><b>Team</td></tr>";
while($row=mysqli_fetch_array($result))
       {
        $userqery="SELECT f_name,m_name FROM `users`  where userid=$row[2]";
        $userresult=  mysqli_query($con,$userqery);
        $urow=  mysqli_fetch_array($userresult);
        $csql="SELECT * FROM `caselist` where caseid=$row[0]";
        $rs=  mysqli_query($con,$csql);
        $crow=  mysqli_fetch_array($rs);
       if($swicher==0){
           $trid='tr1';
           $swicher=1;
           
       }
       else{
           $trid='tr2';
           $swicher=0;
           
       }
    if($rqtype==$crow[3]){
    echo"<tr id=$trid onclick=loaddetails('mainb','comm/caselist/Details.php',$row[0])>"
            . "<td>$crow[0]</td><td>$crow[1]</td>"
            . "<td>$urow[0]--$urow[1]</td>"
            . "<td>$crow[4]</td>"
            . "<td>$crow[5]</td>"
            . "<td>$crow[8]</td></tr>";
}
    }
    echo"</table>";
    
}
?>
<table width=100%><tr>
        <td><table width=100%><tr><td>
            <div  onclick="loadXMLDoc('mainb','creator/listeach.php?status=Not Assined')">Un assigned Cases</div>
            <?php  mycase('Not Assined');?>
            </table>
            <table width=100% id=tab><tr><td>
            <div  onclick="loadXMLDoc('mainb','creator/listeach.php?status=Assined')">Active Case</div>
                <?php  mycase('Assined');?>
            </table>
            <table width=100% id=tab><tr><td>
            <div  onclick="loadXMLDoc('mainb','creator/listeach.php?status=Resolved')">Resolved Case</div>
                <?php  mycase('Resolved');?>
            </table>
            <table width=100% id=tab><tr><td>
            <div  onclick="loadXMLDoc('mainb','creator/listeach.php?status=Closed')">Closed</div>
                <?php  mycase('Closed');?>
            </table>
        </td>
</tr>
</table>


