<?php
require_once("../../config/index.php");
session_start();



function mycase($rqtype){
    $swicher=0;
   $sql="select caseid,date,userid from actions where actionperformed='create'";
   $result=  mysqli_query($con,$sql);
   echo"
                <tr>
                <td id=tdh width=200><b>Title</b></td>
                <td id=tdh><b>Opened By</td>
                <td id=tdh><b>Requested By</td>
                <td id=tdh><b>Department</td>
                <td id=tdh><b>Team</td></tr>";
while($row=mysqli_fetch_array($result))
       {
        $userqery="SELECT f_name,m_name FROM `users`  where userid=$row[2]";
        $userresult=  mysqli_query($con,$userqery);
        $urow=  mysqli_fetch_array($userresult);
        $csql="SELECT * FROM `caselist` where caseid=$row[0]";
        $rs=  mysqli_query($con,$csql);
        $crow=  mysqli_fetch_array($rs);
       if($swicher==0){
           $trid="tr1";
           $swicher=1;
           
       }
       else{
           $trid="tr2";
           $swicher=0;
           
       }
    if($rqtype==$crow[3]){
    echo"<tr id=$trid onclick=loaddetails('mainb','creator/Details.php',$row[0])>"
            . "<td>$crow[1]</td>"
            . "<td>$urow[0]--$urow[1]</td>"
            . "<td>$crow[4]</td>"
            . "<td>$crow[5]</td>"
            . "<td>$crow[8]</td></tr>";
}
    }
    
    
}
function Allcase($rqtype){}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        
        <meta http-equiv="refresh"  content="5"/>
        <title>Login</title>
        <link href="css/main.css" type="text/css" media="screen, projection" rel="stylesheet" />
    </head>
<body>
<table width=100%><tr>
        <td>
            <table width=100% id=tab><tr><td>
            <div width=100% align='left' onclick="loadXMLDoc('mainb','creator/listeach.php?status=Not Assined')"><b>Un assigned Case</b></div>
                    </td></tr>
                <?php  mycase('Not Assined');?>
                </table>
            <table width=100% id=tab><tr><td>
            <div  onclick="loadXMLDoc('mainb','creator/listeach.php?status=Assined')"><b>Active Case</b></div>
            </td></tr>
                <?php  mycase('Assined');?>
                </table>
            <table width=100% id=tab><tr><td>
            <div   onclick="loadXMLDoc('mainb','creator/listeach.php?status=Resolved')"><b>Resolve Report</b></div>
            </td></tr>
                <?php  mycase('Resolved');?>
            </table>
            <table width=100% id=tab><tr><td>
            <div  onclick="loadXMLDoc('mainb','creator/listeach.php?status=Closed')"><b>Closed Case</b></div>
            </td></tr>
                <?php  mycase('Closed');?>
                </table>
        </td>
</tr>
</table>


