<?php
require_once("../config/index.php");

$team=$_GET[team];
    $query="select * from users where Team='$team'";
    $result=  mysql_query($query);
    echo "Assign To<select id='userid'>";
    if($_GET[id]=="")
        echo "<option selected='true'>Please select User</option>";
    else
        echo "<option selected='true'>Please select User</option>";
    while($row=  mysql_fetch_array($result)){
        if($_GET[id]==$row[0]){
            echo "<option selected='true' value=$row[0]>$row[2]-$row[3]</option>";
        }
        else{
            echo "<option value=$row[0]>$row[3]</option>";
        }
    }
    echo"</select>";



