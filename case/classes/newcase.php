<?php

session_start();


try {
    //code...
    //require_once("/config/index.php");
} catch (\Throwable $th) {
    //throw $th;
    echo $th;
}


class newcase {

    function AddnewCase($date){
        
        $caseId=new newcase();
        $id=$caseId->Getid();
        if($_GET['cat']==""||$_GET['pr']==""||$_GET['caset']==""||$_GET['cased']==""||$_GET['rq']=="")
            {
        return "seme mandatory fields are empty";
        
        }
        
$sql="INSERT INTO caselist 
    (`caseid`, `title`, `details`, `status`,`requester`,`workunit`, `ext`, `Priority`, `Catagory`) 
        VALUES ($id, '$_GET[caset]', '$_GET[cased]', 'Not Assined', '$_GET[rq]', '$_GET[dept]', '$_GET[ext]', '$_GET[pr]', '$_GET[cat]')";
//echo $sql;

if(!mysqli_query($con,$sql)){
echo mysql_error();
}
else{
    $action="create";
    $actioncall=new newcase();
    return $actioncall->Actions($action,$id,$_SESSION['userid']);
    
}

}
    
  function Getid($con)
    {
        
        $caseid ="select max(caseid) as id from caselist";
        $results=mysqli_query($con,$caseid); 
        $rows=mysqli_fetch_array($results);
        $row=$rows[0]+1;
        return $row;
    }
    
   function Actions($Action,$id,$performer){
         $dates= date("Y-m-d h:i:s");
         $query="insert into actions values($id,'$performer','$Action','$dates')";
         if(!mysqli_query($con,$query)){
         return  mysql_error();
         
         }
            else {
                return mysql_affected_rows()."case created succefully"; 
                
     }
     
            }
function CaseAssignment($id,$reciver,$assigner)
                {
               $dates= date("Y-m-d h:i:s");
                $sql="insert into AssignedCase values($id,$reciver,'$dates',$assigner,0)";
                if(!mysqli_query($con,$sql))
                        return mysql_error();
                else
                     {
                    $action="Assign";
                    $appvalue="Assined";
    $actioncall=new newcase();
     $actioncall->Actions($action,$id,$assigner);
     
     $actioncall->updatecasestatus($caseid,$appvalue);
                }
                    
            
               
            }
    function ResolveCase($id,$reportedto,$description){
        $dates= date("Y-m-d h:i:s");
        $query="insert into ResolvedReport values('$id','$description','$reportedto',0,'$dates')";
        if(!mysqli_query($con,$query)){
            return mysql_error();
        }
        else{
            $action="Resolve";
    $actioncall=new newcase();
    return $actioncall->Actions($action,$id,1);
            
            
        }   
    }
    function updatecasestatus($caseid,$appvalue){
        $query="update caselist set `status`='Assined' where `caseid`=$caseid";
        if(mysqli_query($con,$query)){
            return mysql_error();
        }        
    }
    function clos($id,$confirmer,$resolver,$deskription)
    {    $dates= date("Y-m-d h:i:s");
        $query="insert into closeReport values('$id','$confirmer','$resolver','$deskription','$dates')";
        if(!mysqli_query($con,$query)){
            return mysql_error();
        }
        else{
            $action="Close";
    $actioncall=new newcase();
    return $actioncall->Actions($action,$id,1);
            
            
        }       
        
    }
    function editeCase($id,$editor,$description){
        $dates= date("Y-m-d h:i:s");
        $query="insert into caseedite value($id,$editor,'$description','$dates')";
        if(!mysqli_query($con,$query)){
            mysql_error();
        }
        else{
    $action="Edite";
    $actioncall=new newcase();
    return $actioncall->Actions($action,$id,1);
            
        }
        
    }
    function casedetails(){}
    

}


