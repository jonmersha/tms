<?php session_start();?>
<table width=100%>
    <tr>
        <td  align=left id=tr1 onclick=loadXMLDoc('mainb','homes/leaderhome.php'),loadXMLDoc('notif','leader/closerReport.php')>Home</td>
    </tr>
    
</table>
<table width=100%>
    <tr>
        <td  align=left id=tr2 onclick=loadXMLDoc('mainb','comm/case/team.php?catagory=<?php echo $_SESSION['Team'];?>')>Team Case List</td>
    </tr>
    
</table>
<table width=100%>
    <tr>
        <td  align=left id=tr1  onclick=loadforms('mainb','comm/case/teamuser.php?catagory=<?php echo $_SESSION['Team'];?>')>Support staff case</td>
    </tr>
    
</table>
<table width=100%>
    <tr>
        <td  align=center id=tr1 onclick=loadforms('mainb','comm/EditeMyProfile.php?uid<?php echo $_SESSION['userid'];?>')>profile Edit</td>
    </tr>
    
</table>
<table width=100%>
    <tr>
        <td  align=center id=tr1 onclick=loadforms('mainb','comm/ChangeMyPassword.php')>Change Password</td>
    </tr>
    
</table>
