<?php
require_once '../../config/index.php';
require_once '../../function/allfunc.php';
getCases($con);
function getCases($con){
    $sql="SELECT * from users where Team='$_GET[catagory]'";
    $result=  mysqli_query($con,$sql);
    echo"<div style='overflow:scroll; height:600px;' ><table width=100%><tr><td>";
    while($users=  mysqli_fetch_array($result)){
        //get case id assine assined to user
       
        $sql1="SELECT CaseId FROM `AssignedCase` where userId=$users[0] order by CaseId desc ";
         $result1=  mysqli_query($con,$sql1); 
         echo "<tr id=tdhl><td><b>".$users[2]." ".$users[3]." : ".mysqli_num_rows($result1)." Cases</b></td></tr><tr><td  align=right><table width='95%'>";
         echo "<tr id=tdh>
               <td id=tdh><b>Case Ids</b></td>
                <td id=tdh><b>Title</b></td>
                <td id=tdh><b>Opened By</td>
                <td id=tdh><b>Requester</td>
                <td id=tdh><b>Department</td>
                <td id=tdh><b>Status</td></tr>";
         $sw=0;
         while($case=  mysqli_fetch_array($result1))
                {
             
             $sql2="SELECT * FROM caselist where caseid=$case[0] ";// 
             $result2=  mysqli_query($con,$sql2);
             $case1=  mysqli_fetch_array($result2);
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
             
             echo "<tr id=$id onclick=loadXMLDoc('mainb','comm/case/detail.php?caseid=$case1[0]&source=comm/managers/teamuser.php?catagory=$_GET[catagory]')>
                    <td >$case1[0]</td>                    
                    <td >$case1[1]</td>
                    <td >".GetCreator($con,$case1[0])."</td>
                    <td >$case1[4]</td>
                    <td >$case1[5]</td>
                    <td >$case1[status]</td>
                    
                  </tr>";
             
         }
         echo "</table>";
        
    }
    echo"</td></tr></table></div>";
    
}
?>
