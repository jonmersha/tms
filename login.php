<?php
session_start(); // This starts the session which is like a cookie, but it isn't saved on your hdd and is much more secure.
require_once("config/index.php");
$con=  mysql_connect($host,$username,$password); // Connect to the MySQL server
if(!$con){
    echo mysql_error();
    
}
    mysql_select_db($dbname, $con);//Select your Database
if(isset($_SESSION['loggedin']))
{
   header("location:index.php");   
} 
// That bit of code checks if you are logged in or not, and if you are, you can't log in again!
if(isset($_POST['submit']))
{
   $name = mysql_real_escape_string($_POST['username']); // The function mysql_real_escape_string() stops hackers!
   $pass = mysql_real_escape_string($_POST['password']); // We won't use MD5 encryption here because it is the simple 
    $pass=md5($pass);
  $mysql = mysql_query("SELECT * FROM users WHERE username = '{$name}' AND pass = '{$pass}'"); // This code uses MySQL to get all of the users in the database with that username and password.
 if(mysql_num_rows($mysql) < 1)
   {
     $messagepass = "Password was probably incorrect!<br>";

   // header("location:mainpage");
   } // That snippet checked to see if the number of rows the MySQL query was less than 1, so if it couldn't find a row, the password is incorrect or the user doesn't exist!
   else{
        $result=mysql_query($mysql,$con);
        //$row=  mysql_fetch_array($result);
        
        $_SESSION['loggedin'] = "YES"; // Set it so the user is logged in!
        $_SESSION['name'] = $name; // Make it so the username can be called by $_SESSION['name']
        $query="select * from users where username='{$name}'";
        $result=  mysql_query($query,$con);
        $row=mysql_fetch_array($result);
        $_SESSION['userid']=$row[0];
        $_SESSION['usernama']=$row[1];
        $_SESSION['Team']=$row[5];
        //$_SESSION['Type']=$row[6];
        $_SESSION['fname']=$row[2];
        $_SESSION['mname']=$row[3];
        $_SESSION["path"]='';
        if($row[11]==0){
            session_destroy();
            $messagepass="The users are not confirmed by admin";
        }
        else
        header("location:index.php"); 
}
 // Kill the script here so it doesn't show the login form after you are logged in!
} // That bit of code logs you in! The "$_POST['submit']" bit is the submission of the form down below VV
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
        <meta http-equiv="refresh"  content="60"/>
        <title>Login</title>
        <link href="css/main.css" type="text/css" media="screen, projection" rel="stylesheet" />
    </head>
<body>
<div id="wrapper">
            <div id="message" style="display: none;">
            </div>
            <div id="waiting" style="display: none;">
                Please wait<br />
                <img src="images/ajax-loader.gif" title="Loader" alt="Loader" /></div>
<div>
<form type='login.php' method='POST'>
<fieldset>
                    
                    <span style="font-size: 0.9em;">Please insert your credentials.</span>
                   
<p>
                        <label for="email">User Name:</label>
			<input type='text'  class="inputText" name='username'>
		   </p>
                   <p>
     			<label for="email"> Password: </label><br>
                        <input type='password' class="inputText" name='password'>
                  </p>
                  <p>
                      <input type="submit" name="submit" value="login" id="submit" style="float: right; clear: both; margin-right: 3px;" value="Submit" /><a href="newuser.php">Create new user</a>
                    </p>
                   <?php echo $messagepass;?> 
</fieldset>
</form>
</div>
    </body>
</html>


