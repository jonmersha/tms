<?php

if($_GET[loginname]==""||$_GET[firstname]==""||$_GET[midlename]==""||$_GET[lastname]=="")
//,'$_SESSION[team]', '$_GET[type]', $_GET[extention], '$_GET[emailint]', '$_GET[emailp]', '$_GET[mob]','$password',$_GET[confirmaton])";
{
  echo "mybe some Mandatory fields are empty <a href='newuser.php'>Back To user creation page</a>";  
}
else{
require_once '../config/index.php';
  $password=  md5($_GET[password]);
  
  $getmaxid="SELECT max(userid) from users";
  $maxresult=mysqli_query($con,$getmaxid);
  $rowmax=  mysqli_fetch_array($maxresult);
  $idmax=$rowmax[0]+1;
  
$query="INSERT INTO users VALUES ($idmax, '$_GET[loginname]', '$_GET[firstname]', '$_GET[midlename]', '$_GET[lastname]','$_GET[team]', $_GET[extention], '$_GET[emailint]', '$_GET[emailp]', '$_GET[mob]','$password',$_GET[confirmaton])";

  
//$query="INSERT INTO `DBESupport`.`users` (`userid`, `username`, `f_name`, `m_name`, `l_name`, `Team`, `Type`, `ext`, `ernalmail`, `privatemail`, `tele_mob`, `pass`, `confirmed`) "
     //   . "VALUES ($_GET[userid], '$_GET[loginname]', '$_GET[firstname]', '$_GET[midlename]', '$_GET[lastname]','$_GET[team]', $_GET[extention], '$_GET[emailint]', '$_GET[emailp]', '$_GET[mob]','$password',$_GET[confirmaton])";
if(!mysqli_query($con,$query)){
    echo mysql_error();
}
else{
echo "your account is created now please weght a moment until the administrators are activate your acconut soon to check login please cklick --><a href='login.php'>login</>";// mysql_affected_rows();
    
//header("location:index.php");
}

}?>