<?php
//var qstr="?team="+cat.value+"&user="+st.value+"&status="+stcas.value+"&start="+fdate.value+"&enddate="+ldate.value;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once '../config/index.php';
require_once '../function/allfunc.php';
 $_GET[team];
$_GET[user];
 $_GET[status];
 $_GET[start];
 $_GET[enddate];
if($_GET[user]=='All')
    {
    if($_GET[team]=='All')
           {
        if($_GET[status]=='All')
            {
            //get users tiems
            $query="SELECT * FROM `usercatagory`";
            $result=  mysql_query($query);
            while($rowstatus=mysql_fetch_array($result))
                {
                   //for each team displayget users list
                $queryu="SELECT * FROM `users` where `users`.`Team`='$rowstatus[1]'";
                $resultu=  mysql_query($queryu);
                echo "<table border=1 width=100%><tr><td>$rowstatus[1]</td></tr>";
                while($rowu=  mysql_fetch_array($resultu))
                    {
                    echo "<tr><td>$rowu[2]</td><td>";
                     usersCase($rowu);
                     echo"</td></tr>";
                    
                    }
                    echo "</table>";
                
                
                }
                    
            
            
        }
        else
            {
            
        }
        
    }
    else
        {
        
    }
}
else
    {
    
}

function usersCase($userid)
         {
    if($_GET[status]=="All")
        {
            $sql="SELECT * FROM `AssignedCase` where `AssignedCase`.`userId`=$userid[0] and CaseStatus=0 ORDER BY `AssignedCase`.`CaseId` DESC"; //active case
            echo "<table width=100%><table width=100% >
                <tr><td>Active Case</td></tr>
                <tr id=tdt>
                <td id=tdh ><b>CaseidID</td><td id=tdh width=200><b>Title</b></td><td id=tdh ><b>Request Time</td><td id=tdh><b>Assign Time</td><td id=tdh><b>Requester</td><td id=tdh><b>Department</td></tr>"; 
            echo Cases($sql);
            echo "</table>";
            $sql="SELECT * FROM `AssignedCase` where `AssignedCase`.`userId`=$userid[0] and CaseStatus=1 ORDER BY `AssignedCase`.`CaseId` DESC"; //resolved not yet closed
          echo "<table width=100%><table width=100% >
                <tr><td>Resulved Case</td></tr>
                <tr id=tdt>
                <td id=tdh ><b>CaseidID</td><td id=tdh width=200><b>Title</b></td><td id=tdh ><b>Request Time</td><td id=tdh><b>Assign Time</td><td id=tdh><b>Requester</td><td id=tdh><b>Department</td></tr>"; 
            echo Cases($sql);
            echo "</table>";
            $sql="SELECT * FROM `AssignedCase` where `AssignedCase`.`userId`=$userid[0] and CaseStatus=2 ORDER BY `AssignedCase`.`CaseId` DESC"; //closed by admin
          echo "<table width=100%><table width=100% >
                <tr><td>Closed Case</td></tr>
                <tr id=tdt>
                <td id=tdh ><b>CaseidID</td></td><td id=tdh width=200><b>Title</b></td><td id=tdh ><b>Request Time</td><td id=tdh><b>Assign Time</td><td id=tdh><b>Requester</td><td id=tdh><b>Department</td></tr>"; 
            echo Cases($sql);
            echo "</table>";
            
    }
    else{
        if($_GET[status]=="Active")
            {
            $sql="SELECT * FROM `AssignedCase` where `AssignedCase`.`userId`=$userid[0] and CaseStatus=0 ORDER BY `AssignedCase`.`CaseId` DESC"; //active case
            Cases($sql);
             }
        if($_GET[status]=="Resolved")
            {
            $sql1="SELECT * FROM `ResolvedReport` where Conformationstatus=0";
            $sql="SELECT * FROM `AssignedCase` where `AssignedCase`.`userId`=$userid[0] and CaseStatus=0 ORDER BY `AssignedCase`.`CaseId` DESC"; //active case
            Cases($sql);
            }
        if($_GET[status]=="Closed")
            {
            $sql="SELECT * FROM `AssignedCase` where `AssignedCase`.`userId`=$userid[0] and CaseStatus=0 ORDER BY `AssignedCase`.`CaseId` DESC"; //active case
            Cases($sql);
         }
        
        
    }
    
    
}
function Cases($cases){
    
    //echo $cases."ogolcho";
    if(!mysql_query($cases))
    {
        echo mysql_error();
    }
       $result=mysql_query($cases);
       
    while($row=  mysql_fetch_array($result)){
        $casedetailsn="select * from caselist where caseid='$row[0]'";
        $results=  mysql_query($casedetailsn);
        $rows=  mysql_fetch_array($results);
        if($sw==0)
        {
            $sw=1;
            $id="tr1";
            
        }
        else
        {
            
            $sw=0;
            $id="tr2";
        }
         echo"<tr id=$id onclick=loadXMLDoc('mainb','comm/case/detail.php?caseid=$row[0]&source=comm/managers/Allteamcase.php')>
                    <td >$rows[1]</td>
                    <td >".getCreateTime($rows[0])."</td>
                    <td >$row[1]</td>
                    <td >$rows[4]</td>
                    <td >$rows[5]</td>
                  </tr>";  
        //echo $rows[1]."--".$rows[4]."<br>";
        
        
    }
    
    
    
}
function getCreateTime($id){
   $sql="SELECT date FROM `actions` where actionperformed='create' and caseid=$id";
   $result=  mysql_query($sql);
   $row=  mysql_fetch_array($result);
   return $row[0];
}
function getResolveTime($id){
   $sql="SELECT date FROM `actions` where actionperformed='Resolve' and caseid=$id";
   $result=  mysql_query($sql);
   $row=  mysql_fetch_array($result);
   return $row[0];
}
function getAsignmentTime($id){
   $sql="SELECT date FROM `actions` where actionperformed='Assign' and caseid=$id";
   $result=  mysql_query($sql);
   $row=  mysql_fetch_array($result);
   return $row[0];
}
function getCloseTime($id){
   $sql="  SELECT `dateOfconformation FROM `closeReport' where caseid=$id";
   $result=  mysql_query($sql);
   $row=  mysql_fetch_array($result);
   return $row[0];
}