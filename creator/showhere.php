<?php

try {
    //code...

require_once("../config/index.php");
require_once("../function/allfunc.php");

$query="SELECT * FROM actions where actionperformed='create' and userid='$_GET[user]'";

$result=  mysqli_query($con,$query);
$caseno=  mysqli_num_rows($result);
if($_GET['status']!='o'){
   $substr="and status='$_GET[status]'";
}
else{
    $substr="";
}
$swich=0;
$sql="select * from users where userid=$_GET[user]";

$resultu=  mysqli_query($con,$sql);
$rouser=  mysqli_fetch_array($resultu);
echo "total of $caseno Cases created by_$rouser[2] $rouser[3]";
echo"<td><table width=100% id=tab><tr><td>
            <div  onclick=loadXMLDoc('mainb','creator/listeach.php?status=$rqtype')>$label</div>
                <tr id=tdt>
                <td id=tdh><b>Case Id</b></td>
                <td id=tdh><b>Title</b></td>
                <td id=tdh><b>Team</td>
                <td id=tdh><b>Department</td>
                <td id=tdh><b>Requested by</td>
                <td id=tdh><b>Request time</td>
                <td id=tdh><b>Assined To</td>
                <td id=tdh><b>Asigned at</td>
                <td id=tdh><b>Resolved at</td>
                <td id=tdh><b>Status</td>
                </tr>";

while($row=  mysqli_fetch_array($result)){
    $csql="SELECT * FROM `caselist` where (caseid=$row[0] $substr)";
  
        $rs=  mysqli_query($con,$csql);
        $rownum=  mysqli_num_rows($rs);
       if($rownum>0){
        $crow=  mysqli_fetch_array($rs);
        
    if($swicher==0)
           {
           $trid='tr1';
           $swicher=1;
           
       }
       else{
           $trid='tr2';
           $swicher=0;
           
       }
       
       echo "<tr id=$trid>
       <td>$row[0]</td>
       <td>$crow[1]</td>
       <td>$crow[8]</td>
       <td>$crow[5]</td>
       <td>$crow[4]</td>
       <td>$row[3]</td>
       <td>".GetReceiver($con,$crow[0])."</td>
       <td>". GetReceivertimeonly($con,$crow[0])."</td>
       <td>".getResolvetime($con,$crow[0])."</td>
       <td>$crow[3]</td></tr>";
    $data=$data."'$row[0],$crow[1],$crow[8],$crow[5],$crow[4]$row[3],".GetReceiver($con,$crow[0])."',";
       
       }
    
}

echo "</table>";

} catch (\Throwable $th) {
    echo $th;
}