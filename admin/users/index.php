       
<?php
try {
    

require_once("../../config/index.php");

  function getselection($con,$tablename){
    $sql="select * from $tablename";
    $result=  mysqli_query($con,$sql);
    $optcat="<option value='0'>Please select one</option>";
    while($row=  mysqli_fetch_array($result)){
        $optcat=$optcat."<option value='$row[1]'>$row[1]</option>";
    }
return $optcat;}
} catch (\Throwable $th) {
    echo $th;
}
?>
<table width=80% id="tab1">
        <tr align=right>
            <td>
                <table>
                    <tr>
                        <td onclick=adduserany('mainb','comm/adduser.php','user','1')><div id="button"><b>create</b></div></td>
                        
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
                                    <?php echo getselection($con,'usercatagory');?>
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
                        <td onclick=adduserany('res','comm/adduser.php','user','1')><div id="button"><b>create</b></div></td>
                        
                    </tr>
                </table>
        </td></tr>
<tr><td id="res"></td></tr>
                </table>