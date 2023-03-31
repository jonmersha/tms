<?php
function editeCase($id,$editor,$description){
        $dates= date("Y-m-d h:i:s");
        $query="insert into caseedite value($id,$editor,'$description','$dates')";
        if(!mysql_query($query)){
            mysql_error();
        }
        else{
    $action="edite";
          return Actions($action,$id,$editor);  
        }
        
    }
function Actions($Action,$id,$performer){
         $dates= date("Y-m-d h:i:s");
         $query="insert into actions values($id,'$performer','$Action','$dates')";
         if(!mysql_query($query))
             {
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
                if(!mysql_query($sql))
                        return mysql_error();
                else
                     {
                    $action="Assign";
                    $actioncall=new newcase();
                    return Actions($action,$id,$assigner);
                }               
            }
///////////////////////////////////////////
    function ResolveCase($id,$reportedto,$description,$resolver){
        
        $dates= date("Y-m-d h:i:s");
        $query1="INSERT INTO `DBESupport`.`ResolvedReport` (`Caseid`, `Description on resolve`, `Repertedto`, `Conformationstatus`, `resolvetime`) "
                . "VALUES ('$id', '$description', '', '', '')";
        $query="insert into ResolvedReport values('$id','$description','$reportedto',0,'$dates')";
        if(!mysql_query($query)){
            return mysql_error();
        }
        else{
            $action="Resolve";
   
    return Actions($action,$id,$resolver);
           
            
        }   
    }
    
    function casestatus($caseid,$appvalue){
        $query="update caselist set `status`='$appvalue' where `caseid`=$caseid";
        if(!mysql_query($query)){
            return mysql_error();
        }        
    }
    function updateassignment($caseid,$status){
        $sql="update AssignedCase set CaseStatus=$status where caseid=$caseid";
        if(!mysql_query($sql))
            return mysql_error ();
        
    }
    function updatecasestatus($caseid,$action){
        //return $action;
        $query="update caselist set status='$action' where caseid=$caseid";
        if(!mysql_query($query))
            {
           return mysql_error();
            }        
    }
    function clos($id,$confirmer,$resolver,$deskription,$con)
    {    $dates= date("Y-m-d h:i:s");
        $query="insert into closeReport values('$id','$confirmer','$resolver','$deskription','$dates')";
        if(!mysql_query($query,$con)){
            return mysql_error();
        }
        else{
            $action="Close";
    $actioncall=new newcase();
    return $actioncall->Actions($action,$id,$con,1);
            
            
        }       
        
    }
    

