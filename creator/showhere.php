<?php
/*

 * forms that display cases created by users
 *  */
require_once("../config/index.php");
require_once("../function/allfunc.php");
$query="SELECT * FROM actions where actionperformed='create' and userid='$_GET[user]'";
$result=  mysql_query($query);
$caseno=  mysql_num_rows($result);
if($_GET[status]!='o'){
   $substr="and status='$_GET[status]'";
}
else{
    $substr="";
}
$swich=0;
$sql="select * from users where userid=$_GET[user]";
$resultu=  mysql_query($sql);
$rouser=  mysql_fetch_array($resultu);
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

while($row=  mysql_fetch_array($result)){
    $csql="SELECT * FROM `caselist` where (caseid=$row[0] $substr)";
   // echo $csql;
        $rs=  mysql_query($csql);
        $rownum=  mysql_num_rows($rs);
       if($rownum>0){
        $crow=  mysql_fetch_array($rs);
        
    if($swicher==0)
           {
           $trid='tr1';
           $swicher=1;
           
       }
       else{
           $trid='tr2';
           $swicher=0;
           
       }
       
       echo "<tr id=$trid><td>$row[0]</td><td>$crow[1]</td><td>$crow[8]</td><td>$crow[5]</td><td>$crow[4]</td><td>$row[3]</td><td>".GetReceiver($crow[0])."</td><td>". GetReceivertimeonly($crow[0])."</td><td>".getResolvetime($crow[0])."</td><td>$crow[3]</td></tr>";
    $data=$data."'$row[0],$crow[1],$crow[8],$crow[5],$crow[4]$row[3],".GetReceiver($crow[0])."',";
       }
    
}

echo "</table>";