<?php
require_once("../../config/index.php");
$con=  mysql_connect($host,$username,$password);

if(!$con){
    echo mysql_error();
    
}
    mysql_select_db($dbname, $con);
    $query="select * from users";
    $result=  mysql_query($query);
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



