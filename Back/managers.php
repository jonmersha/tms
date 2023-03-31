<?php
session_start();
?>
<table width=100%>
    <tr>
        <td  align=center id=tr1 onclick=loadforms('mainb','comm/managers/Allteamcase.php')>Home</td>
    </tr>
    
</table>

<table id=tab width=100%>
    <tr>
        <td  align=left>Report</td>
    </tr>
    <tr>
        <td align=right>
            <table width=80%>
                <tr>
                    <td  id=tr1 onclick=loadforms('mainb','managersReport/crt.php')>Team Performance</td>
                </tr>
                <tr>
                    <td  id=tr1 onclick=loadforms('mainb','managersReport/optuser.php/')> Staff Performance</td>
                </tr>
                 <tr>
                    <td  id=tr1 onclick=loadforms('mainb','managersReport/list.php/')> All Case</td>
                </tr>
                
            </table>
        </td>
    </tr>
</table>




 
