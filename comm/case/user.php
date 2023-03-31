<?php
require_once '../../config/index.php';
require_once '../../function/allfunc.php';


$userid=$_GET['userid'];
//echo "id=".$userid;
function getCases($st){
    $sql="SELECT * FROM AssignedCase where userId=$_GET[userid] and CaseStatus=$st";
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
    <tr><td id="tdhl" ><div >Active</div></td><td><?php echo getCases(0);?></td></tr>
    <tr><td id="tdhl">Resolved</td><td><p></p><?php echo getCases(1);?></td></tr>
    <tr><td id="tdhl">Closed</td><td><?php echo getCases(2);?></td></tr>
</table>