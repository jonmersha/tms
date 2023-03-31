<?php
session_start();
echo"<table width='100%'>
    <tr>
        <td  align='center' id=tr1 onclick=loadforms('mainb','homes/adminhome.php')>Home</td>
    </tr>
    
</table>
<table id='tab' width='100%'>
    <tr>
        <td  align='left' id='tdt'><b><u>System Users</u></b></td>
    </tr>
    <tr>
        <td align='right'>
            <table width='80%'>
                <tr>
                    <td  id='tr1' onclick=loadforms('mainb','admin/users/')>Add</td>
                </tr>
                <tr>
                    <td  id='tr1' onclick=loadforms('mainb','admin/users/privilages/')>Edit</td>
                </tr>
            </table>
        </td>
    </tr>
</table>
<table id='tab' width='100%'>
    <tr>
        <td  align='left' id=tdt><b><u>System Setting</u></b></td>
    </tr>
    <tr>
        <td align='right'>
            <table width='80%'>
                <tr>
                    <td  id='tr1' onclick=loadforms('mainb','admin/process/')>Process</td>
                </tr>
                <tr>
                    <td  id='tr1' onclick=loadforms('mainb','admin/team')>Team</td>
                </tr>
                <tr>
                    <td  id='tr1' onclick=loadforms('mainb','admin/privilage')>Users Privileges</td>
                </tr>
                <tr>
                    <td  id='tr1' onclick=loadforms('mainb','admin/priority/')>Case Priority</td>
                </tr>
            </table>
        </td>
    </tr>
</table>";

