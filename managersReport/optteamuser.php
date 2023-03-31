<?php
require_once '../config/index.php';

echo getselection();
function getselection(){
    $sql="";
    $sql="select * from users  where Team='$_GET[team]'";
    if($_GET[team]=='All'){
        $sql="select * from users";
    }
    
    $result=  mysqli_query($con,$sql);
    $optcat="<option value='All'>All</option>";
    while($row=  mysqli_fetch_array($result)){
        $optcat=$optcat."<option value='$row[0]'>$row[2] $row[3]</option>";
    }
    return $optcat;
}

