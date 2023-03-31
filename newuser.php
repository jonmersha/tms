<?php
require_once("config/index.php");
$con=  mysql_connect($host,$username,$password);

if(!$con)
    {
    
    echo mysql_error();
   }
  mysql_select_db($dbname, $con);
    //session_start();
  function getselection($tablename){
    $sql="select * from $tablename";
    $result=  mysql_query($sql);
    $optcat="<option value='0'>Please select one</option>";
    while($row=  mysql_fetch_array($result)){
        $optcat=$optcat."<option value='$row[1]'>$row[1]</option>";
    }
return $optcat;}

?>

<html>
<head>
    <link href="css/mains.css"  type="text/css" media="screen, projection" rel="stylesheet" />
    <link href="css/menu.css"  type="text/css" media="screen, projection" rel="stylesheet" />
    <link href="css/jsfcrud.css"  type="text/css" media="screen, projection" rel="stylesheet" />
    <link href="css/mytable.css"  type="text/css" media="screen, projection" rel="stylesheet" />
    <script language=javascript src=js/main.js></script>
    <script language=javascript src=js/uservalidation.js></script>
</head>
<body>
        <table width="1024" align="center" height="700" border="0" >
        <tr height="10"><td align="right"><br/> </td></tr>
        <tr height="100"><td></td></tr>
        <tr height="5" ><td></td></tr>
        <tr height height="*" ><td id="mainb" align="center" valign="top">
                <table width=80% id=tab1>
        <tr align=right>
            <td id=tab1>
                <table >
                    <tr>
                        <td onclick=adduserany('tab1','comm/adduserany.php','user','0')><b><div id=button align=center><b>create</b></div></b></td>
                        
                    </tr>
                </table>
            </td>
        </tr>
        <tr><td>
            <table width=100%>
            <tr>
                <td width=30%>
                    <table width=100%>
                        <tr><td><b>login Name *</b><br><input type="text" id="loginName"/></td></tr>
                        <tr><td><b>First Name *</b><br><input type="text" id="firstName"/></td></tr>
                        <tr><td><b>Middle Name</b><br><input type="text" id="midleName"/></td></tr>
                        <tr><td><b>Last Name</b><br><input type="text" id="lastName"/></td></tr>
                    </table>
                </td>
                <td align=center width=70%>
                    <table>
                        <tr><td><b>Team </b>
                                <select id="team">
                                    <?php echo getselection('usercatagory');?>
                                </select>
                            </td></tr>
                         <tr><td><b>Telephone(Mobile)</b><br><input type="text" id="mob"/></td></tr>
                         <tr><td><b>email(internal)</b><br><input type="text" id="email"/></td></tr>
                         <tr><td><b>email(private) </b><br><input type="text" id="emailp"/></td></tr>
                         <tr><td><b>Ext</b><br><input type="text" id="ext"/></td></tr>
                    </table>
                </td>
                </tr>
            
                <tr></tr></table></td></tr>
                    <tr><td><b>Password</b><input type="password" id="pass"/><b>Confirm Password</b><input type="password" id="conpass"/></td></tr>
    <tr align=right>
        <td>
    <table>
                    <tr>
                        <td onclick=adduserany('tab1','comm/adduserany.php','user','0')><b><div id=button align=center><b>create</b></div></td>
                        
                    </tr>
                </table>
                </th></tr>
<tr><td id="res"></td></tr>
                </table>
            </td></tr>
        <tr><td id="res"></td></tr>
        <tr height="10" bgcolor="grey"><td></td></tr>
    </table>
</body>
</html>

