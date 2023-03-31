<?php


 session_start();
 $_SESSION['userid']."profilecheck";
 ?>
<table width="100%">
    <tr>
        <td  align="center" id=tr1 onclick="loadXMLDoc('mainb','homes/userhome.php')">Home</td>
    </tr>
    
</table>

<table id=tab width=100%>
    <tr>
        <td  align=left id=tdt><b><u>Case list</u></b></td>
    </tr>
    <tr>
        <td align=right>
            <table width=100%>
                <tr id='tr2'>
                    <td   onclick=loadforms('mainb','comm/case/user.php?userid={$_SESSION['userid']}')>mycase</td>
                </tr>
                <tr id='tr2'>
                    <td  onclick=loadforms('mainb','comm/case/team.php?catagory={ $_SESSION['Team']}')>Team Case</td>
                </tr>
                <tr id='tr2'>
                    <td  onclick=loadforms('mainb','comm/case/teamuser.php?catagory={$_SESSION['Team']}')>Team users case</td>
                </tr>
                <tr id='tr2'>
                    <td  id=tr1 onclick=loadforms('mainb','comm/managers/Allteamcase.php')>All Case</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table width=100%>
    <tr>
        <td  align=center id=tr1 onclick=loadforms('mainb','comm/EditeMyProfile.php?uid=<?php echo $_SESSION['userid'];?>')">profile Edit</td>
    </tr>
    
</table>
<table width="100%">
    <tr>
        <td  align="center" id=tr1 onclick="loadforms('mainb','comm/ChangeMyPassword.php')">Change Password</td>
    </tr>
    
</table>

