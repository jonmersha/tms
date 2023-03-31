<?php
function AssignHistory($id){     
     $sqlass="SELECT * FROM `AssignedCase` where caseid=$id";
     $result=  mysqli_query($con,$sqlass);
     $rowass=  mysqli_fetch_array($result);
     //get case reciver
     //
     $res="select f_name,m_name from users where userid=$rowass[1]";
     $resres=mysqli_query($con,$res);
     if($resres!=Null){
     $resrow2=  mysqli_fetch_array($resres);
     
     //Get assigner
     $asssql2="select f_name,m_name from users where userid=$rowass[3]";
     $assresult2=mysqli_query($con,$asssql2);
     $assrow2=  mysqli_fetch_array($assresult2);
 if($resrow2[0]!="")
     return "<table id=tab> <tr><td><b>Assined to:</b>$resrow2[0] $resrow2[1] by $assrow2[0] $assrow2[1] -ON-> $rowass[2]</td></tr></table>";
 
}}
function ResolveHistory($id){
  $sql="select * from actions where caseid=$id and actionperformed='Resolve'";
    $result=mysqli_query($con,$sql);
     $row=  mysqli_fetch_array($result);
     ////////////////get resolv reporter
     $sql2="select f_name,m_name from users where userid=$row[1]";
     $result2=mysqli_query($con,$sql2);
     if($result2!=NUll){
     $row2=  mysqli_fetch_array($result2);
     $reporter=$row2[0]." ".$row2[1];
     
  //get Resolve Report reciever and report details
     $sql3="SELECT * FROM `ResolvedReport` where caseid=$id";
     $result3=  mysqli_query($con,$sql3);
     $row3=  mysqli_fetch_array($result3);
     $details=$row3[1];
     
     $sql4="select f_name,m_name from users where userid=$row3[2]";
     if($sql4!=Null){
     $result4=mysqli_query($con,$sql4);
if($result4!=NULL){
     $row4=  mysqli_fetch_array($result4);
     $reciver=$row4[0]."  ".$row4[1];     
     if($row[3]=="")
     {return "";}
     else{
     return "<table id=tab><tr><td>Case resolve History</td></tr>"
         . "<tr><td>"
             . "<table><tr id=tdh><td>Date<td id=spth>Resolved By<td>Reported to<td>Resolved by doing</tr>"
             . "<tr><td id=spth><b>$row[3]</td><td id=spth>$reporter </td><td id=spth>$reciver</td><td id=spth>$details</td></tr>
             </table></td></tr></table>";
     
 }}
}
}
}
function creator($id){
    $sql="select * from actions where caseid=$id and actionperformed='create'";
    $result=mysqli_query($con,$sql);
     $row=  mysqli_fetch_array($result);
     ////////////////
     $sql2="select f_name,m_name from users where userid=$row[1]";
     $result2=mysqli_query($con,$sql2);
if($result2!=NULL){
     $row2=  mysqli_fetch_array($result2);
     return "<table>  <tr><td><b>opened by:</b>$row2[0] $row2[1] on $row[3]</td></tr></table>";}
    
}

function creatorandtime($id){
    $sql="select * from actions where caseid=$id and actionperformed='create'";
    $result=mysqli_query($con,$sql);
     $row=  mysqli_fetch_array($result);
     ////////////////
     $sql2="select f_name,m_name from users where userid=$row[1]";
     $result2=mysqli_query($con,$sql2);
if($result2!=NULL){
     $row2=  mysqli_fetch_array($result2);
     return "$row2[0] $row2[1] at $row[3]";}
    
}
            

function editedby($id){
    $rs="";
    $sql3="SELECT * FROM `caseedite`  where caseid=$id";
    $result3=  mysqli_query($con,$sql3);
    $rs=$rs."<table id=tab><tr><td>Case Edite History</td></tr><tr><td>"
            . "<table><tr id=tdh><td>Date</td><td>Edited By</td><td>Edited to</td></tr>";
     while($row3= mysqli_fetch_array($result3))
                {
     //$row3=  mysqli_fetch_array($result3);
     $detais=$row3[2];
     
     $sql4="select f_name,m_name from users where userid=$row3[1]";
     $result4=mysqli_query($con,$sql4);
     $row4=  mysqli_fetch_array($result4);
     $reciver=$row4[0]."  ".$row4[1];     
     
    
     
     $rs=$rs. "<tr id =tr1><td>$row3[3]</td><td id=spth>$reciver</td><td>$detais</td></tr>";
     
                }
   $rs=$rs."</table></td></td></table>";
//if($row3[3]!="")
return $rs;

                }
function createCase(){
                    
                }
                function action(){}

function copnfirmclose($id){
    $message= $_GET[desc];
    $performer=$_GET[userid];
    $caseid=$id;
    //echo $message;
$dates= date("Y-m-d h:i:s");

$sql1="select userid from actions where caseid=$id and actionperformed='Resolve'";
$result=  mysqli_query($con,$sql1);
$row=  mysqli_fetch_array($result);

//echo $row[0];
   $sql= "INSERT INTO `closeReport` (`caseid`, `confirmer`, `resolvedby`, `DescriptionOnconformation`, `dateOfconformation`) "
           . "VALUES ($id,$performer,$row[0],'$message','$dates')";
           Actionsc('Close',$row[0],$performer);
           if(!mysqli_query($con,$sql)){
               return mysql_error();
           }
           $sql2="update ResolvedReport set Conformationstatus=1 where caseid=$id";
           if(!mysqli_query($con,$sql2)){
              return mysql_error();
           }
           $sql2="update caselist set status='Closed' where caseid=$id";
           if(!mysqli_query($con,$sql2)){
              return mysql_error();
           }
           $sql="update AssignedCase set CaseStatus=2 where caseid=$caseid";
        if(!mysqli_query($con,$sql))
            return mysql_error ();
 
               }
function Actionsc($Action,$id,$performer){
         $dates= date("Y-m-d h:i:s");
         $query="insert into actions values($id,'$performer','$Action','$dates')";
         if(!mysqli_query($con,$query)){
         return  mysql_error();
         
         }
            else {
                return mysql_affected_rows()."case created succefully"; 
                
     }
     
            }
function CloseHistory($id){
    
        //echo "close details";
    $query="SELECT * FROM closeReport where caseid=$id";
    $result=  mysqli_query($con,$query);
    
    $row=  mysqli_fetch_array($result);
    $resolver=getuser($row[1]);
    $confirmer=getuser($row[2]);
    
    $rss="<table>"
            . "<tr><td><b>Reported By</b></td><td>$resolver</td></tr>"
            . "<tr><td><b>Confirmed By</b></td><td>$confirmer at $row[4]</td></tr><tr>"
            . "<td><b>Message On Conformation</b></td><td>$row[3]</td></tr>"
            . "</table>";
    if(mysql_num_rows($result) < 1){
     $rss="";
    
    }
    return $rss;
        }
function getuser($uid){
    $query="SELECT f_name,m_name FROM `users` where userid=$uid";
    $result=  mysqli_query($con,$query);
    if($result!=null){
    $row=  mysqli_fetch_array($result);
    return $row[0]." ".$row[1];
    }
    
}
function GetCreator($id){
   $sql="select * from actions where caseid=$id and actionperformed='create'";
    $result=mysqli_query($con,$sql);
     $row=  mysqli_fetch_array($result);
     ////////////////
     $sql2="select f_name,m_name from users where userid=$row[1]";
    	$result2=mysqli_query($con,$sql2);
if($result2!=NULL){
     $row2=  mysqli_fetch_array($result2);
     return "$row2[0] $row2[1] on $row[3]";}
    
}
function GetCreatoronly($id){
   $sql="select * from actions where caseid=$id and actionperformed='create'";
    $result=mysqli_query($con,$sql);
if($result!=NULL){
     $row=  mysqli_fetch_array($result);
     ////////////////
     $sql2="select f_name,m_name from users where userid=$row[1]";
    $result2=mysqli_query($con,$sql2);
     $row2=  mysqli_fetch_array($result2);
     return "$row2[0] $row2[1]";
}
    
}

function GetAssigner($id){
     $sqlass="SELECT * FROM `AssignedCase` where caseid=$id";
     $result=  mysqli_query($con,$sqlass);
     $rowass=  mysqli_fetch_array($result);
     
     
     //Get assigner
     $asssql2="select f_name,m_name from users where userid=$rowass[3]";
     $assresult2=mysqli_query($con,$asssql2);
     $row=  mysqli_fetch_array($assresult2);
 
     return " $row[0] $row[1] -ON- $rowass[2]";
 
    
}
function GetReceiver($id){
     $sqlass="SELECT * FROM `AssignedCase` where caseid=$id";
     $result=  mysqli_query($con,$sqlass);
     $rowass=  mysqli_fetch_array($result);
     //get case reciver
     $res="select f_name,m_name from users where userid=$rowass[1]";
     $resres=mysqli_query($con,$res);
     $resrow2=  mysqli_fetch_array($resres);
     if($resrow2[0]==""){
         return "Not assigned";
     }
     return " $resrow2[0]-$resrow2[1]";
 
    
}
function GetReceivertime($id){
     $sqlass="SELECT * FROM `AssignedCase` where caseid=$id";
     $result=  mysqli_query($con,$sqlass);
if($result!=NULL){
     $rowass=  mysqli_fetch_array($result);
     //get case reciver
     
     $res="select f_name,m_name from users where userid=$rowass[1]";
     $resres=mysqli_query($con,$res);
if($resres!=""){
     $resrow2=  mysqli_fetch_array($resres);
  if($resrow2[0]!=""){
     return " $resrow2[0]-$resrow2[1]-at-$rowass[2] ";
  }
 else {
      return "Not assigned";
  }
 }
   } 
}
function getCaseStatus($id){
    $sqlass="SELECT status FROM `caselist` where caseid=$id";
     $result=  mysqli_query($con,$sqlass);
     $rowass=  mysqli_fetch_array($result);
     return $rowass[0];
}
function GetUserCAse($rqtype){
    $sql="SELECT caseid  from `AssignedCase` where userid={$_SESSION['userid']} and CaseStatus=0";
    if($rqtype=='Resolved'){
        $sql="SELECT caseid  from `AssignedCase` where userid={$_SESSION['userid']} and CaseStatus=1";
    }
    if($rqtype=='Closed'){
        $sql="SELECT caseid  from `AssignedCase` where userid={$_SESSION['userid']} and CaseStatus=2";
    }
    
     $result=  mysqli_query($con,$sql);
     $rs1="<table width=100%>
                <tr>
                <td id=tdh width=200><b>Title</b></td>
                <td id=tdh><b>Opened by</td>
                <td id=tdh><b>Assined by</td>
                <td id=tdh><b>Requester</td>
                <td id=tdh><b>Department</td>";
     
     while($row=  mysqli_fetch_array($result)){
         
        
       if($swicher==0){
           $trid='tr1';
           $swicher=0;
           
       }
       else{
           $trid='tr2';
           $swicher=1;
           
       }
        $csql="SELECT * FROM `caselist` where caseid=$row[0]";
         if($rqtype=='Closed')
             {
              $csql="SELECT * FROM `caselist` where caseid=$row[0] and status='Closed'";
        }
        if($rqtype=='Resolved')
             {
              $csql="SELECT * FROM `caselist` where caseid=$row[0] and status='Resolved'";
        }
        $rs=  mysqli_query($con,$csql);
        $crow=  mysqli_fetch_array($rs);
        
    
           $rs1=$rs1."<tr id=$trid onclick=loaddetails('mainb','comm/caselist/Details.php',$row[0])>"
            . "<td>$crow[1]</td>"
            . "<td>". GetCreator($crow[0])."</td>"
            . "<td>".GetAssigner($crow[0])."</td>"
            . "<td>$crow[5]</td>"
            . "<td>$crow[8]</td></tr>"; 
     }
     $rs1=$rs1."</table>";
     return $rs1;
}
function userconfirmnotification(){
    $query="select * from users where confirmed=0";
    $result=mysqli_query($con,$query);
    $rowno=  mysql_num_rows($result);
    if($rowno<1){
        return "no Notificaton";
    }
    ///////////
  $rss="<table width=100% id=tab1>
        <tr align=right>
            <td>
                <table >
                    <tr>
                        <td onclick=adduserany('res','admin/users/save/confirmall.php','user','0')><b>Confirm All</b></td>
                        
                    </tr>
                </table>
            </td>
        </tr>
        <tr><td>
        <table width=100%><tr id='tdt'><td id=tdh>Full Name</td><td id=tdh>type</td><td id=tdh>Team</td><td id=tdh>Extention</td><td id=tdh>internalmail</td><td id=tdh>Tele(mob)</td></tr>";      
  $swicher=0;
  while($row=mysqli_fetch_array($result))
      {
      if($swicher==0){
          $id="tr1";
          $swicher=1;
      }
      else {
          $swicher=0;
      $id="tr2";    
      }
      
      $rss=$rss."<tr id='$id' onclick=userconfirm('locations','admin/users/save/confirm.php?id=$row[0]')>"
              . "<td>$row[2] $row[3] $row[4]</td><td>$row[6]</td><td>$row[5]</td><td>$row[7]</td><td>$row[8]</td><td>$row[10]</td></tr>";
  }
  $rss=$rss."</table></td></tr>
  
<tr><td id=locations></td></tr>
  </table>";
  /////////////////////////////////////
    
    
    return "<div style='overflow:scroll; height:200px;' >".$rss."</div>";
}
function getCasecreateTime($id){
    $sql="select * from actions where caseid=$id and actionperformed='create'";
    $result=mysqli_query($con,$sql);
if($result!=NULL){
    $row=  mysqli_fetch_array($result);
    return $row[3];}
     
    
}


function RecreateCase($date)
    {
        $status=deleteCase();
        if($status!=""){
            return $status;
        }
        else{
 
$sql="INSERT INTO caselist 
    (`caseid`, `title`, `details`, `status`,`requester`,`workunit`, `ext`, `Priority`, `Catagory`) 
        VALUES ($_GET[caseid], '$_GET[caset]', '$_GET[cased]', 'Not Assined', '$_GET[rq]', '$_GET[dept]', '$_GET[ext]', '$_GET[pr]', '$_GET[cat]')";

if(!mysqli_query($con,$sql)){
return mysql_error();
}
else{
    $action="create";
    return Actionsr($action);
        }
}
}

function SaveEdite($date)
    {
$sql="INSERT INTO caselist 
    (`caseid`, `title`, `details`, `status`,`requester`,`workunit`, `ext`, `Priority`, `Catagory`) 
        VALUES ($_GET[caseid], '$_GET[caset]', '$_GET[cased]', 'Not Assined', '$_GET[rq]', '$_GET[dept]', '$_GET[ext]', '$_GET[pr]', '$_GET[cat]')";
$sql="update caselist "
        . "set title='$_GET[caset]',details='$_GET[cased]',requester='$_GET[rq]',"
        . "workunit='$_GET[dept]',ext=$_GET[ext],Priority='$_GET[pr]',Catagory='$_GET[cat]' where caseid=$_GET[caseid]";

if(!mysqli_query($con,$sql)){
return mysql_error();
}
else return "updated ";
}
function deleteCase(){
    $errormessage;
    
    
            $sql="delete from ResolvedReport where Caseid=$_GET[caseid]";
            if(!mysqli_query($con,$sql)){
                $errormessage=$errormessage."<br>".mysql_error()."";
            }
           
            $sql="delete from AssignedCase where CaseId=$_GET[caseid]";
            if(!mysqli_query($con,$sql)){
                $errormessage=$errormessage."<br>".mysql_error()."";
            }
           
            $sql="delete from closeReport where caseid=$_GET[caseid]";
            if(!mysqli_query($con,$sql)){
                $errormessage=$errormessage."<br>".mysql_error()."";
            }
            
            $sql="DELETE FROM `actions` WHERE `caseid` = $_GET[caseid]";
            if(!mysqli_query($con,$sql)){
                $errormessage=$errormessage."<br>".mysql_error()."";
            }
            $sql="DELETE FROM `caseedite` WHERE `caseid` = $_GET[caseid]";
            if(!mysqli_query($con,$sql)){
                $errormessage=$errormessage."<br>".mysql_error()."";
            }
            $sql="DELETE FROM `caselist` WHERE `caseid` = $_GET[caseid]";
            if(!mysqli_query($con,$sql)){
                $errormessage=$errormessage."<br>".mysql_error()."";
            } 
            if($errormessage==""){
                //echo "Case Deleted Succefully";
            }
            else{
            return $errormessage;
            }
            
        }
        

function deleteCaseAll(){
    $errormessage;
    $sql="insert into caselistbackup select * from caselist where caseid=$_GET[caseid]";
            if(!mysqli_query($con,$sql)){
                return mysql_error();
            }
    
            $sql="delete from ResolvedReport where Caseid=$_GET[caseid]";
            if(!mysqli_query($con,$sql)){
                $errormessage=$errormessage."<br>".mysql_error()."";
            }
           
            $sql="delete from AssignedCase where CaseId=$_GET[caseid]";
            if(!mysqli_query($con,$sql)){
                $errormessage=$errormessage."<br>".mysql_error()."";
            }
           
            $sql="delete from closeReport where caseid=$_GET[caseid]";
            if(!mysqli_query($con,$sql)){
                $errormessage=$errormessage."<br>".mysql_error()."";
            }
            
            $sql="DELETE FROM `actions` WHERE `caseid` = $_GET[caseid]";
            if(!mysqli_query($con,$sql)){
                $errormessage=$errormessage."<br>".mysql_error()."";
            }
            $sql="DELETE FROM `caseedite` WHERE `caseid` = $_GET[caseid]";
            if(!mysqli_query($con,$sql)){
                $errormessage=$errormessage."<br>".mysql_error()."";
            }
            $sql="DELETE FROM `caselist` WHERE `caseid` = $_GET[caseid]";
            if(!mysqli_query($con,$sql)){
                $errormessage=$errormessage."<br>".mysql_error()."";
            } 
            if($errormessage==""){
                echo "Case Deleted Succefully";
            }
            else{
            return $errormessage;
            }
            
        }
        
        function Actionsr($Action){
         $dates= date("Y-m-d h:i:s");
         $query="insert into actions values($_GET[caseid],{$_SESSION['userid']},'$Action','$dates')";
         if(!mysqli_query($con,$query)){
         return  "$query<br>".mysql_error();
         
         }
            else {
                return "<h3>Case Re Created successfully</h3>"; 
                
     }
     
            }
            
 
    function GetReceivertimeonly($id){
     $sqlass="SELECT * FROM `AssignedCase` where caseid=$id";
     $result=  mysqli_query($con,$sqlass);
if($result!=NULL){
     $rowass=  mysqli_fetch_array($result);
     //get case reciver
     
     $res="select f_name,m_name from users where userid=$rowass[1]";
     $resres=mysqli_query($con,$res);
if($resres!=""){
     $resrow2=  mysqli_fetch_array($resres);
  if($resrow2[0]!=""){
     return "$rowass[2] ";
  }
 else {
      return "Not assigned";
  }
 }
   } 
}

function getResolvetime($id){
    $sql="SELECT *FROM `ResolvedReport` where Caseid=$id";
    $result=  mysqli_query($con,$sql);
    $rownum=  mysql_num_rows($result);
    if($rownum<1)
        return "Not resolved";
    $row=  mysqli_fetch_array($result);
    return $row[4];
}
?>

  