<?php

require_once("../config/index.php");

function getusers(){
    $sql="select * from users";
    $result= mysqli_query($con,$sql);
    while($row=  mysqli_fetch_array($result)){
        echo "<option value=$row[0]> $row[2] $row[3]</option>";
        
    }
   
}

?>
<form method="post" action="creator/export.php" target="frm">
<table>
    <tr><td>Users</td><td> Case Status</td><td></td></tr>
    <tr><td>
    <select id="users" name="users">
    <option value=0> please select users</option>
    <?php getusers();?>
    </select>
</td>
        <td> 
            <select id="statuss" name="statuss">
                <option value="o">All Case </option>
                <option value=Not assined>Not assigned</option>
                <option value=Assined>Assigned</option>
                <option value=Resolved>Resolved</option>
                <option value=Closed>Closed</option>
                
            </select>
        </td>
<td><input type="button" value="show here" onclick="showhere('thisid','creator/showhere.php')" /><input type="submit" value="export" /></td>
    </tr>
</table>
</form>


<div id="thisid"></div>