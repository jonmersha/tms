<?php
require_once("../../config/index.php");

    $allusers="select * from users";
    $resultuser=  mysql_query($allusers);
    echo"<table width='1000'>";
    while($row=  mysql_fetch_array($resultuser)){//feach users from user table while there is a users in usaes  table 
    echo"<tr id=heads><td>"
        . "<table><tr><td><b>$row[2] $row[3] : </b></td>";
    $casecount="select count(CaseId) from AssignedCase where userId=$row[0] and casestatus=0";
    $resultcount=  mysql_query($casecount);//count cases assinrd to given users and the cases which is not resolved
    
    $countrow=mysql_fetch_array($resultcount);
    if($countrow[0]==0){
        $rowc="<td>No Active case</td><td></td></tr></table></td></tr>";
    }
    else{
        $rowc="<td>$countrow[0]</td><td>Total number of cases</td></tr></table></td></tr>";
        
    }
    echo $rowc;
    $caseid="select caseId from AssignedCase where userId=$row[0] and casestatus=0";
    $getcaseid=  mysql_query($caseid);//get user id from assined table
    ///////////////////////
    if($countrow[0]==0){
        $rowc="<td>No Active case</td><td></td></tr></table></td></tr>";
        //echo"<tr><td>no case assined";
    }
    else{
       // $rowc="<td>$countrow[0]</td><td>Total number of cases</td></tr></table></td></tr>";
        echo"<tr><td>"
    . "<table width='800' align=center>"
            . "<tr id=trin align=left >"
            . "<td id=tdh><b>case</b></td><td id=tdh>Title</td><td id=tdh>Opened by</td><td id=tdh>Priority</td></tr>";
    while($caseresult= mysql_fetch_array($getcaseid))
                {
        $querycase="select * from caselist where caseid=$caseresult[0]";
        $result=  mysql_query($querycase);
        $list=  mysql_fetch_array($result);//selects cases associted with given users
        //select case creator
        $getuser="select * from actions where actionperformed='create' and caseid=$caseresult[0]";
        $query=  mysql_query($getuser);
        $actionrow=  mysql_fetch_array($query);
        $newquery="select * from users where userid=$actionrow[1]";
        $results=  mysql_query($newquery);
        $usersrow=  mysql_fetch_array($results);
        //select data of case creation
        if($switches==0)
            {
            $tr="tr1";
       // echo"<tr id=tr1> <td><b>$list[0]</b></td><td>$list[1]</td><td>$list[6]</td><td>$list[7]</td></tr>";
        $switches=1;
        }
 else {
     $tr="tr2";
     //echo"<tr id=tr2><td>$list[1]</td><td>$list[2]</td><td>$list[3]</td></tr>";
     $switches=0;
 }
         echo"<tr id=$tr> <td><b>$list[0]</b></td><td>$list[1]</td><td>$usersrow[2] $usersrow[3]-on:$actionrow[3]</td><td>$list[7]</td></tr>";
    }
    echo"</table><td></tr>";
        
    }
    ///////////////////////////////////
    
    }
    echo"</table>";
    ?>


