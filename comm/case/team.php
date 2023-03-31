<?php
require_once '../../config/index.php';
require_once '../../function/allfunc.php';
function getCases($st){    
    $sql="SELECT * FROM caselist where Catagory='$_GET[catagory]' and  status='$st' order by caseid desc";// 
    $result=  mysql_query($sql);
    $rss="<table width=100% >
                <tr id=tdt>
                <td id=tdh><b>Case Id</b></td>
                <td id=tdh width=200 ><b>Title</b></td>
                <td id=tdh><b>Opened By</td>
                <td id=tdh><b>Requester</td>
                <td id=tdh><b>Department</td>
                <td id=tdh><b>Status</td>                
                    </tr>";
    
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
        
        //$case=  mysql_fetch_array($caseres);
        
        $rss=$rss."<tr id=$id onclick=loadXMLDoc('mainb','comm/case/detail.php?caseid=$row[0]&source=comm/case/team.php?catagory=$_GET[catagory]')>
                    <td >$row[0]</td>
                     <td >$row[1]</td>
                    <td >".GetCreator($row[0])."</td>
                    <td >$row[4]</td>
                    <td >$row[5]</td><td >$row[status]</td>
                    
                  </tr>";
        
    }
    $rss=$rss."</table>";
    return $rss;
}
?>
<table width="100%">
    <tr><td id="tdhl" ><div>Unassigned </div></td><td><?php echo getCases('Not Assined');?></td></tr>
    <tr><td id="tdhl">Assigned</td><td><p></p><?php echo getCases('Assined');?></td></tr>
    <tr><td id="tdhl">Resolved</td><td><?php echo getCases('Resolved');?></td></tr>
    <tr><td id="tdhl">Closed</td><td><?php echo getCases('Closed');?></td></tr>
</table>