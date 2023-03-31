<?php
require_once("../../config/index.php");
if($_GET[caseid]!="")
{
    //echo "$_GET[caseid]";
    $query="SELECT * FROM `caselist` where caseid=$_GET[caseid]";
    !$result;
    if(!$result=mysql_query($query)){
        echo mysql_error();
    }
 else {
   // echo "rew selected";
    if(mysql_num_rows($result)>0)
        {
        $row=  mysql_fetch_array($result);
        if($row[8]==$_GET[team]){
            $sql="update caselist set status='Not assined' where caseid=$_GET[caseid]";
            if(!mysql_query($sql)){
                echo mysql_error();
            }
            else
            {
                echo "casechanged with succe";
            }
            $sql="delete from ResolvedReport where Caseid=$_GET[caseid]";
            if(!mysql_query($sql)){
                echo mysql_error();
            }
            else
            {
                echo "<br>Case Removed From Resolve Entry";
            }
            $sql="delete from AssignedCase where CaseId=$_GET[caseid]";
            if(!mysql_query($sql)){
                echo mysql_error();
            }
            else
            {
                echo "<br>Case removed from Assignment History";
            }
            $sql="delete from closeReport where caseid=$_GET[caseid]";
            if(!mysql_query($sql)){
                echo mysql_error();
            }
            else
            {
                echo "<br> case Removed from Closed list";
            }
            $sql="DELETE FROM `actions` WHERE `caseid` = $_GET[caseid] AND `actionperformed` = 'Resolve'";
            if(!mysql_query($sql)){
                echo mysql_error();
            }
            else
            {
                echo "<br>Case Removed from action entry";
            }
           
            
        }
 else {
     echo "you are not autorized to change status";
     
 }
        
    }
    }
}
 else {
echo "please add case id ";    
}

?>
<html >
    <head>
        
    </head>
    <body>
        
            <div><h2>Case id</h2><input type =text id=caseid name=caseid />
            <input type="button" value="submit" onclick="changestatus2('mainb','comm/case/change.php','<?php echo $_GET[team];?>')"/></div>
        
    </body>
</html>

