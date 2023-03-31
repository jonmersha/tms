<?php
    session_start();
     require_once("../config/index.php");
     $colorSwicher=0;
    $query="select * from caselist where catagory='{$_SESSION['Team']}'and status='Not Assined' ORDER BY `caselist`.`caseid` DESC";
    $result= mysqli_query($con,$query);
    echo"<table valign='top' width=100%>"
    . "<tr>"
            . "<td id=tdh>Case ID</td>"
            . "<td id=tdh>Title</td>"
            . "<td id=tdh>Status</td>"
            . "<td id=tdh>Case Opened by</td>"
            . "<td id=tdh>Requester</td>"
            . "<td id=tdh>Priority</td>"
      . "</tr >";
    while($row=  mysqli_fetch_array($result))
    {
        if($colorSwicher==0){
            $colorSwicher=1;
            $getid="select userid,date from actions where caseid='$row[0]'and actionperformed='create'";
            $idresult=  mysqli_query($con,$getid);
            $idrow=  mysqli_fetch_array($idresult);
            
            
            $usernamequery="SELECT * FROM `users`WHERE userid =$idrow[0] LIMIT 0 , 30";
            $resusers=  mysqli_query($con,$usernamequery);
            $userrow=  mysqli_fetch_array($resusers);
        
        
        echo"<tr id=tr1 onclick=loaddetails('mainb','leader/Details.php',$row[0])>"
            ."<td>$row[0]</td><td>$row[1]</td><td>$row[3]</td><td>".$userrow[2]._.$userrow[3]."_on_".$idrow[1]."</td><td>"."$row[4]</td></td><td>$row[7]</td></tr>"; 
        }
        else{
            $colorSwicher=0;
             echo"<tr id=tr2 onclick=loaddetails('mainb','leader/Details.php',$row[0])>"
            . "<td>$row[0]</td><td>$row[1]</td><td>$row[3]</td><td>".$userrow[2]._.$userrow[3]."_on_".$idrow[1]."</td><td>$row[4]</td></td><td>$row[7]</td></tr>";
            
        }
        
    }
    echo"</table>";
    ?>
<div id='notif' align='left'></div>