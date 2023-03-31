<?php
require_once '../../../config/index.php';
$updatequery="update users set username='$_GET[loginname]',"
                               . "f_name='$_GET[firstname]',"
                                . "m_name='$_GET[midlename]',"
                                . "l_name='$_GET[lastname]',"
                                . "Team='$_GET[team]',"
                                . "ext=$_GET[extention],"
                                . "ernalmail='$_GET[emailint]',"
                                . "privatemail='$_GET[emailp]',"
                                . "tele_mob='$_GET[mob]'"
        . "where(userid=$_GET[userid])";
if(!mysqli_query($con,$updatequery)){
    echo mysql_error();
}
else
{
//echo mysql_affected_rows();


$updated="select * from users where(userid=$_GET[userid]) ";
$result=  mysqli_query($con,$updated);
$row=  mysqli_fetch_array($result);

}

echo"<table width=90%>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td onclick=privilageseter('mainb','admin/users/privilages/chpr.php','$_GET[userid]') id=tr1> &#10096;&#10096;</td>
        <td onclick=loadXMLDoc('mainb','admin/users/privilages') id=tr1> &#10096;&#10096;&#10096;</td>
        
        </tr>
    <tr id=tab>
        <td id=tdh> Full Name</td>
        <td id=tdh>Team</td>
        
        <td id=tdh>Email</td>
        <td id=tdh>Mobile</td>
        <td id=tdh>Ext</td>
        
        </tr>
        <tr id=tr2>
        <td> $row[2] $row[3] $row[4]</td>
        <td>$row[5]</td>
         
        <td>$row[7]</td>
        <td>$row[9]</td>
        <td>$row[6]</td>
            
        </tr>
</table>";

