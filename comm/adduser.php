<?php

if($_GET[loginname]==""||$_GET[firstname]==""||$_GET[midlename]==""||$_GET[lastname]=="")
//,'$_SESSION[team]', '$_GET[type]', $_GET[extention], '$_GET[emailint]', '$_GET[emailp]', '$_GET[mob]','$password',$_GET[confirmaton])";
{
  echo "mybe some filds are empty";  
}
else{
require_once '../config/index.php';

  $password=  md5($_GET[password]);
  $getmaxid="SELECT max(userid) from users";
  $maxresult=mysqli_query($con,$getmaxid);
  $rowmax=  mysqli_fetch_array($maxresult);
  $idmax=$rowmax[0]+1;
  
$query="INSERT INTO users VALUES ($idmax, '$_GET[loginname]', '$_GET[firstname]', '$_GET[midlename]', '$_GET[lastname]','$_GET[team]', $_GET[extention], '$_GET[emailint]', '$_GET[emailp]', '$_GET[mob]','$password',$_GET[confirmaton])";
if(!mysqli_query($con,$query)){
    echo mysql_error();
    echo $query;
}
else
echo mysql_affected_rows()." users registered succefully";
    
//header("location:index.php");

}?>
