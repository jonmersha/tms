<?php
require_once("../../config/index.php");
session_start();
function mycase($rqtype){
    $swicher=0;
   $sql="select caseid,date,userid from actions where actionperformed='create'";
   $result=  mysql_query($sql);
   echo"<table width=95% id=tdt>
                <tr id=tdt>
                <td id=tdh width=200><b>Title</b></td>
                <td id=tdh><b>Opened By</td>
                <td id=tdh><b>Requested By</td>
                <td id=tdh><b>Department</td>
                <td id=tdh><b>Team</td></tr>";
   
while($row=mysql_fetch_array($result))
       {
    
        $userqery="SELECT f_name,m_name FROM `users`  where userid=$row[2]";
        $userresult=  mysql_query($userqery);
        $urow=  mysql_fetch_array($userresult);
        $csql="SELECT * FROM `caselist` where caseid=$row[0]";
        $rs=  mysql_query($csql);
        $crow=  mysql_fetch_array($rs);
      
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
            . "<td>$urow[0]--$urow[1]</td>"
            . "<td>$crow[4]</td>"
            . "<td>$crow[5]</td>"
            . "<td>$crow[8]</td></tr>";
}
    }
    echo"</table>";
}

?>
<table width=100%  id=tab1><tr>
        <td align="right">
            <div  align='left' onclick="loadXMLDoc('mainb','creator/listeach.php?status=Not Assined')"><a><b>assigned Case</b></a></div>
            
                <?php  mycase('Not Assined');?>
            
            <div  align='left' onclick="loadXMLDoc('mainb','creator/listeach.php?status=Assined')"><a><b>Active Case</b></a></div>
                <?php  mycase('Assined');?>
            <div  align='left' onclick="loadXMLDoc('mainb','creator/listeach.php?status=Resolved')"><a><b>Resolved Case</b></a></div>
            
                <?php  mycase('Resolved');?>
            
            
            <div  align='left' onclick="loadXMLDoc('mainb','creator/listeach.php?status=Closed')"><a><b>Closed</b></a></div>
            
                <?php  mycase('Closed');?>
        </td>
</tr>
</table>


