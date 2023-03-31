<?php
//var qstr="?oldpassword="+old.value+"&newPassword="+newpassword.value+"&newPasswordConfirm="+newpassconfirm.value; 
//echo $_GET[oldpassword];
    session_start();
    //echo $_SESSION['userid'];
    require_once '../config/index.php';
    $query="SELECT * from users where userid=$_SESSION[userid]";
    $result=  mysql_query($query);
    $row=  mysql_fetch_array($result);
    $password=md5($_GET[oldpassword]);
   if($row[10]==$password) 
       {
            if($_GET['newPassword']==$_GET[newPasswordConfirm])
                {
                    $newpassword=md5($_GET['newPassword']);
                    $query="update users set pass='$newpassword'where userid=$_SESSION[userid]";
                    if(mysql_query($query))
                        {
                     echo "password changed successfully";
                        }
                    else{
                    echo mysql_error();
                        }
                }
            else
                {
                    echo "password Not Confirmed";
                }
      }
   else 
       {
        echo "Old Password Not Correct";       
       }

?>



