<?php
require_once '../../config/index.php';
require_once '../../function/allfunc.php';

function getCases($cat,$st){
    
    $sql="SELECT * FROM caselist where Catagory='$cat' and  status='$st' order by caseid desc";// 
    $result=  mysql_query($sql);
    $rss="<table width=100% >
                <tr id=tdt>
                <td id=tdh><b>Case Id</b></td>
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
        
        //$case=  mysql_fetch_array($caseres);
        
        $rss=$rss."<tr id=$id onclick=loadXMLDoc('mainb','comm/case/detail.php?caseid=$row[0]&source=comm/managers/Allteamcase.php')>
                    <td >$row[0]</td><td >$row[1]</td>
                    <td >".GetCreator($row[0])."</td>
                    <td >$row[4]</td>
                    <td >$row[5]</td>
                    
                  </tr>";
        
    }
    $rss=$rss."</table>";
    return $rss;
}
?>
<?php
$query="select catname from usercatagory";
$result=  mysql_query($query);
while($row=  mysql_fetch_array($result)){
    $queryteam="SELECT * FROM caselist where Catagory='$row[0]'";
    $result1=  mysql_query($queryteam);
    $rownumber=  mysql_num_rows($result1);
    echo "<table width=100%><tr><td id=tab1>"
    . "<table><tr><td id=tdhl>$row[0] Team:$rownumber Total Cases <td>
        <div id=tr2 onclick=loadXMLDoc('mainb','comm/managers/team.php?catagory=$row[0]')>TeamCase</div><td>
        <div id=tr2 onclick=loadXMLDoc('mainb','comm/managers/teamuser.php?catagory=$row[0]')>Users Case</div>
        </td></tr></table></td></tr><tr><td align=right>   
        <table width=95%>
    <tr><td id='tdhl' ><div>Unassigned </div></td><td>".getCases($row[0],'Not Assined')."</td></tr>
    <tr><td id='tdhl'>Assigned</td><td><p></p>".getCases($row[0],'Assined')."</td></tr>
    <tr><td id='tdhl'>Resolved</td><td>".getCases($row[0],'Resolved')."</td></tr>
    <tr><td id='tdhl'>Closed</td><td>".getCases($row[0],'Closed')."</td></tr>
</table></td></tr></table>";
    
    
}

?>
