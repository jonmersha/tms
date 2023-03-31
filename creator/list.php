<?php
require_once("../config/index.php");
require_once '../function/allfunc.php';
session_start();
function mycase($rqtype){
    $datas=null;
    $label=$rqtype." Case";
    if($rqtype=='Not Assined'){
        
        $label='Un assine dcase';
    }
    $swicher=0;
   $sql="select caseid,date from actions where (userid={$_SESSION['userid']} and actionperformed='create')";
   $result=  mysql_query($sql);
   $data="
       <td><table width=100% id=tab><tr><td>
            <div  onclick=loadXMLDoc('mainb','creator/listeach.php?status=$rqtype')>$label</div>
                <tr id=tdt>
                <td id=tdh width=200><b>Title</b></td>
                <td id=tdh><b>opend by</td>
                <td id=tdh><b>Opening time</td>
                <td id=tdh><b>Requester</td>
                <td id=tdh><b>Department</td>
                <td id=tdh><b>Team</td><td id=tdh><b>Assined to</td></tr>";
while($row=mysql_fetch_array($result))
       {
        $csql="SELECT * FROM `caselist` where (caseid=$row[0] and status='$rqtype')";
        $rs=  mysql_query($csql);
        $crow=  mysql_fetch_array($rs);
       if(mysql_num_rows($rs)>0){$datas=1; }
        
        
        if($swicher==0)
           {
           $trid='tr1';
           $swicher=1;
           
       }
       else{
           $trid='tr2';
           $swicher=0;
           
       }
   
    $data=$data."<tr id=$trid onclick=loaddetails('mainb','comm/caselist/Details.php',$row[0])>"
            . "<td>$crow[1]</td>"
            . "<td>". GetCreatoronly($crow[0])."</td>"
            . "<td>".getCasecreateTime($crow[0]) ."</td>"
            . "<td>$crow[4]</td>"
            . "<td>$crow[5]</td>"
            . "<td>$crow[8]</td>"
                . "<td>".  GetReceivertime($crow[0])."</td>"
            . "</tr>";
    //echo $data;



    }
   
    
 $swicher=1;  
$data=$data."</table>";
if($datas==null){
    return "";
}
else{
    echo $data;
    
    
}
}
mycase('Not Assined');
mycase('Assined');
mycase('Resolved');
mycase('Closed');
?>

        

