<?php
session_start();

require_once("../config/index.php");
$colorSwicher=0;

    mysql_select_db($dbname, $con);
    
    $query="SELECT * FROM `AssignedCase` where userid='{$_SESSION['userid']}'and CaseStatus=0";  
    $result=  mysql_query($query);
    //$row=  mysql_fetch_array($result);
    
    echo"<table width=100% id=tab>";
    echo"<tr width=100%><td><table valign='top' width=100%>"
    . "<tr>"
            . "<td id=tdh>CaseID</td>"
            . "<td id=tdh>Title</th>"
            . "<td id=tdh>Case Opened by</th>"
            . "<td id=tdh>Requester</th>"
            . "<td id=tdh>Priority</th>"
      . "</tr >";
    while($rows=  mysql_fetch_array($result))
    {
        $sql="select * from caselist where caseid='$rows[0]'";
        $query=  mysql_query($sql);
        $row=  mysql_fetch_array($query);
        if($colorSwicher==0){
            $colorSwicher=1;
            $getid="select userid,date from actions where caseid='$row[0]'and actionperformed='create'";
            $idresult=  mysql_query($getid);
            $idrow=  mysql_fetch_array($idresult);
            
            
            $usernamequery="SELECT * FROM `users`WHERE userid =$idrow[0] LIMIT 0 , 30";
            $resusers=  mysql_query($usernamequery);
            $userrow=  mysql_fetch_array($resusers);
        
        
        echo"<tr id=tr1 onclick=loaddetails('mainb','Support/Details.php',$row[0])>"
            ."<td>$row[0]</td><td>$row[1]</td><td>".$userrow[2]._.$userrow[3]."_on_".$idrow[1]."</td><td>"."$row[4]</td></td><td>$row[7]</td></tr>"; 
        }
        else{
            $colorSwicher=0;
             echo"<tr id=tr2 onclick=loaddetails('mainb','Support/Details.php',$row[0])>"
            . "<td>$row[0]</td><td>$row[1]</td><td>".$userrow[2]._.$userrow[3]."_on_".$idrow[1]."</td><td>$row[4]</td></td><td>$row[7]</td></tr>";
            
        }
        
    }
    echo"</table></td></tr></table>";
    ?>