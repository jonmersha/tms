<?php
require_once("../../config/index.php");
require_once '../../function/allfunc.php';
$_SESSION['path']="comm/case/EditeDelete.php/";
//$mypath="comm/caselist/Details.php?path=comm/caselist/Alllist.php";

function mycase($con,$rqtype){
    $swicher=0;
   //$sql="select caseid,date,userid from actions where actionperformed='create'";
   //$result=  mysqli_query($con,$sql);
    $sql="select * from caselist where status='$rqtype' ORDER BY caseid desc";
    $result=  mysqli_query($con,$sql);
   echo"<table width=95% id=tdt>
                <tr id=tdt>
                <td id=tdh><b>CaseID</b></td>
                <td id=tdh width=200><b>Title</b></td>
                <td id=tdh><b>Opened By</td>
                <td id=tdh><b>Requested By</td>
                <td id=tdh><b>Department</td>
                <td id=tdh><b>Team</td>
<td id=tdh><b>Assined to</td>                
</tr>";
   
   
while($row=mysqli_fetch_array($result))
       {
       
    if($rqtype==$row[3]){
        if($swicher==0){
           $trid='tr1';
           $swicher=1;
           
       }
       else{
           $trid='tr2';
           $swicher=0;
           
       }
       
         
    echo"<tr id=$trid onclick=loaddetails('mainb','comm/case/editDelete/Details.php',$row[0])>"
            . "<td>$row[0]</td><td>$row[1]</td>"
            . "<td>".creatorandtime($con,$row[0])."</td>"
            . "<td>$row[4]</td>"
            . "<td>$row[5]</td>"
            . "<td>$row[8]</td>"
            . "<td>".  GetReceivertime($con,$row[0])."</td></tr>";
}
    }
    echo"</table>";
}

?>
<table width=100%  id=tab1><tr>
        <td align="right">
            <div  align='left' onclick="loadXMLDoc('mainb','comm/caselist/listeach.php?status=Not Assined')"><a id=tr1><b>Un assigned Case</b></a></div>
            
                <?php  mycase($con,'Not Assined');?>
            
            <div  align='left' onclick="loadXMLDoc('mainb','comm/caselist/listeach.php?status=Assined')"><a id=tr1><b>Active Case</b></a></div>
                <?php  mycase($con,'Assined');?>
            <div  align='left' onclick="loadXMLDoc('mainb','comm/caselist/listeach.php?status=Resolved')"><a id=tr1><b>Resolved Case</b></a></div>
            
                <?php  mycase($con,'Resolved');?>
            
            
            <div  align='left' onclick="loadXMLDoc('mainb','comm/caselist/listeach.php?status=Closed')"><a id=tr1><b>Closed</b></a></div>
            
                <?php  //mycase('Closed');?>
        </td>
</tr>
</table>


