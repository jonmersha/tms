<?php
require_once '../config/index.php';
session_start();
$userid=$_SESSION['userid'];


/////////////////////////////////////////////////////////////////////////////////////////////////User Menu
try {

    $sql="Select * from PRSet where(userid=$userid and Prmition='creator')";
    $result=mysqli_query($con,$sql);
     if(mysqli_num_rows($result)>0)
         {
          echo "
           <table width=100% id=menuext>
              <tr><td id=th align=left>Case Creation</td></tr><tr>
                 <td>
                     <table width='100%'>      
                         <tr>
                             <td  width=50% id=menucell align='center' onclick=loadforms('mainb','homes/creatorhome.php')>Add New Case</td>
                             <td  width=*% id=menucell onclick=loadforms('mainb','comm/caselist/Alllist.php')>Show Case</td>
                         </tr>
                         <tr >
                             <td id=menucell onclick=loadforms('mainb','creator/closed.php')>Show Closed</td>
                             <td id=menucell onclick=loadforms('mainb','comm/case/EditeDelete.php/')>Edit Case</td>
                         </tr>
                         <tr >
                             <td id=menucell onclick=loadforms('mainb','creator/creatoreport.php')>show per creator</td>
                             <td id=menucell onclick=loadforms('mainb','comm/case/EditeDelete.php/')>Edit Case</td>
                         </tr>  
                     </table>
               </td>
          </tr>
         </table>";
         
         
              }


              $sql="Select * from PRSet where(userid=$userid and Prmition='Leader')";
              $result=mysqli_query($con,$sql);
              if(mysqli_num_rows($result)>0){
                  echo "
                      <table width=100% id=menuext>
                          <tr>
                                  <td id=th align=left>Team leader pane </td></tr><tr><td>
                                      <table width=100%>
                                          <tr>
                                          <td  width=50% align=left id=menucell onclick=loadXMLDoc('mainb','homes/leaderhome.php'),loadXMLDoc('notif','leader/closerReport.php')>Casei in queue</td>
                                          
                                           <td  width=50% align=left id=menucell onclick=loadXMLDoc('mainb','comm/case/team.php?catagory={$_SESSION['Team']}')>Team Case</td>
                                          </tr>
                                          <tr>
                                          <td  align=left id=menucell  onclick=loadforms('mainb','comm/case/teamuser.php?catagory={$_SESSION['Team']}')>Support staff case</td>
                                          <td id=menucell onclick=changestatus('mainb','comm/case/change.php','{$_SESSION['Team']}')>change Status</td>                                
                                          </tr>
          
                                      </table>
                                  </td>
                             </tr>
                      </table>";
                  
              }

              $sql="Select * from PRSet where(userid=$userid and Prmition='Manager')";
              $result=mysqli_query($con,$sql);
               if(mysqli_num_rows($result)>0){
           echo "<table width=100% id=menuext>
               <tr>
               <td id=th align=left>Reports </td></tr><tr>
               <td>
                 <table width=100%>
                   <tr>
                       <td   id=menucell onclick=loadforms('mainb','comm/managers/Allteamcase.php')>Home</td>
                       <td  id=menucell onclick=loadforms('mainb','managersReport/crt.php')>Team level</td>
                    </tr>
                     <tr>
                         <td  id=menucell onclick=loadforms('mainb','managersReport/parday.php/')>Cases Perday</td>
                         <td  id=menucell onclick=loadforms('mainb','managersReport/list.php/')> All Case</td>
                     </tr>
                     <tr>
                         
                         <td  id=menucell onclick=nloadforms('mainb','managersReport/list.php/')> </td>
                         <td  id=menucell onclick=loadforms('mainb','managersReport/optuser.php/')></td>
                     </tr>
                     <tr >
                                       <td id=menucell onclick=loadforms('mainb','creator/creatoreport.php')>creator report</td>
                                       <td id=menucell onclick=loadforms('mainb','comm/case/EnnditeDelete.php/')></td>
                                   </tr>  
                  </table>
                   </td>
               </tr>
           </table>    
           </td></tr></table>";
           
               }


    $sql="Select * from PRSet where(userid={$_SESSION["userid"]} and Prmition='users')";
    $result=mysqli_query($con,$sql);
    if(mysqli_num_rows($result)>0){
            echo "
                <table width=100% id=menuext>
                    <tr>
                    <td id=th align=left>User Support </td></tr><tr><td><table width='100%'>    
                    <tr>
                    <table width=100%><tr>
                        <td  id=menucell onclick=loadXMLDoc('mainb','homes/userhome.php')>Wegiting Request</td>
                        <td   id='menucell' onclick=loadforms('mainb','comm/case/user.php?userid={$_SESSION["userid"]}')>mycase</td>
                         </tr>
                         <tr id='menucell'>
                            <td  id='menucell' onclick=loadforms('mainb','comm/case/team.php?catagory={$_SESSION["Team"]}')>Team Case</td>
                            <td  id='menucell' onclick=loadforms('mainb','comm/case/teamuser.php?catagory={$_SESSION["Team"]}')>Team users case</td>
                        </tr>
                        <tr>
                            <td  id='menucell' onclick=loadforms('mainb','comm/managers/Allteamcase.php')>All Case</td>
                            <td  id='menucell' onclick=loadforms('mainb','comm/managers/Allteamcasev.php')></td>
                        </tr>
                    
                </table></td></tr></table>"; 
        
    }


//////////////////////////////////////////////////////////////////////ADMINSTRATOR////////////////////////////////
$sql="Select * from PRSet where(userid=$userid and Prmition='Admin')";
$result=mysqli_query($con,$sql);
 if(mysqli_num_rows($result)>0)
     {
     
     echo "<table width=100% id=menuext>
         <tr><td  id=thl align=left>System Administration </td></tr>
         <tr>
         <td>
             <table width='100%'>
             <tr>
             <td  width=50% id=menucell   onclick=loadforms('mainb','homes/adminhome.php')>Home</td>
             <td width=*%  id=menucell onclick=loadforms('mainb','admin/users/')>Add new user</td>
             </tr>
             <tr>
                 <td  id=menucell onclick=loadforms('mainb','admin/users/privilages/')>Edit Uesers</td>
                 <td id=menucell  onclick=loadforms('mainb','admin/process/')>Process</td>
             </tr>
             <tr>
                 <td  id=menucell onclick=loadforms('mainb','admin/team')>Team</td>
                 <td  id=menucell onclick=loadforms('mainb','admin/privilage')>Privileges</td>
             </tr>
             <tr>
                 <td  id= menucell onclick=loadforms('mainb','admin/priority/')>Priority</td>
                 <td  id= menucell onclick=loadforms('mainb','admin/priority/')></td>
             </tr>
         </table>
     </td>
 </tr>
 </table>
</td>
</tr>
</table>";        
   }

} catch (\Throwable $th) {
    echo $th;
  
}

?>
<table width="100%">
    <tr>
        <td  align="center"  id='menucell' onclick="loadforms('mainb','comm/EditeMyProfile.php?uid=<?php echo $_SESSION['userid'];?>')">profile Edit</td>
    
        <td  align="center" id=menucell onclick="loadforms('mainb','comm/ChangeMyPassword.php')">Change Password</td>
    </tr>
    
</table>




