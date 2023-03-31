<?php
require_once("../config/index.php");

$team=$_GET[team];
    $query="select * from users where Team='$team'";
    $result=  mysqli_query($con,$query);
    echo "Assign To<select id='userid'>";
    if($_GET[id]=="")
        echo "<option selected='true'>Please select User</option>";
    else
        echo "<option selected='true'>Please select User</option>";
    while($row=  mysqli_fetch_array($result)){
        if($_GET[id]==$row[0]){
            echo "<option selected='true' value=$row[0]>$row[2]-$row[3]</option>";
        }
        else{
            echo "<option value=$row[0]>$row[3]</option>";
        }
    }
    echo"</select>";



