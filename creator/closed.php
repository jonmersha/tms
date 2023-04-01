<?php
require_once("../config/index.php");
require_once '../function/allfunc.php';
$_SESSION['path']="comm/caselist/Alllist.php";

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$mypath="comm/caselist/Details.php?path=comm/caselist/Alllist.php";

function mycase($con,$rqtype){
    $swicher=0;
   $sql="select caseid,date,userid from actions where actionperformed='create' ORDER BY `actions`.`caseid` DESC";
   $result=  mysqli_query($con,$sql);
   echo"<table width=95% id=tdt>
                <tr id=tdt>
                <td id=tdh><b>Case Id</b></td>
                <td id=tdh width=200><b>Title</b></td>
                <td id=tdh><b>Opened By</td>
                <td id=tdh><b>Requested By</td>
                <td id=tdh><b>Department</td>
                <td id=tdh><b>Team</td>
<td id=tdh><b>Assined to</td>                
</tr>";
   
while($row=mysqli_fetch_array($result))
       {
    
        $userqery="SELECT f_name,m_name FROM `users`  where userid=$row[2]";
        $userresult=  mysqli_query($con,$userqery);
        $urow=  mysqli_fetch_array($userresult);
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
            . "<td>$crow[0]</td><td>$crow[1]</td>"
            . "<td>$urow[0]--$urow[1]</td>"
            . "<td>$crow[4]</td>"
            . "<td>$crow[5]</td>"
            . "<td>$crow[8]</td>"
            . "<td>".  GetReceivertime($con,$crow[0])."</td></tr>";
}
    }
    echo"</table>";
}

?>
<table width=100%  id=tab1><tr>
        <td align="right">
                <?php  mycase($con, 'Closed');?>
        </td>
</tr>
</table>


