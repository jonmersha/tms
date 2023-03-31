<?php
require_once("../../config/index.php");
require_once("../classes/newcase.php");
$con=  mysql_connect($host,$username,$password);

if(!$con){
    echo mysql_error();
    
}

    mysql_select_db($dbname, $con);


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$Asignment=new newcase();
echo $result=$Asignment->CaseAssignment($_GET[caseid],$_GET[userid], 1 , $con);
//$dates= date("Y-m-d h:i:s");
              //  $sql="insert into AssignedCase values($_GET[caseid],$_GET[userid],'$dates',1,0)";
               // if(!mysql_query($sql,$con)){
               // echo mysql_error();}
               // else
                    //{
               // echo "registration good";
                
                //}
?>
