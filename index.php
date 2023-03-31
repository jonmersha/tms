<?php
require_once("config/index.php");
    session_start();
if(!isset($_SESSION['loggedin']))
{
header("location:login.php");

}
else{

}

function logincheck(){
if(!isset($_SESSION['loggedin']))
{
header("location:login.php");

} 
else{
       echo "loadviews('tab','menu/singelmenu.php')";

    if($_SESSION['Type']=='admin')
    echo "loadXMLDoc('mainb','homes/adminhome.php'),"
            . "loadviews('loc','admin/users/confirmuser.php')";
    if($_SESSION['Type']=='creator')
    echo "loadXMLDoc('mainb','homes/creatorhome.php')";
    if($_SESSION['Type']=='leader')
    echo "loadXMLDoc('tab','menu/tmledmenuside.php'),loadXMLDoc('mainb','homes/leaderhome.php'),loadXMLDoc('notif','leader/closerReport.php')";
    if($_SESSION['Type']=='user')
    echo "loadXMLDoc('tab','menu/sideusermenu.php'),loadXMLDoc('mainb','homes/userhome.php')"; 
     if($_SESSION['Type']=='manager')
    echo "loadXMLDoc('tab','menu/managers.php'),loadXMLDoc('mainb','comm/managers/Allteamcase.php')"; 
}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <meta content=refresh interva="5"/>
<head>
    <link href="css/jsfcrud.css"  type="text/css" media="screen, projection" rel="stylesheet" />
    <link href="css/mytable.css"  type="text/css" media="screen, projection" rel="stylesheet" />
    
    <script language=javascript src=js/main.js></script>
    <script language=javascript src=js/uservalidation.js></script>
    <script language=javascript src=js/comm.js></script>
    <script language=javascript src=calendar.js></script>
    
   
</head>
<body onload=<?php logincheck();?>>
        <table width="100%" align="center" height="90%" border="0" >
            <tr height="400" id="cssmenu" >
                <td> 
                    <table width="100%">
                        <tr>
                            <td><img src="DBElogogolden.gif"/></td><td  align="right" onclick="userdetail('mainb','users/index.php')">
                                <div id="user">you are loged in as <?php echo $_SESSION[fname]." ".$_SESSION[mname];?></div><a id='user'href="logout.php">Logout</a></td></tr></table></td></tr>
       
        <tr height >
            <td>
                <table width="100%">
                    <tr height="100%" >
                        <td width="250" height="100%" id="tab">
                            
                           
                        </td>
                        <td  align="left" valign="top" height="100%"  >
                           <div style="overflow:scroll; height:520px;" id="mainb"></div>                           
                        </td>
                    </tr>
                </table>
            </td></tr>
        
        
        
    </table>
</body>
</html>

