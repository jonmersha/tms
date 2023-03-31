<?php
require_once '../config/index.php';
$sql="SELECT * FROM `usercatagory`";
function getselection($tablename){
    $sql="select * from $tablename";
    $result=  mysql_query($sql);
    $optcat="<option value='selectteam'>Select Team</option>";
    $optcat=$optcat."<option value='All' onclick=optuser('st','managersReport/optteamuser.php')>All</option>";
    while($row=  mysql_fetch_array($result)){
        $optcat=$optcat."<option value='$row[1]' onclick=optuser('st','managersReport/optteamuser.php')>$row[1]</option>";
    }
    return $optcat;
}

                              getselection('usercatagory');
                             

?>
<form>
    <table> 
        <tr>
            <td>Team</td>
            <td><select id='cat'  ><?php echo getselection('usercatagory');?></select></td>
            <td>support_staff</td>
            <td><select id="st">
                    
                </select></td>
             <td>Case_Status</td>
             <td><select id="stcas">
                    <option value="All">All</option>
                    <option value="Closed">Closed</option>
                    <option value="Resolved">Resolved</option>
                    <option value="Assined">Active Case</option>
                </select></td>
                <td>
                    <table><tr>
                            <td align="center">
                                Time interval between
                            </td>
                            </tr>
                            <tr>
                            <td>
                                <table>
                                    <tr>
                                    <td><input type="text" id="fdate"/></td>
                                    <td>and</td>
                                    <td><input type="text" id="ldate"/></td>
                                   </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                
                 </td>
            
            <td><input type="button" value="Search" onclick="Teausercaase('rpt','managersReport/userscase.php')"/></td>
        </tr>
    </table>
</form>
<hr>
<table width="100%">
    <tr width="100%">
        <td></td><td></td><td></td><td></td><td></td><td></td><td width="10%">Export To Pdf</td>
    </tr>
</table>
<hr>
<div id="rpt"></div>

