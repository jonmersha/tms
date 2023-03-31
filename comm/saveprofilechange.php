<?php
require_once '../config/index.php';
//echo "User id=".$_GET[userid];
session_start();
$updatequery="update users set username='$_GET[loginname]',"
                               . "f_name='$_GET[firstname]',"
                                . "m_name='$_GET[midlename]',"
                                . "l_name='$_GET[lastname]',"
                                . "Team='$_GET[team]',"
                                . "ext=$_GET[extention],"
                                . "ernalmail='$_GET[emailint]',"
                                . "privatemail='$_GET[emailp]',"
                                . "tele_mob='$_GET[mob]'"
        . "where(userid=$_SESSION[userid])";
if(!mysqli_query($con,$updatequery)){
    echo mysql_error();
    echo"<br>".$updatequery;
}
else
{
$updated="select * from users where(userid=$_SESSION[userid]) ";
$result=  mysqli_query($con,$updated);
$row=  mysqli_fetch_array($result);

}

echo"<table width=90%>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
    <tr id=tab>
        <td id=tdh> Login name</td>
        <td id=tdh> Full Name</td>
        <td id=tdh>Team</td>
        
        <td id=tdh>Email</td>
        <td id=tdh>Mobile</td>
        <td id=tdh>Ext</td>
        
        </tr>
        <tr id=tr2>
        <td> $row[1]</td>
        <td> $row[2] $row[3] $row[4]</td>
        <td>$row[5]</td>
         
        <td>$row[8]</td>
        <td>$row[9]</td>
        <td>$row[6]</td>
            
        </tr>
</table>";
?>

