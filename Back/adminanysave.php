<?php
require_once '../config/index.php';
$ppss=md5('123456');
echo $ppss;
$sql="update users set pass='$ppss' where userid=$_GET[uid]";
if(!mysql_query($sql)){
    echo mysql_error();
}
else
{
    echo "Password Defaulted ";
}
