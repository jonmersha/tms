<?php
require_once("../../config/index.php");
require_once '../../function/allfunc.php';
session_start();
$_SESSION['path']="comm/caselist/Alllist.php";

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$mypath="comm/caselist/Details.php?path=comm/caselist/Alllist.php";

function mycase($rqtype){
    $swicher=0;
   $sql="select caseid,date,userid from actions where actionperformed='create' ORDER BY `actions`.`caseid` DESC";
   $result=  mysql_query($sql);
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
            . "<td>$crow[0]</td><td>$crow[1]</td>"
            . "<td>$urow[0]--$urow[1]</td>"
            . "<td>$crow[4]</td>"
            . "<td>$crow[5]</td>"
            . "<td>$crow[8]</td>"
            . "<td>".  GetReceivertime($crow[0])."</td></tr>";
}
    }
    echo"</table>";
}

?>
<table width=100%  id=tab1><tr>
        <td align="right">
            <div  align='left' onclick="loadXMLDoc('mainb','comm/caselist/listeach.php?status=Not Assined')"><a id=tr1><b>Un assigned Case</b></a></div>
            
                <?php  mycase('Not Assined');?>
            
            <div  align='left' onclick="loadXMLDoc('mainb','comm/caselist/listeach.php?status=Assined')"><a id=tr1><b>Active Case</b></a></div>
                <?php  mycase('Assined');?>
            <div  align='left' onclick="loadXMLDoc('mainb','comm/caselist/listeach.php?status=Resolved')"><a id=tr1><b>Resolved Case</b></a></div>
            
                <?php  mycase('Resolved');?>
            
            
            <div  align='left' id='closed' onclick="loadXMLDoc('closed','comm/caselist/listeach.php?status=Closed')"><a id=tr1><b>show Closed</b></a></div>
            
                <?php  //mycase('Closed');?>
        </td>
</tr>
</table>

