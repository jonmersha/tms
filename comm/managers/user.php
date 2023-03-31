<?php
require_once '../../config/index.php';
require_once '../../function/allfunc.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//echo "linked well";
//get user id
$userid=$_GET['userid'];
//echo "id=".$userid;
function getCases($st){
    $sql="SELECT * FROM AssignedCase where userId=CaseStatus=$st";
    $result=  mysql_query($sql);
    $rss="<table width=100% >
                <tr id=tdt>
                <td id=tdh width=200 ><b>Title</b></td>
                <td id=tdh><b>Opened By</td>
                <td id=tdh><b>Requester</td>
                <td id=tdh><b>Department</td></tr>";
    $sw=0;
    while($row=  mysql_fetch_array($result)){
        if($sw==0)
        {
            $sw=1;
            $id="tr1";
            
        }
        else
        {
            
            $sw=0;
            $id="tr2";
        }
        $Sql="SELECT * FROM `caselist` where `caseid`=$row[0]";
        $caseres=  mysql_query($Sql);
        $case=  mysql_fetch_array($caseres);
        
        $rss=$rss."<tr id=$id onclick=loadXMLDoc('mainb','comm/case/detail.php?caseid=$row[0]&source=comm/case/user.php?userid=$_GET[userid]')>
                    <td >$case[1]</td>
                    <td >".GetCreator($row[0])."</td>
                    <td >$case[4]</td>
                    <td >$case[5]</td>
                    
                  </tr>";
        
    }
    $rss=$rss."</table>";
    return $rss;
}
?>
<table width="100%">
    <tr><td id="tdhl" ><div >Activelll</div></td><td><div style="overflow:scroll; height:200px;" ><?php echo getCases(0);?></div></td></tr>
    <tr><td id="tdhl">Resolved</td><td><p></p><div style="overflow:scroll; height:200px;" ><?php echo getCases(1);?></div></td></tr>
    <tr><td id="tdhl">Closed</td><td><div style="overflow:scroll; height:200px;" ><?php echo getCases(2);?></div></td></tr>
</table>