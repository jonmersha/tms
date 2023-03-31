<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
?>
<table width='100%'>
    <tr>
        <td  align='center' id=tr1 onclick="loadforms('mainb','homes/creatorhome.php')">Home</td>
    </tr>
    
</table>
<table id='tab' width='100%'>
    <tr>
        <td  align='left'>Case list</td>
    </tr>
    <tr>
        <td align='right'>
            <table width='80%'>
                <tr>
                    <td  id='tr2' onclick=loadforms('mainb','comm/caselist/Alllist.php')>All</td>
                </tr>
                <tr>
                    <td  id='tr1' onclick=loadforms('mainb','creator/list.php/')>Case I created</td>
                </tr>
                
            </table>
        </td>
    </tr>
</table>
<table width='100%'>
    <tr>
        <td  align='center' id=tr1 onclick='loadforms('mainb','comm/EditeMyProfile.php?uid<?php echo $_SESSION['userid'];?>')'>profile Edit</td>
    </tr>
    
</table>
<table width='100%'>
    <tr>
        <td  align='center' id=tr1 onclick='loadforms('mainb','comm/ChangeMyPassword.php')'>Change Password</td>
    </tr>
    
</table>



