<?php
require_once '../../config/index.php';
require_once '../../function/allfunc.php';
function getCases($st){
    
    $sql="SELECT * FROM caselist where Catagory='$_GET[catagory]' and  status='$st' order by caseid desc";// 
    $result=  mysqli_query($con,$sql);
    $rss="<table width=100% >
                <tr id=tdt>
                <td id=tdh><b>Case id</b></td>
                <td id=tdh width=200 ><b>Title</b></td>
                <td id=tdh><b>Opened By</td>
                <td id=tdh><b>Requester</td>
                <td id=tdh><b>Department</td></tr>";
    
    $sw=0;
    while($row=  mysqli_fetch_array($result)){
        
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
        
        //$case=  mysqli_fetch_array($caseres);
        
        $rss=$rss."<tr id=$id onclick=loadXMLDoc('mainb','comm/case/detail.php?caseid=$row[0]&source=comm/managers/team.php?catagory=$_GET[catagory]')>
                    <td >$row[0]</td>
                    <td >$row[1]</td>
                    <td >".GetCreator($row[0])."</td>
                    <td >$row[4]</td>
                    <td >$row[5]</td>
                    
                  </tr>";
        
    }
    $rss=$rss."</table>";
    return $rss;
}
?>
<table width="100%" >
    <tr><td align="right">
            <table  id="tab" >
                <tr><td onclick=loadXMLDoc('mainb','comm/managers/Allteamcase.php') id="tdhl"><?php echo $_GET[catagory]." Team Cases status summary";  ?></td></tr>
                <tr><td>
                        <table align=center width="100%"><tr>
                    <?php 
                    function getnumber($st){
                        $sql="SELECT * FROM caselist where Catagory='$_GET[catagory]' and  status='$st'";
                        $result=  mysqli_query($con,$sql);
                    return mysql_num_rows($result);}
                    echo"<tr id=tr1><td> Cases Not yet assined</td><td> : ".getnumber('Not Assined')."</td></tr>";
                    echo"<tr id=tr2><td> Active Cases</td><td> : ".getnumber('Assined')."</td></tr>";
                    echo"<tr id=tr1><td>cases whefhting for close conformation</td><td> : ".getnumber('Resolved')."</td></tr>";
                    echo"<tr id=tr2><td> Closed cases</td><td> : ".getnumber('Closed')."</td></tr>";
                ?>
                                
                                
                        </table></td></tr>
            </table>
        </td></tr>
    <tr><td><table width="80%" align=center>
                
                <tr>
                    <td width="100%">
                      <table width="100%">
                           <tr><td id="th">Unassigned</td></tr>
                            <tr><td><?php echo getCases('Not Assined');?></td></tr>
                      </table></td></tr>
                <tr>
                    <td width="100%">
                      <table width="100%">
                           <tr><td id="th">Assined</td></tr>
                            <tr><td><?php echo getCases('Assined');?></td></tr>
                      </table></td></tr>
                <tr>
                    <td width="100%">
                      <table width="100%">
                           <tr><td id="th">Resolved</td></tr>
                            <tr><td><?php echo getCases('Resolved');?></td></tr>
                      </table></td></tr>
                <tr>
                    <td width="100%">
                      <table width="100%">
                           <tr><td id="th">Closed</td></tr>
                            <tr><td><?php echo getCases('Closed');?></td></tr>
                      </table></td></tr>
            
    
    
            </table></td></tr>
            </table>