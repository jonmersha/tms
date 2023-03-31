<?php
require_once '../config/index.php';

echo getselection();
function getselection(){
    $sql="";
    $sql="select * from users  where Team='$_GET[team]'";
    if($_GET[team]=='All'){
        $sql="select * from users";
    }
    
    $result=  mysql_query($sql);
    $optcat="<option value='All'>All</option>";
    while($row=  mysql_fetch_array($result)){
        $optcat=$optcat."<option value='$row[0]'>$row[2] $row[3]</option>";
    }
    return $optcat;
}

