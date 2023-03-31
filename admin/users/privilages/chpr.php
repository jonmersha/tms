    <?php
    require_once("../../../config/index.php");
    $uid=$_GET[id];
    $query="SELECT * from users where userid=$uid";
    $result=  mysqli_query($con,$query);
    $row=  mysqli_fetch_array($result);
    function getselection($tablename,$team){
                                     $sql1="select * from $tablename";
                                     $result1=  mysqli_query($con,$sql1);
                                     $optcat="<option value=$team>$team</option>";
                                     while($row1=  mysqli_fetch_array($result1)){
                                         $optcat=$optcat."<option value='$row1[1]'>$row1[1]</option>";
                                         
                                        }
                                        return $optcat;
                                        
                                     }
                                     
    function getselectionn($tablename,$team)
                {
            $sql1="select * from $tablename ";
            $result1=  mysqli_query($con,$sql1);
            $optcat="<option value=$team>$team</option>";
            while($row1=  mysqli_fetch_array($result1)){
            $optcat=$optcat."<option value='$row1[0]'>$row1[0]</option>";
                                         
                                       }
          return $optcat;
          
            }
                                        
    //echo "lulu $row[3]";
    ?>
<table width=80% id=tab1>
        <tr align=right>
            <td>
                <table >
                    <tr>
                        <td onclick=updateusersfull('mainb','admin/users/privilages/savechange.php?userid=<?php echo $row[0]?>')><b><div id=button align=center><b>Save changes</b></div></b></td>
                        <td onclick=updateusersfull('mainb','comm/usrprivilages.php?userid=<?php echo $row[0]?>')><b><div id=button align=center><b>Add/Remove privileges</b></div></b></td>
                        
                    </tr>
                </table>
            </td>
        </tr>
        <tr><td>
            <table width=100%>
            <tr>
                <td width=30%>
                    <table width=100%>
                        <tr><td><b>login Name *</b><br><input type="text" id="loginName" value=<?php echo $row[1]?>></input></td></tr>
                        <tr><td><b>First Name *</b><br><input type="text" id="firstName" value=<?php echo $row[2]?>></input></td></tr>
                        <tr><td><b>Middle Name</b><br><input type="text" id="midleName" value=<?php echo $row[3]?>></input></td></tr>
                        <tr><td><b>Last Name</b><br><input type="text" id="lastName" value=<?php echo $row[4]?>></input></td></tr>
                    </table>
                </td>
                <td align=center width=70%>
                    <table>
                        <tr><td><b>Team </b>
                                <select id="team">
                                    <?php
                                    echo getselection('usercatagory',$row[5]);
                                    ?>
                                </select>
                            </td></tr>
                        
                         <tr><td><b>Telephone(Mobile)</b><br><input type="text" id="mob" value=<?php echo $row[9]?>></input></td></tr>
                         <tr><td><b>email(internal)</b><br><input type="text" id="email" value=<?php echo $row[7]?>></input></td></tr>
                         <tr><td><b>email(private) </b><br><input type="text" id="emailp" value=<?php echo $row[8]?>></input></td></tr>
                         <tr><td><b>Ext</b><br><input type="text" id="ext" value=<?php echo $row[6]?>></input></td></tr>
                    </table>
                </td>
                </tr>
            
                <tr></tr></table></td></tr>
    <tr align=right>
        <td>
    <table>
                    <tr>
                        <td onclick=updateusersfull('mainb','admin/users/privilages/savechange.php')><b><div id=button align=center><b>Save changes</b></div></td>
                        
                    </tr>
                </table>
                </th></tr>
<tr><td id="res"></td></tr>
                </table>
<table>
            
        <tr><td id="res"></td></tr>
        <tr height="10" bgcolor="grey"><td></td></tr>
    </table>
    <hr>