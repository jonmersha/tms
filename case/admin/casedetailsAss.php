<?php

require_once("../../config/index.php");
$con=  mysql_connect($host,$username,$password);

if(!$con){
    echo mysql_error();
    
}

    mysql_select_db($dbname, $con);
    $query="select * from caselist where(caseid=$_GET[id])";
    $result=  mysql_query($query);
    echo "<table>";
    
    while($row=mysql_fetch_array($result)){
        echo "<tr><td>CseID</td><td><h1>$row[0]</h1><input type='hidden' value='$row[0]' id='caseid'/></td></tr>";
        echo "<tr><td>CseTitle</td><td>$row[1]</td></tr>";
        echo "<tr><td>CseRequester</td><td>$row[3]</td></tr>";
        echo "<tr><td>RequestDate</td><td>$row[4]</td></tr>";
        echo "<tr><td>CasePriority</td><td>$row[7]</td></tr>";
    }
    echo"</table>";
    ?>